<?php

declare(strict_types=1);

namespace Zanzara\Telegram\Type;

/**
 * This object represents a message about a scheduled giveaway.
 */
class Giveaway
{

    /**
     * @var Chat[]
     */
    private $chats;

    /**
     * @var int
     */
    private $winners_selection_date;

    /**
     * @var int
     */
    private $winner_count;

    /**
     * @var bool|null
     */
    private $only_new_members;

    /**
     * @var bool|null
     */
    private $has_public_winners;

    /**
     * @var string|null
     */
    private $prize_description;

    /**
     * @var string[]|null
     */
    private $country_codes;

    /**
     * @var int|null
     */
    private $prize_star_count;

    /**
     * @var int|null
     */
    private $premium_subscription_month_count;

    /**
     * @return Chat[]
     */
    public function getChats(): array
    {
        return $this->chats;
    }

    /**
     * @param Chat[] $chats
     */
    public function setChats(array $chats): void
    {
        $this->chats = $chats;
    }

    /**
     * @return int
     */
    public function getWinnersSelectionDate(): int
    {
        return $this->winners_selection_date;
    }

    /**
     * @param int $winners_selection_date
     */
    public function setWinnersSelectionDate(int $winners_selection_date): void
    {
        $this->winners_selection_date = $winners_selection_date;
    }

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
     * @return bool|null
     */
    public function getOnlyNewMembers(): ?bool
    {
        return $this->only_new_members;
    }

    /**
     * @param bool|null $only_new_members
     */
    public function setOnlyNewMembers(bool $only_new_members): void
    {
        $this->only_new_members = $only_new_members;
    }

    /**
     * @return bool|null
     */
    public function getHasPublicWinners(): ?bool
    {
        return $this->has_public_winners;
    }

    /**
     * @param bool|null $has_public_winners
     */
    public function setHasPublicWinners(bool $has_public_winners): void
    {
        $this->has_public_winners = $has_public_winners;
    }

    /**
     * @return string|null
     */
    public function getPrizeDescription(): ?string
    {
        return $this->prize_description;
    }

    /**
     * @param string|null $prize_description
     */
    public function setPrizeDescription(string $prize_description): void
    {
        $this->prize_description = $prize_description;
    }

    /**
     * @return string[]|null
     */
    public function getCountryCodes(): ?array
    {
        return $this->country_codes;
    }

    /**
     * @param string[]|null $country_codes
     */
    public function setCountryCodes(array $country_codes): void
    {
        $this->country_codes = $country_codes;
    }

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

    /**
     * @return int|null
     */
    public function getPremiumSubscriptionMonthCount(): ?int
    {
        return $this->premium_subscription_month_count;
    }

    /**
     * @param int|null $premium_subscription_month_count
     */
    public function setPremiumSubscriptionMonthCount(int $premium_subscription_month_count): void
    {
        $this->premium_subscription_month_count = $premium_subscription_month_count;
    }

}
