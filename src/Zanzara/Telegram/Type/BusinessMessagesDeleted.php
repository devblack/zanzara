<?php

declare(strict_types=1);

namespace Zanzara\Telegram\Type;

/**
 * This object is received when messages are deleted from a connected business account.
 *
 * More on https://core.telegram.org/bots/api#businessmessagesdeleted
 */
class BusinessMessagesDeleted
{

    /**
     * Unique identifier of the business connection
     *
     * @var string
     */
    private $business_connection_id;

    /**
     * Information about a chat in the business account. The bot may not have access to the chat or more information
     * about the chat.
     *
     * @var Chat
     */
    private $chat;

    /**
     * The list of identifiers of deleted messages in the chat of the business account
     *
     * @var int[]
     */
    private $message_ids;

    /**
     * @return string
     */
    public function getBusinessConnectionId(): string
    {
        return $this->business_connection_id;
    }

    /**
     * @param string $business_connection_id
     */
    public function setBusinessConnectionId(string $business_connection_id): void
    {
        $this->business_connection_id = $business_connection_id;
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
     * @return int[]
     */
    public function getMessageIds(): array
    {
        return $this->message_ids;
    }

    /**
     * @param int[] $message_ids
     */
    public function setMessageIds(array $message_ids): void
    {
        $this->message_ids = $message_ids;
    }

}