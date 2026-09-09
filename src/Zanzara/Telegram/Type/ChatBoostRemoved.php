<?php

declare(strict_types=1);

namespace Zanzara\Telegram\Type;

/**
 * This object represents a boost removed from a chat.
 *
 * More on https://core.telegram.org/bots/api#chatboostremoved
 */
class ChatBoostRemoved
{

    /**
     * Chat which was boosted
     *
     * @var Chat
     */
    private $chat;

    /**
     * Unique identifier of the boost
     *
     * @var string
     */
    private $boost_id;

    /**
     * Point in time (Unix timestamp) when the boost was removed
     *
     * @var int
     */
    private $remove_date;

    /**
     * Source of the removed boost
     *
     * @var ChatBoostSource
     */
    private $source;

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
     * @return string
     */
    public function getBoostId(): string
    {
        return $this->boost_id;
    }

    /**
     * @param string $boost_id
     */
    public function setBoostId(string $boost_id): void
    {
        $this->boost_id = $boost_id;
    }

    /**
     * @return int
     */
    public function getRemoveDate(): int
    {
        return $this->remove_date;
    }

    /**
     * @param int $remove_date
     */
    public function setRemoveDate(int $remove_date): void
    {
        $this->remove_date = $remove_date;
    }

    /**
     * @return ChatBoostSource
     */
    public function getSource(): ChatBoostSource
    {
        return $this->source;
    }

    /**
     * @param ChatBoostSource $source
     */
    public function setSource(ChatBoostSource $source): void
    {
        $this->source = $source;
    }

}