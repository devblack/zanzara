<?php

declare(strict_types=1);

namespace Zanzara\Telegram\Type;

/**
 * This object represents a service message about the creation of a scheduled giveaway.
 */
class GiveawayCreated
{

    /**
     * @var int|null
     */
    private $prize_star_count;

    /**
     * @return int|null
     */
    public function getPrizeStarCount(): ?int
    {
        return $this->prize_star_count;
    }

    /**
     * @param int|null $prize_star_count
     */
    public function setPrizeStarCount(int $prize_star_count): void
    {
        $this->prize_star_count = $prize_star_count;
    }

}
