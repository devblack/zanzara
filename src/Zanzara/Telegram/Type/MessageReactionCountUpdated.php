<?php

declare(strict_types=1);

namespace Zanzara\Telegram\Type;

/**
 * This object represents reaction changes on a message with anonymous reactions.
 *
 * More on https://core.telegram.org/bots/api#messagereactioncountupdated
 */
class MessageReactionCountUpdated
{

    /**
     * The chat containing the message
     *
     * @var Chat
     */
    private $chat;

    /**
     * Unique message identifier inside the chat
     *
     * @var int
     */
    private $message_id;

    /**
     * Date of the change in Unix time
     *
     * @var int
     */
    private $date;

    /**
     * List of reactions that are present on the message
     *
     * @var ReactionCount[]
     */
    private $reactions;

    /**
     * @return Chat
     */
    public function getChat(): Chat
    {
        return $this->chat;
    }

    /**
     * @param Chat $chat
     */
    public function setChat(Chat $chat): void
    {
        $this->chat = $chat;
    }

    /**
     * @return int
     */
    public function getMessageId(): int
    {
        return $this->message_id;
    }

    /**
     * @param int $message_id
     */
    public function setMessageId(int $message_id): void
    {
        $this->message_id = $message_id;
    }

    /**
     * @return int
     */
    public function getDate(): int
    {
        return $this->date;
    }

    /**
     * @param int $date
     */
    public function setDate(int $date): void
    {
        $this->date = $date;
    }

    /**
     * @return ReactionCount[]
     */
    public function getReactions(): array
    {
        return $this->reactions;
    }

    /**
     * @param ReactionCount[] $reactions
     */
    public function setReactions(array $reactions): void
    {
        $this->reactions = $reactions;
    }

}