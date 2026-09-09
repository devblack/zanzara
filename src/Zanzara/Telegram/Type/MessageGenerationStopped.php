<?php

declare(strict_types=1);

namespace Zanzara\Telegram\Type;

/**
 * This object describes an update about a user stopping message generation.
 *
 * More on https://core.telegram.org/bots/api#messagegenerationstopped
 */
class MessageGenerationStopped
{

    /**
     * The chat that owns the draft message
     *
     * @var Chat
     */
    private $chat;

    /**
     * Optional. Unique identifier of the business connection on behalf of which the message was generated
     *
     * @var string|null
     */
    private $business_connection_id;

    /**
     * Optional. Unique identifier of the message thread to which the draft message belongs
     *
     * @var int|null
     */
    private $message_thread_id;

    /**
     * Identifier of the draft message in the chat
     *
     * @var int
     */
    private $draft_id;

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
     * @return string|null
     */
    public function getBusinessConnectionId(): ?string
    {
        return $this->business_connection_id;
    }

    /**
     * @param string|null $business_connection_id
     */
    public function setBusinessConnectionId(?string $business_connection_id): void
    {
        $this->business_connection_id = $business_connection_id;
    }

    /**
     * @return int|null
     */
    public function getMessageThreadId(): ?int
    {
        return $this->message_thread_id;
    }

    /**
     * @param int|null $message_thread_id
     */
    public function setMessageThreadId(?int $message_thread_id): void
    {
        $this->message_thread_id = $message_thread_id;
    }

    /**
     * @return int
     */
    public function getDraftId(): int
    {
        return $this->draft_id;
    }

    /**
     * @param int $draft_id
     */
    public function setDraftId(int $draft_id): void
    {
        $this->draft_id = $draft_id;
    }

}