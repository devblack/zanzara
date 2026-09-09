<?php

declare(strict_types=1);

namespace Zanzara\Telegram\Type;

/**
 * This object represents a boost added to a chat or changed.
 *
 * More on https://core.telegram.org/bots/api#chatboostupdated
 */
class ChatBoostUpdated
{

    /**
     * Chat which was boosted
     *
     * @var Chat
     */
    private $chat;

    /**
     * Information about the chat boost
     *
     * @var ChatBoost
     */
    private $boost;

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
     * @return ChatBoost
     */
    public function getBoost(): ChatBoost
    {
        return $this->boost;
    }

    /**
     * @param ChatBoost $boost
     */
    public function setBoost(ChatBoost $boost): void
    {
        $this->boost = $boost;
    }

}