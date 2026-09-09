<?php

declare(strict_types=1);

namespace Zanzara\Telegram\Type;

/**
 * This object represents a service message about a user boosting a chat.
 *
 * More on https://core.telegram.org/bots/api#chatboostadded
 */
class ChatBoostAdded
{

    /**
     * Number of boosts added by the user
     *
     * @var int
     */
    private $boost_count;

    /**
     * @return int
     */
    public function getBoostCount(): int
    {
        return $this->boost_count;
    }

    /**
     * @param int $boost_count
     */
    public function setBoostCount(int $boost_count): void
    {
        $this->boost_count = $boost_count;
    }

}