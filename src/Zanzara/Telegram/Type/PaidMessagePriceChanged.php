<?php

declare(strict_types=1);

namespace Zanzara\Telegram\Type;

/**
 * Represents a service message about a price change for paid messages sent to a chat.
 */
class PaidMessagePriceChanged
{

    /**
     * @var int
     */
    private $paid_message_star_count;

    /**
     * @return int
     */
    public function getPaidMessageStarCount(): int
    {
        return $this->paid_message_star_count;
    }

    /**
     * @param int $paid_message_star_count
     */
    public function setPaidMessageStarCount(int $paid_message_star_count): void
    {
        $this->paid_message_star_count = $paid_message_star_count;
    }

}
