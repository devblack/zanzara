<?php

declare(strict_types=1);

namespace Zanzara\Telegram\Type;

use Zanzara\Telegram\Type\File\Sticker;

/**
 * This object describes a gift that can be sent by the bot.
 *
 * More on https://core.telegram.org/bots/api#gift
 */
class Gift
{

    /**
     * Unique identifier of the gift
     *
     * @var string
     */
    private $id;

    /**
     * The sticker that represents the gift
     *
     * @var Sticker
     */
    private $sticker;

    /**
     * The number of Telegram Stars that must be paid to send the sticker
     *
     * @var int
     */
    private $star_count;

    /**
     * Optional. The number of Telegram Stars that must be paid to upgrade the gift to a unique gift
     *
     * @var int|null
     */
    private $upgrade_star_count;

    /**
     * Optional. The total number of the gifts of this type that can be sent; for limited gifts only
     *
     * @var int|null
     */
    private $total_count;

    /**
     * Optional. The number of remaining gifts of this type that can be sent; for limited gifts only
     *
     * @var int|null
     */
    private $remaining_count;

    /**
     * Optional. The number of the gifts of this type that a user can send; for limited gifts only
     *
     * @var int|null
     */
    private $personal_total_count;

    /**
     * Optional. The number of remaining gifts of this type that a user can send; for limited gifts only
     *
     * @var int|null
     */
    private $personal_remaining_count;

    /**
     * Optional. The background of the gift
     *
     * @var GiftBackground|null
     */
    private $background;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return Sticker
     */
    public function getSticker(): Sticker
    {
        return $this->sticker;
    }

    /**
     * @param Sticker $sticker
     */
    public function setSticker(Sticker $sticker): void
    {
        $this->sticker = $sticker;
    }

    /**
     * @return int
     */
    public function getStarCount(): int
    {
        return $this->star_count;
    }

    /**
     * @param int $star_count
     */
    public function setStarCount(int $star_count): void
    {
        $this->star_count = $star_count;
    }

    /**
     * @return int|null
     */
    public function getUpgradeStarCount(): ?int
    {
        return $this->upgrade_star_count;
    }

    /**
     * @param int|null $upgrade_star_count
     */
    public function setUpgradeStarCount(?int $upgrade_star_count): void
    {
        $this->upgrade_star_count = $upgrade_star_count;
    }

    /**
     * @return int|null
     */
    public function getTotalCount(): ?int
    {
        return $this->total_count;
    }

    /**
     * @param int|null $total_count
     */
    public function setTotalCount(?int $total_count): void
    {
        $this->total_count = $total_count;
    }

    /**
     * @return int|null
     */
    public function getRemainingCount(): ?int
    {
        return $this->remaining_count;
    }

    /**
     * @param int|null $remaining_count
     */
    public function setRemainingCount(?int $remaining_count): void
    {
        $this->remaining_count = $remaining_count;
    }

    /**
     * @return int|null
     */
    public function getPersonalTotalCount(): ?int
    {
        return $this->personal_total_count;
    }

    /**
     * @param int|null $personal_total_count
     */
    public function setPersonalTotalCount(?int $personal_total_count): void
    {
        $this->personal_total_count = $personal_total_count;
    }

    /**
     * @return int|null
     */
    public function getPersonalRemainingCount(): ?int
    {
        return $this->personal_remaining_count;
    }

    /**
     * @param int|null $personal_remaining_count
     */
    public function setPersonalRemainingCount(?int $personal_remaining_count): void
    {
        $this->personal_remaining_count = $personal_remaining_count;
    }

    /**
     * @return GiftBackground|null
     */
    public function getBackground(): ?GiftBackground
    {
        return $this->background;
    }

    /**
     * @param GiftBackground|null $background
     */
    public function setBackground(?GiftBackground $background): void
    {
        $this->background = $background;
    }

}