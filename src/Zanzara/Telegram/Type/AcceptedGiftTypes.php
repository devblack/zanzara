<?php

declare(strict_types=1);

namespace Zanzara\Telegram\Type;

/**
 * Describes the types of gifts that a user is allowed to receive.
 *
 * More on https://core.telegram.org/bots/api#acceptedgifttypes
 */
class AcceptedGiftTypes
{

    /**
     * True, if the user can receive unlimited gifts
     *
     * @var bool
     */
    private $unlimited_gifts;

    /**
     * True, if the user can receive limited gifts
     *
     * @var bool
     */
    private $limited_gifts;

    /**
     * @return bool
     */
    public function isUnlimitedGifts(): bool
    {
        return $this->unlimited_gifts;
    }

    /**
     * @param bool $unlimited_gifts
     */
    public function setUnlimitedGifts(bool $unlimited_gifts): void
    {
        $this->unlimited_gifts = $unlimited_gifts;
    }

    /**
     * @return bool
     */
    public function isLimitedGifts(): bool
    {
        return $this->limited_gifts;
    }

    /**
     * @param bool $limited_gifts
     */
    public function setLimitedGifts(bool $limited_gifts): void
    {
        $this->limited_gifts = $limited_gifts;
    }

}