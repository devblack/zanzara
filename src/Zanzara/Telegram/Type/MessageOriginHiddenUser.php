<?php

declare(strict_types=1);

namespace Zanzara\Telegram\Type;

/**
 * The message was originally sent by an unknown user.
 */
class MessageOriginHiddenUser
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
     * @var string
     */
    private $sender_user_name;

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
     * @return string
     */
    public function getSenderUserName(): string
    {
        return $this->sender_user_name;
    }

    /**
     * @param string $sender_user_name
     */
    public function setSenderUserName(string $sender_user_name): void
    {
        $this->sender_user_name = $sender_user_name;
    }

}
