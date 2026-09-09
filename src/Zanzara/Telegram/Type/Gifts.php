<?php

declare(strict_types=1);

namespace Zanzara\Telegram\Type;

/**
 * Contains the list of gifts.
 *
 * More on https://core.telegram.org/bots/api#gifts
 */
class Gifts
{

    /**
     * The list of gifts
     *
     * @var Gift[]
     */
    private $gifts;

    /**
     * @return Gift[]
     */
    public function getGifts(): array
    {
        return $this->gifts;
    }

    /**
     * @param Gift[] $gifts
     */
    public function setGifts(array $gifts): void
    {
        $this->gifts = $gifts;
    }

}