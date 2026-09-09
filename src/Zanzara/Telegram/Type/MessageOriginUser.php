<?php

declare(strict_types=1);

namespace Zanzara\Telegram\Type;

/**
 * The message was originally sent by a known user.
 */
class MessageOriginUser
{

    /**
     * @var string
     */
    private $type;

    /**
     * @var int
     */
    private $date;

    /**
     * @var User
     */
    private $sender_user;

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
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
     * @return User
     */
    public function getSenderUser(): User
    {
        return $this->sender_user;
    }

    /**
     * @param User $sender_user
     */
    public function setSenderUser(User $sender_user): void
    {
        $this->sender_user = $sender_user;
    }

}
