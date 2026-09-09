<?php

declare(strict_types=1);

namespace Zanzara\Telegram\Type;

/**
 * The reaction is based on a custom emoji.
 *
 * More on https://core.telegram.org/bots/api#reactiontypecustomemoji
 */
class ReactionTypeCustomEmoji extends ReactionType
{

    /**
     * Custom emoji identifier.
     *
     * @var string
     */
    private $custom_emoji_id;

    /**
     * @return string
     */
    public function getCustomEmojiId(): string
    {
        return $this->custom_emoji_id;
    }

    /**
     * @param string $custom_emoji_id
     */
    public function setCustomEmojiId(string $custom_emoji_id): void
    {
        $this->custom_emoji_id = $custom_emoji_id;
    }

}