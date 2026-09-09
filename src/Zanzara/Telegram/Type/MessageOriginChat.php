<?php

declare(strict_types=1);

namespace Zanzara\Telegram\Type;

/**
 * The message was originally sent on behalf of a chat to a group chat.
 */
class MessageOriginChat
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
    private $sender_chat;

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
    public function getSenderChat(): Chat
    {
        return $this->sender_chat;
    }

    /**
     * @param Chat $sender_chat
     */
    public function setSenderChat(Chat $sender_chat): void
    {
        $this->sender_chat = $sender_chat;
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
