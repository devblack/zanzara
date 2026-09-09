<?php

declare(strict_types=1);

namespace Zanzara\Telegram\Type;

/**
 * Represents a service message about a price change for direct messages sent to a channel chat.
 */
class DirectMessagePriceChanged
{

    /**
     * @var bool
     */
    private $are_direct_messages_enabled;

    /**
     * @var int|null
     */
    private $direct_message_star_count;

    /**
     * @return bool
     */
    public function getAreDirectMessagesEnabled(): bool
    {
        return $this->are_direct_messages_enabled;
    }

    /**
     * @param bool $are_direct_messages_enabled
     */
    public function setAreDirectMessagesEnabled(bool $are_direct_messages_enabled): void
    {
        $this->are_direct_messages_enabled = $are_direct_messages_enabled;
    }

    /**
     * @return int|null
     */
    public function getDirectMessageStarCount(): ?int
    {
        return $this->direct_message_star_count;
    }

    /**
     * @param int|null $direct_message_star_count
     */
    public function setDirectMessageStarCount(int $direct_message_star_count): void
    {
        $this->direct_message_star_count = $direct_message_star_count;
    }

}
