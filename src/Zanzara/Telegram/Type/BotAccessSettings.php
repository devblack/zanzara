<?php

declare(strict_types=1);

namespace Zanzara\Telegram\Type;

/**
 * Describes the rights of the bot for a managed bot.
 *
 * More on https://core.telegram.org/bots/api#botaccesssettings
 */
class BotAccessSettings
{

    /**
     * True, if the bot's access is restricted to the added users
     *
     * @var bool
     */
    private $is_access_restricted;

    /**
     * Optional. List of users that have access to the bot
     *
     * @var User[]|null
     */
    private $added_users;

    /**
     * @return bool
     */
    public function isAccessRestricted(): bool
    {
        return $this->is_access_restricted;
    }

    /**
     * @param bool $is_access_restricted
     */
    public function setIsAccessRestricted(bool $is_access_restricted): void
    {
        $this->is_access_restricted = $is_access_restricted;
    }

    /**
     * @return User[]|null
     */
    public function getAddedUsers(): ?array
    {
        return $this->added_users;
    }

    /**
     * @param User[]|null $added_users
     */
    public function setAddedUsers(?array $added_users): void
    {
        $this->added_users = $added_users;
    }

}