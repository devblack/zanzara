<?php

declare(strict_types=1);

namespace Zanzara\Telegram\Type;

/**
 * Describes the connection of the bot with a business account.
 *
 * More on https://core.telegram.org/bots/api#businessconnection
 */
class BusinessConnection
{

    /**
     * Unique identifier of the business connection
     *
     * @var string
     */
    private $id;

    /**
     * Business account user that created the business connection
     *
     * @var User
     */
    private $user;

    /**
     * Identifier of a private chat with the user who created the business connection. This number may have more than 32
     * significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it has
     * at most 52 significant bits, so a signed 64-bit integer or double-precision float type are safe for storing this
     * identifier.
     *
     * @var int
     */
    private $user_chat_id;

    /**
     * Date of the connection in Unix time
     *
     * @var int
     */
    private $date;

    /**
     * Optional. Rights of the business bot
     *
     * @var BusinessBotRights|null
     */
    private $rights;

    /**
     * True, if the connection is active
     *
     * @var bool
     */
    private $is_enabled;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

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
     * @return int
     */
    public function getUserChatId(): int
    {
        return $this->user_chat_id;
    }

    /**
     * @param int $user_chat_id
     */
    public function setUserChatId(int $user_chat_id): void
    {
        $this->user_chat_id = $user_chat_id;
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
     * @return BusinessBotRights|null
     */
    public function getRights(): ?BusinessBotRights
    {
        return $this->rights;
    }

    /**
     * @param BusinessBotRights|null $rights
     */
    public function setRights(?BusinessBotRights $rights): void
    {
        $this->rights = $rights;
    }

    /**
     * @return bool
     */
    public function isEnabled(): bool
    {
        return $this->is_enabled;
    }

    /**
     * @param bool $is_enabled
     */
    public function setIsEnabled(bool $is_enabled): void
    {
        $this->is_enabled = $is_enabled;
    }

}