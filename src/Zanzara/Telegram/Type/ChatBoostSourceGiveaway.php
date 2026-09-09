<?php

declare(strict_types=1);

namespace Zanzara\Telegram\Type;

/**
 * The boost was obtained by the creation of a Telegram Premium or a Telegram Star giveaway. This boosts the chat 4
 * times for the duration of the corresponding Telegram Premium subscription for Telegram Premium giveaways and
 * prize_star_count times for Telegram Star giveaways.
 *
 * More on https://core.telegram.org/bots/api#chatboostsourcegiveaway
 */
class ChatBoostSourceGiveaway extends ChatBoostSource
{

    /**
     * Identifier of a message in the chat with the giveaway; the message could have been deleted already. May be 0 if
     * the message isn't sent yet.
     *
     * @var int
     */
    private $giveaway_message_id;

    /**
     * Optional. User that won the prize in the giveaway if any
     *
     * @var User|null
     */
    private $user;

    /**
     * Optional. The number of Telegram Stars to be split between giveaway winners; for Telegram Star giveaways only
     *
     * @var int|null
     */
    private $prize_star_count;

    /**
     * Optional. True, if the giveaway was completed, but there was no user to win the prize
     *
     * @var bool|null
     */
    private $is_unclaimed;

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
     * @return User|null
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

    /**
     * @param User|null $user
     */
    public function setUser(?User $user): void
    {
        $this->user = $user;
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
    public function setPrizeStarCount(?int $prize_star_count): void
    {
        $this->prize_star_count = $prize_star_count;
    }

    /**
     * @return bool|null
     */
    public function isUnclaimed(): ?bool
    {
        return $this->is_unclaimed;
    }

    /**
     * @param bool|null $is_unclaimed
     */
    public function setIsUnclaimed(?bool $is_unclaimed): void
    {
        $this->is_unclaimed = $is_unclaimed;
    }

}