<?php

declare(strict_types=1);

namespace Zanzara\Telegram\Type;

/**
 * Describes an update about a user creating a bot as a managed bot.
 *
 * More on https://core.telegram.org/bots/api#managedbotcreated
 */
class ManagedBotCreated
{

    /**
     * Information about the bot. Token of the bot can be fetched through getManagedBotToken
     *
     * @var User
     */
    private $bot;

    /**
     * @return User
     */
    public function getBot(): User
    {
        return $this->bot;
    }

    /**
     * @param User $bot
     */
    public function setBot(User $bot): void
    {
        $this->bot = $bot;
    }

}