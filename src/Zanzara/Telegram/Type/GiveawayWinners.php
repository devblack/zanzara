<?php

declare(strict_types=1);

namespace Zanzara\Telegram\Type;

/**
 * This object represents a message about the completion of a giveaway with public winners.
 */
class GiveawayWinners
{

    /**
     * @var Chat
     */
    private $chat;

    /**
     * @var int
     */
    private $giveaway_message_id;

    /**
     * @var int
     */
    private $winners_selection_date;

    /**
     * @var int
     */
    private $winner_count;

    /**
     * @var User[]
     */
    private $winners;

    /**
     * @var int|null
     */
    private $additional_chat_count;

    /**
     * @var int|null
     */
    private $prize_star_count;

    /**
     * @var int|null
     */
    private $premium_subscription_month_count;

    /**
     * @var int|null
     */
    private $unclaimed_prize_count;

    /**
     * @var bool|null
     */
    private $only_new_members;

    /**
     * @var bool|null
     */
    private $was_refunded;

    /**
     * @var string|null
     */
    private $prize_description;

    /**
     * @return Chat
     */
    public function getChat(): Chat
    {
        return $this->chat;
    }

    /**
     * @param Chat $chat
     */
    public function setChat(Chat $chat): void
    {
        $this->chat = $chat;
    }

    /**
     * @return int
     */
    public function getGiveawayMessageId(): int
    {
        return $this->giveaway_message_id;
    }

    /**
     * @param int $giveaway_message_id
     */
    public function setGiveawayMessageId(int $giveaway_message_id): void
    {
        $this->giveaway_message_id = $giveaway_message_id;
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
     * @return User[]
     */
    public function getWinners(): array
    {
        return $this->winners;
    }

    /**
     * @param User[] $winners
     */
    public function setWinners(array $winners): void
    {
        $this->winners = $winners;
    }

    /**
     * @return int|null
     */
    public function getAdditionalChatCount(): ?int
    {
        return $this->additional_chat_count;
    }

    /**
     * @param int|null $additional_chat_count
     */
    public function setAdditionalChatCount(int $additional_chat_count): void
    {
        $this->additional_chat_count = $additional_chat_count;
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
    public function getWasRefunded(): ?bool
    {
        return $this->was_refunded;
    }

    /**
     * @param bool|null $was_refunded
     */
    public function setWasRefunded(bool $was_refunded): void
    {
        $this->was_refunded = $was_refunded;
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

}
