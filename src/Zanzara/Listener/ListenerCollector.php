<?php

declare(strict_types=1);

namespace Zanzara\Listener;

use DI\DependencyException;
use DI\NotFoundException;
use Psr\Container\ContainerInterface;
use Zanzara\Middleware\MiddlewareCollector;
use Zanzara\Middleware\MiddlewareInterface;
use Zanzara\Telegram\Type\BotSubscriptionUpdated;
use Zanzara\Telegram\Type\BusinessConnection;
use Zanzara\Telegram\Type\BusinessMessage;
use Zanzara\Telegram\Type\BusinessMessagesDeleted;
use Zanzara\Telegram\Type\CallbackQuery;
use Zanzara\Telegram\Type\ChannelPost;
use Zanzara\Telegram\Type\ChatBoostRemoved;
use Zanzara\Telegram\Type\ChatBoostUpdated;
use Zanzara\Telegram\Type\ChatJoinRequest;
use Zanzara\Telegram\Type\ChatMemberUpdated;
use Zanzara\Telegram\Type\ChatShared;
use Zanzara\Telegram\Type\ChosenInlineResult;
use Zanzara\Telegram\Type\EditedBusinessMessage;
use Zanzara\Telegram\Type\EditedChannelPost;
use Zanzara\Telegram\Type\EditedMessage;
use Zanzara\Telegram\Type\GuestMessage;
use Zanzara\Telegram\Type\InlineQuery;
use Zanzara\Telegram\Type\ManagedBotUpdated;
use Zanzara\Telegram\Type\Message;
use Zanzara\Telegram\Type\MessageGenerationStopped;
use Zanzara\Telegram\Type\MessageReactionCountUpdated;
use Zanzara\Telegram\Type\MessageReactionUpdated;
use Zanzara\Telegram\Type\PaidMediaPurchased;
use Zanzara\Telegram\Type\Passport\PassportData;
use Zanzara\Telegram\Type\Poll\Poll;
use Zanzara\Telegram\Type\Poll\PollAnswer;
use Zanzara\Telegram\Type\ReplyToMessage;
use Zanzara\Telegram\Type\Shipping\PreCheckoutQuery;
use Zanzara\Telegram\Type\Shipping\ShippingQuery;
use Zanzara\Telegram\Type\Shipping\SuccessfulPayment;
use Zanzara\Telegram\Type\Update;
use Zanzara\Telegram\Type\UserShared;
use Zanzara\Telegram\Type\WebApp\WebAppData;

/**
 * Class ListenerCollector
 * @package Zanzara\Listener
 */
abstract class ListenerCollector
{
    /**
     * Match every parameter in the form of: {param}
     * Doesn't match number parameters, like {12},
     * to keep allow regex with quantifiers as command/text
     * listeners.
     */
    protected const PARAMETER_REGEX = '/\{((?:(?!\d+,?\d+?)\w)+?)\}/miu';

    /**
     * Associative array for listeners.
     * Key is always the listener type that can be either a simple string (eg. messages, cb_query_texts) or the class
     * name of the Update type, @see Update::detectUpdateType().
     * Value can be an ordered array of @see Listener or another associative array where the key
     * is the listenerId and the value the actual @see Listener.
     *
     * Eg.
     * [
     *      'messages' => [
     *          '/start' => Listener(),
     *          'Simple text' => Listener(),
     *      ],
     *      'Zanzara\Telegram\Type\CallbackQuery' => [
     *          Listener(),
     *          Listener(),
     *          Listener()
     *      ]
     * ]
     *
     * @var array
     */
    protected $listeners = [];

    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * @var array
     */
    protected $middleware = [];

    /**
     * @var Listener
     */
    protected $onException;

    /**
     * Listen for the specified command.
     * Eg. $bot->onCommand('start', function(Context $ctx) {});
     *
     * You can also parameterized the command, eg:
     * Eg. $bot->onCommand('start {myParam}', function(Context $ctx, $myParam) {});
     *
     * @param string $command
     * @param $callback
     * @param array $filters eg. ['chat_type' => 'group']
     * @return MiddlewareCollector
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function onCommand(string $command, $callback, array $filters = []): MiddlewareCollector
    {
        $pattern = str_replace('/', '\/', "/{$command}");
        $command = '/^' . preg_replace(self::PARAMETER_REGEX, '(?<$1>.*)', $pattern) . ' ?$/miu';

        $listener = new Listener($callback, $this->container, $command, $filters);
        $this->listeners['messages'][$command] = $listener;
        return $listener;
    }

    /**
     * Listen for a message with the specified text.
     * Eg. $bot->onText('What time is it?', function(Context $ctx) {});
     *
     * Text is a regex, so you could also do something like:
     * $bot->onText('[a-zA-Z]{15}?', function(Context $ctx) {});
     *
     * You can also parameterized the text, eg:
     * Eg. $bot->onText('Hello {name}', function(Context $ctx, $name) {});
     *
     * @param string $text
     * @param  $callback
     * @param array $filters eg. ['chat_type' => 'group']
     * @return MiddlewareCollector
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function onText(string $text, $callback, array $filters = []): MiddlewareCollector
    {
        $text = '/^' . preg_replace(self::PARAMETER_REGEX, '(?<$1>.*)', $text) . ' ?$/miu';
        $listener = new Listener($callback, $this->container, $text, $filters);
        $this->listeners['messages'][$text] = $listener;
        return $listener;
    }

    /**
     * Listen for a generic message.
     * You can call this function more than once, every callback will be executed.
     *
     * Eg. $bot->onMessage(function(Context $ctx) {});
     *
     * @param  $callback
     * @param array $filters for ex. ['chat_type' => 'group'], in this case the listener will be executed only if the
     * message is sent in a group chat.
     * @return MiddlewareCollector
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function onMessage($callback, array $filters = []): MiddlewareCollector
    {
        $listener = new Listener($callback, $this->container, null, $filters);
        $this->listeners[Message::class][] = $listener;
        return $listener;
    }

    /**
     * Listen for a message that is a reply of another message.
     * You can call this function more than once, every callback will be executed.
     *
     * Eg. $bot->onReplyToMessage(function(Context $ctx) {});
     *
     * @param  $callback
     * @param array $filters for ex. ['chat_type' => 'group'], in this case the listener will be executed only if the
     * message is sent in a group chat.
     * @return MiddlewareCollector
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function onReplyToMessage($callback, array $filters = []): MiddlewareCollector
    {
        $listener = new Listener($callback, $this->container, null, $filters);
        $this->listeners[ReplyToMessage::class][] = $listener;
        return $listener;
    }

    /**
     * Listen for an edited message.
     * You can call this function more than once, every callback will be executed.
     *
     * Eg. $bot->onEditedMessage(function(Context $ctx) {});
     *
     * @param  $callback
     * @param array $filters for ex. ['chat_type' => 'group'], in this case the listener will be executed only if the
     * message is sent in a group chat.
     * @return MiddlewareCollector
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function onEditedMessage($callback, array $filters = []): MiddlewareCollector
    {
        $listener = new Listener($callback, $this->container, null, $filters);
        $this->listeners[EditedMessage::class][] = $listener;
        return $listener;
    }

    /**
     * Listen for a callback query with the specified message text.
     *
     * Eg. $bot->onCbQueryText('How many apples do you want?', function(Context $ctx) {});
     *
     * Text is a regex, so you could also do something like:
     * $bot->onCbQueryText('[a-zA-Z]{27}?', function(Context $ctx) {});
     *
     * You can also parameterized the text, eg:
     * Eg. $bot->onCbQueryText('Hello {name}', function(Context $ctx, $name) {});
     *
     * @param string $text
     * @param  $callback
     * @param array $filters for ex. ['chat_type' => 'group'], in this case the listener will be executed only if the
     * message is sent in a group chat.
     * @return MiddlewareCollector
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function onCbQueryText(string $text, $callback, array $filters = []): MiddlewareCollector
    {
        $text = '/^' . preg_replace(self::PARAMETER_REGEX, '(?<$1>.*)', $text) . ' ?$/miu';
        $listener = new Listener($callback, $this->container, $text, $filters);
        $this->listeners['cb_query_texts'][$text] = $listener;
        return $listener;
    }

    /**
     * Listen for a callback query with the specified callback data.
     *
     * Eg. $bot->onCbQueryData(['accept', 'refuse'], function(Context $ctx) {});
     *
     * Data values are a regex, so you could also do something like:
     * $bot->onCbQueryData(['acc.'], function(Context $ctx) {});
     *
     * @param array $data
     * @param  $callback
     * @param array $filters for ex. ['chat_type' => 'group'], in this case the listener will be executed only if the
     * message is sent in a group chat.
     * @return MiddlewareCollector
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function onCbQueryData(array $data, $callback, array $filters = []): MiddlewareCollector
    {
        // merge values with "|" (eg. "accept|refuse|later"), then ListenerResolver will check the callback data
        // against that regex.
        $id = '/' . implode('|', $data) . '/';
        $listener = new Listener($callback, $this->container, $id, $filters);
        $this->listeners['cb_query_data'][$id] = $listener;
        return $listener;
    }

    /**
     * Listen for a generic callback query.
     * You can call this function more than once, every callback will be executed.
     *
     * Eg. $bot->onCbQuery(function(Context $ctx) {});
     *
     * @param  $callback
     * @param array $filters for ex. ['chat_type' => 'group'], in this case the listener will be executed only if the
     * message is sent in a group chat.
     * @return MiddlewareCollector
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function onCbQuery($callback, array $filters = []): MiddlewareCollector
    {
        $listener = new Listener($callback, $this->container, null, $filters);
        $this->listeners[CallbackQuery::class][] = $listener;
        return $listener;
    }

    /**
     * Listener for a shipping query.
     * You can call this function more than once, every callback will be executed.
     *
     * Eg. $bot->onShippingQuery(function(Context $ctx) {});
     *
     * @param  $callback
     * @param array $filters for ex. ['chat_type' => 'group'], in this case the listener will be executed only if the
     * message is sent in a group chat.
     * @return MiddlewareCollector
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function onShippingQuery($callback, array $filters = []): MiddlewareCollector
    {
        $listener = new Listener($callback, $this->container, null, $filters);
        $this->listeners[ShippingQuery::class][] = $listener;
        return $listener;
    }

    /**
     * Listen for a pre checkout query.
     * You can call this function more than once, every callback will be executed.
     *
     * Eg. $bot->onPreCheckoutQuery(function(Context $ctx) {});
     *
     * @param  $callback
     * @param array $filters for ex. ['chat_type' => 'group'], in this case the listener will be executed only if the
     * message is sent in a group chat.
     * @return MiddlewareCollector
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function onPreCheckoutQuery($callback, array $filters = []): MiddlewareCollector
    {
        $listener = new Listener($callback, $this->container, null, $filters);
        $this->listeners[PreCheckoutQuery::class][] = $listener;
        return $listener;
    }

    /**
     * Listen for a successful payment.
     * You can call this function more than once, every callback will be executed.
     *
     * Eg. $bot->onSuccessfulPayment(function(Context $ctx) {});
     *
     * @param  $callback
     * @param array $filters for ex. ['chat_type' => 'group'], in this case the listener will be executed only if the
     * message is sent in a group chat.
     * @return MiddlewareCollector
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function onSuccessfulPayment($callback, array $filters = []): MiddlewareCollector
    {
        $listener = new Listener($callback, $this->container, null, $filters);
        $this->listeners[SuccessfulPayment::class][] = $listener;
        return $listener;
    }

    /**
     * Listen for a passport data message.
     * You can call this function more than once, every callback will be executed.
     *
     * Eg. $bot->onPassportData(function(Context $ctx) {});
     *
     * @param  $callback
     * @param array $filters for ex. ['chat_type' => 'group'], in this case the listener will be executed only if the
     * message is sent in a group chat.
     * @return MiddlewareCollector
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function onPassportData($callback, array $filters = []): MiddlewareCollector
    {
        $listener = new Listener($callback, $this->container, null, $filters);
        $this->listeners[PassportData::class][] = $listener;
        return $listener;
    }

    /**
     * Listen for an inline query.
     * You can call this function more than once, every callback will be executed.
     *
     * Eg. $bot->onInlineQuery(function(Context $ctx) {});
     *
     * @param  $callback
     * @param array $filters for ex. ['chat_type' => 'group'], in this case the listener will be executed only if the
     * message is sent in a group chat.
     * @return MiddlewareCollector
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function onInlineQuery($callback, array $filters = []): MiddlewareCollector
    {
        $listener = new Listener($callback, $this->container, null, $filters);
        $this->listeners[InlineQuery::class][] = $listener;
        return $listener;
    }

    /**
     * Listen for a chosen inline result.
     * You can call this function more than once, every callback will be executed.
     *
     * Eg. $bot->onChosenInlineResult(function(Context $ctx) {});
     *
     * @param  $callback
     * @param array $filters for ex. ['chat_type' => 'group'], in this case the listener will be executed only if the
     * message is sent in a group chat.
     * @return MiddlewareCollector
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function onChosenInlineResult($callback, array $filters = []): MiddlewareCollector
    {
        $listener = new Listener($callback, $this->container, null, $filters);
        $this->listeners[ChosenInlineResult::class][] = $listener;
        return $listener;
    }

    /**
     * Listen for a channel post.
     * You can call this function more than once, every callback will be executed.
     *
     * Eg. $bot->onChannelPost(function(Context $ctx) {});
     *
     * @param  $callback
     * @param array $filters for ex. ['chat_type' => 'group'], in this case the listener will be executed only if the
     * message is sent in a group chat.
     * @return MiddlewareCollector
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function onChannelPost($callback, array $filters = []): MiddlewareCollector
    {
        $listener = new Listener($callback, $this->container, null, $filters);
        $this->listeners[ChannelPost::class][] = $listener;
        return $listener;
    }

    /**
     * Listen for an edited channel post.
     * You can call this function more than once, every callback will be executed.
     *
     * Eg. $bot->onEditedChannelPost(function(Context $ctx) {});
     *
     * @param  $callback
     * @param array $filters for ex. ['chat_type' => 'group'], in this case the listener will be executed only if the
     * message is sent in a group chat.
     * @return MiddlewareCollector
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function onEditedChannelPost($callback, array $filters = []): MiddlewareCollector
    {
        $listener = new Listener($callback, $this->container, null, $filters);
        $this->listeners[EditedChannelPost::class][] = $listener;
        return $listener;
    }

    /**
     * Listen for a poll.
     * You can call this function more than once, every callback will be executed.
     *
     * Eg. $bot->onPoll(function(Context $ctx) {});
     *
     * @param  $callback
     * @param array $filters for ex. ['chat_type' => 'group'], in this case the listener will be executed only if the
     * message is sent in a group chat.
     * @return MiddlewareCollector
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function onPoll($callback, array $filters = []): MiddlewareCollector
    {
        $listener = new Listener($callback, $this->container, null, $filters);
        $this->listeners[Poll::class][] = $listener;
        return $listener;
    }

    /**
     * Listen for a poll answer.
     * You can call this function more than once, every callback will be executed.
     *
     * Eg. $bot->onPollAnswer(function(Context $ctx) {});
     *
     * @param  $callback
     * @param array $filters for ex. ['chat_type' => 'group'], in this case the listener will be executed only if the
     * message is sent in a group chat.
     * @return MiddlewareCollector
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function onPollAnswer($callback, array $filters = []): MiddlewareCollector
    {
        $listener = new Listener($callback, $this->container, null, $filters);
        $this->listeners[PollAnswer::class][] = $listener;
        return $listener;
    }

    /**
     * Listen for a chat join request.
     * You can call this function more than once, every callback will be executed.
     *
     * Eg. $bot->onChatJoinRequest(function(Context $ctx) {});
     *
     * @param  $callback
     * @param array $filters for ex. ['chat_type' => 'group'], in this case the listener will be executed only if the
     * message is sent in a group chat.
     * @return MiddlewareCollector
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function onChatJoinRequest($callback, array $filters = []): MiddlewareCollector
    {
        $listener = new Listener($callback, $this->container, null, $filters);
        $this->listeners[ChatJoinRequest::class][] = $listener;
        return $listener;
    }

    /**
     * Listen for a chat member updated.
     * You can call this function more than once, every callback will be executed.
     *
     * Eg. $bot->onChatMemberUpdated(function(Context $ctx) {});
     *
     * @param  $callback
     * @param array $filters for ex. ['chat_type' => 'group'], in this case the listener will be executed only if the
     * message is sent in a group chat.
     * @return MiddlewareCollector
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function onChatMemberUpdated($callback, array $filters = []): MiddlewareCollector
    {
        $listener = new Listener($callback, $this->container, null, $filters);
        $this->listeners[ChatMemberUpdated::class][] = $listener;
        return $listener;
    }

    /**
     * Listen for a service message: data sent by a Web App.
     *
     * Eg. $bot->onWebAppData(function(Context $ctx) {});
     *
     * @param  $callback
     * @param array $filters for ex. ['chat_type' => 'group'], in this case the listener will be executed only if the
     * message is sent in a group chat.
     * @return MiddlewareCollector
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function onWebAppData($callback, array $filters = []): MiddlewareCollector
    {
        $listener = new Listener($callback, $this->container, null, $filters);
        $this->listeners[WebAppData::class][] = $listener;
        return $listener;
    }

    /**
     * Listen for a service message: a user was shared with the bot.
     *
     * Eg. $bot->onUserShared(function(Context $ctx) {});
     *
     * @param  $callback
     * @param array $filters for ex. ['chat_type' => 'group'], in this case the listener will be executed only if the
     * message is sent in a group chat.
     * @return MiddlewareCollector
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function onUserShared($callback, array $filters = []): MiddlewareCollector
    {
        $listener = new Listener($callback, $this->container, null, $filters);
        $this->listeners[UserShared::class][] = $listener;
        return $listener;
    }

    /**
     * Listen for a service message: a chat was shared with the bot.
     *
     * Eg. $bot->onChatShared(function(Context $ctx) {});
     *
     * @param  $callback
     * @param array $filters for ex. ['chat_type' => 'group'], in this case the listener will be executed only if the
     * message is sent in a group chat.
     * @return MiddlewareCollector
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function onChatShared($callback, array $filters = []): MiddlewareCollector
    {
        $listener = new Listener($callback, $this->container, null, $filters);
        $this->listeners[ChatShared::class][] = $listener;
        return $listener;
    }

    /**
     * Listen for a message reaction update.
     *
     * Eg. $bot->onMessageReaction(function(Context $ctx) {});
     *
     * @param  $callback
     * @param array $filters
     * @return MiddlewareCollector
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function onMessageReaction($callback, array $filters = []): MiddlewareCollector
    {
        $listener = new Listener($callback, $this->container, null, $filters);
        $this->listeners[MessageReactionUpdated::class][] = $listener;
        return $listener;
    }

    /**
     * Listen for a message reaction count update.
     *
     * Eg. $bot->onMessageReactionCount(function(Context $ctx) {});
     *
     * @param  $callback
     * @param array $filters
     * @return MiddlewareCollector
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function onMessageReactionCount($callback, array $filters = []): MiddlewareCollector
    {
        $listener = new Listener($callback, $this->container, null, $filters);
        $this->listeners[MessageReactionCountUpdated::class][] = $listener;
        return $listener;
    }

    /**
     * Listen for a business connection update.
     *
     * Eg. $bot->onBusinessConnection(function(Context $ctx) {});
     *
     * @param  $callback
     * @param array $filters
     * @return MiddlewareCollector
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function onBusinessConnection($callback, array $filters = []): MiddlewareCollector
    {
        $listener = new Listener($callback, $this->container, null, $filters);
        $this->listeners[BusinessConnection::class][] = $listener;
        return $listener;
    }

    /**
     * Listen for a business message update.
     *
     * Eg. $bot->onBusinessMessage(function(Context $ctx) {});
     *
     * @param  $callback
     * @param array $filters
     * @return MiddlewareCollector
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function onBusinessMessage($callback, array $filters = []): MiddlewareCollector
    {
        $listener = new Listener($callback, $this->container, null, $filters);
        $this->listeners[BusinessMessage::class][] = $listener;
        return $listener;
    }

    /**
     * Listen for an edited business message update.
     *
     * Eg. $bot->onEditedBusinessMessage(function(Context $ctx) {});
     *
     * @param  $callback
     * @param array $filters
     * @return MiddlewareCollector
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function onEditedBusinessMessage($callback, array $filters = []): MiddlewareCollector
    {
        $listener = new Listener($callback, $this->container, null, $filters);
        $this->listeners[EditedBusinessMessage::class][] = $listener;
        return $listener;
    }

    /**
     * Listen for a deleted business messages update.
     *
     * Eg. $bot->onDeletedBusinessMessages(function(Context $ctx) {});
     *
     * @param  $callback
     * @param array $filters
     * @return MiddlewareCollector
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function onDeletedBusinessMessages($callback, array $filters = []): MiddlewareCollector
    {
        $listener = new Listener($callback, $this->container, null, $filters);
        $this->listeners[BusinessMessagesDeleted::class][] = $listener;
        return $listener;
    }

    /**
     * Listen for a guest message update.
     *
     * Eg. $bot->onGuestMessage(function(Context $ctx) {});
     *
     * @param  $callback
     * @param array $filters
     * @return MiddlewareCollector
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function onGuestMessage($callback, array $filters = []): MiddlewareCollector
    {
        $listener = new Listener($callback, $this->container, null, $filters);
        $this->listeners[GuestMessage::class][] = $listener;
        return $listener;
    }

    /**
     * Listen for a purchased paid media update.
     *
     * Eg. $bot->onPurchasedPaidMedia(function(Context $ctx) {});
     *
     * @param  $callback
     * @param array $filters
     * @return MiddlewareCollector
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function onPurchasedPaidMedia($callback, array $filters = []): MiddlewareCollector
    {
        $listener = new Listener($callback, $this->container, null, $filters);
        $this->listeners[PaidMediaPurchased::class][] = $listener;
        return $listener;
    }

    /**
     * Listen for a chat boost update.
     *
     * Eg. $bot->onChatBoost(function(Context $ctx) {});
     *
     * @param  $callback
     * @param array $filters
     * @return MiddlewareCollector
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function onChatBoost($callback, array $filters = []): MiddlewareCollector
    {
        $listener = new Listener($callback, $this->container, null, $filters);
        $this->listeners[ChatBoostUpdated::class][] = $listener;
        return $listener;
    }

    /**
     * Listen for a removed chat boost update.
     *
     * Eg. $bot->onRemovedChatBoost(function(Context $ctx) {});
     *
     * @param  $callback
     * @param array $filters
     * @return MiddlewareCollector
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function onRemovedChatBoost($callback, array $filters = []): MiddlewareCollector
    {
        $listener = new Listener($callback, $this->container, null, $filters);
        $this->listeners[ChatBoostRemoved::class][] = $listener;
        return $listener;
    }

    /**
     * Listen for a managed bot update.
     *
     * Eg. $bot->onManagedBot(function(Context $ctx) {});
     *
     * @param  $callback
     * @param array $filters
     * @return MiddlewareCollector
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function onManagedBot($callback, array $filters = []): MiddlewareCollector
    {
        $listener = new Listener($callback, $this->container, null, $filters);
        $this->listeners[ManagedBotUpdated::class][] = $listener;
        return $listener;
    }

    /**
     * Listen for a bot subscription update.
     *
     * Eg. $bot->onSubscription(function(Context $ctx) {});
     *
     * @param  $callback
     * @param array $filters
     * @return MiddlewareCollector
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function onSubscription($callback, array $filters = []): MiddlewareCollector
    {
        $listener = new Listener($callback, $this->container, null, $filters);
        $this->listeners[BotSubscriptionUpdated::class][] = $listener;
        return $listener;
    }

    /**
     * Listen for a stopped message generation update.
     *
     * Eg. $bot->onStoppedMessageGeneration(function(Context $ctx) {});
     *
     * @param  $callback
     * @param array $filters
     * @return MiddlewareCollector
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function onStoppedMessageGeneration($callback, array $filters = []): MiddlewareCollector
    {
        $listener = new Listener($callback, $this->container, null, $filters);
        $this->listeners[MessageGenerationStopped::class][] = $listener;
        return $listener;
    }

    /**
     * Listen for a generic update.
     * You can call this function more than once, every callback will be executed.
     *
     * Eg. $bot->onUpdate(function(Context $ctx) {});
     *
     * @param  $callback
     * @param array $filters for ex. ['chat_type' => 'group'], in this case the listener will be executed only if the
     * message is sent in a group chat.
     * @return MiddlewareCollector
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function onUpdate($callback, array $filters = []): MiddlewareCollector
    {
        $listener = new Listener($callback, $this->container, null, $filters);
        $this->listeners[Update::class][] = $listener;
        return $listener;
    }

    /**
     * If the processing of the current update gives an error, this listener will be called.
     *
     * @param $callback
     * @return MiddlewareCollector
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function onException($callback): MiddlewareCollector
    {
        $listener = new Listener($callback, $this->container);
        $this->onException = $listener;
        return $listener;
    }

    /**
     * If no listener matches the current update, this listener will be called if specified.
     *
     * @param $callback
     * @return MiddlewareCollector
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function fallback($callback): MiddlewareCollector
    {
        $listener = new Listener($callback, $this->container);
        $this->listeners['fallback'] = $listener;
        return $listener;
    }

    /**
     * Define a middleware that will be executed for every listener function and before listener-specific middleware.
     *
     * Eg:
     * $bot = new Zanzara($_ENV['BOT_TOKEN']);
     * $bot->middleware(new GenericMiddleware());
     *
     * $bot->onCommand('start', function(Context $ctx) {
     *      $ctx->sendMessage('Hello');
     * })->middleware(new SpecificMiddleware());
     *
     * In this case GenericMiddleware will be executed before SpecificMiddleware.
     *
     * @param MiddlewareInterface|callable $middleware
     * @return self
     */
    public function middleware($middleware): self
    {
        array_unshift($this->middleware, $middleware);
        return $this;
    }

    /**
     * Add cross-request middleware to each listener middleware chain.
     *
     */
    protected function feedMiddlewareStack()
    {
        array_walk_recursive($this->listeners, function ($value) {
            if ($value instanceof Listener) {
                $this->applyMiddlewareStack($value);
            }
        });
    }

    /**
     * Add cross-request middlewares to a listener.
     * @param Listener $listener
     * @return Listener
     * @throws DependencyException
     * @throws NotFoundException
     */
    protected function applyMiddlewareStack(Listener $listener): Listener
    {
        foreach ($this->middleware as $m) {
            $listener->middleware($m);
        }
        return $listener;
    }
}
