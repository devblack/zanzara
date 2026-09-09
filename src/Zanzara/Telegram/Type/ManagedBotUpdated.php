<?php

declare(strict_types=1);

namespace Zanzara\Telegram\Type;

/**
 * This object represents an update about a user creating a bot as a managed bot.
 *
 * More on https://core.telegram.org/bots/api#managedbotupdated
 */
class ManagedBotUpdated
{

    /**
     * User that created the bot. This user can later edit it and manage its access settings
     *
     * @var User
     */
    private $user;

    /**
     * Information about the bot. Token of the bot can be fetched through getManagedBotToken
     *
     * @var User
     */
    private $bot;

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user): void
    {
        $this->user = $user;
    }

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