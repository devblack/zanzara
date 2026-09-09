<?php

declare(strict_types=1);

namespace Zanzara\Telegram\Type;

/**
 * This object represents a service message about the completion of a giveaway without public winners.
 */
class GiveawayCompleted
{

    /**
     * @var int
     */
    private $winner_count;

    /**
     * @var int|null
     */
    private $unclaimed_prize_count;

    /**
     * @var Message|null
     */
    private $giveaway_message;

    /**
     * @var bool|null
     */
    private $is_star_giveaway;

    /**
     * @return int
     */
    public function getWinnerCount(): int
    {
        return $this->winner_count;
    }

    /**
     * @param int $winner_count
     */
    public function setWinnerCount(int $winner_count): void
    {
        $this->winner_count = $winner_count;
    }

    /**
     * @return int|null
     */
    public function getUnclaimedPrizeCount(): ?int
    {
        return $this->unclaimed_prize_count;
    }

    /**
     * @param int|null $unclaimed_prize_count
     */
    public function setUnclaimedPrizeCount(int $unclaimed_prize_count): void
    {
        $this->unclaimed_prize_count = $unclaimed_prize_count;
    }

    /**
     * @return Message|null
     */
    public function getGiveawayMessage(): ?Message
    {
        return $this->giveaway_message;
    }

    /**
     * @param Message|null $giveaway_message
     */
    public function setGiveawayMessage(Message $giveaway_message): void
    {
        $this->giveaway_message = $giveaway_message;
    }

    /**
     * @return bool|null
     */
    public function getIsStarGiveaway(): ?bool
    {
        return $this->is_star_giveaway;
    }

    /**
     * @param bool|null $is_star_giveaway
     */
    public function setIsStarGiveaway(bool $is_star_giveaway): void
    {
        $this->is_star_giveaway = $is_star_giveaway;
    }

}
