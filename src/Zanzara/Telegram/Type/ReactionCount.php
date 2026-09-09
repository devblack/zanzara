<?php

declare(strict_types=1);

namespace Zanzara\Telegram\Type;

/**
 * Represents a reaction added to a message along with the number of times it was added.
 *
 * More on https://core.telegram.org/bots/api#reactioncount
 */
class ReactionCount
{

    /**
     * Type of the reaction
     *
     * @var ReactionType
     */
    private $type;

    /**
     * Number of times the reaction was added
     *
     * @var int
     */
    private $total_count;

    /**
     * @return ReactionType
     */
    public function getType(): ReactionType
    {
        return $this->type;
    }

    /**
     * @param ReactionType $type
     */
    public function setType(ReactionType $type): void
    {
        $this->type = $type;
    }

    /**
     * @return int
     */
    public function getTotalCount(): int
    {
        return $this->total_count;
    }

    /**
     * @param int $total_count
     */
    public function setTotalCount(int $total_count): void
    {
        $this->total_count = $total_count;
    }

}