<?php

declare(strict_types=1);

namespace Zanzara\Telegram\Type;

/**
 * The reaction is based on an emoji.
 *
 * More on https://core.telegram.org/bots/api#reactiontypeemoji
 */
class ReactionTypeEmoji extends ReactionType
{

    /**
     * Reaction emoji.
     *
     * @var string
     */
    private $emoji;

    /**
     * @return string
     */
    public function getEmoji(): string
    {
        return $this->emoji;
    }

    /**
     * @param string $emoji
     */
    public function setEmoji(string $emoji): void
    {
        $this->emoji = $emoji;
    }

}