<?php

declare(strict_types=1);

namespace Zanzara\Telegram\Type;

/**
 * This object describes the type of a reaction. Currently, it can be one of
 *
 * - ReactionTypeEmoji
 * - ReactionTypeCustomEmoji
 * - ReactionTypePaid
 *
 * More on https://core.telegram.org/bots/api#reactiontype
 */
class ReactionType
{

    /**
     * Type of the reaction, one of "emoji", "custom_emoji", "paid"
     *
     * @var string
     */
    private $type;

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

}