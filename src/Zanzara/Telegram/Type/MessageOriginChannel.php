<?php

declare(strict_types=1);

namespace Zanzara\Telegram\Type;

/**
 * The message was originally sent to a channel chat.
 */
class MessageOriginChannel
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
     * @var Chat
     */
    private $chat;

    /**
     * @var int
     */
    private $message_id;

    /**
     * @var string|null
     */
    private $author_signature;

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
     * @return string|null
     */
    public function getAuthorSignature(): ?string
    {
        return $this->author_signature;
    }

    /**
     * @param string|null $author_signature
     */
    public function setAuthorSignature(string $author_signature): void
    {
        $this->author_signature = $author_signature;
    }

}
