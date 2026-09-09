<?php

declare(strict_types=1);

namespace Zanzara\Telegram\Type;

/**
 * This object contains information about a paid media purchase.
 *
 * More on https://core.telegram.org/bots/api#paidmediapurchased
 */
class PaidMediaPurchased
{

    /**
     * User who purchased the media
     *
     * @var User
     */
    private $from;

    /**
     * Bot-specified paid media payload
     *
     * @var string
     */
    private $paid_media_payload;

    /**
     * @return User
     */
    public function getFrom(): User
    {
        return $this->from;
    }

    /**
     * @param User $from
     */
    public function setFrom(User $from): void
    {
        $this->from = $from;
    }

    /**
     * @return string
     */
    public function getPaidMediaPayload(): string
    {
        return $this->paid_media_payload;
    }

    /**
     * @param string $paid_media_payload
     */
    public function setPaidMediaPayload(string $paid_media_payload): void
    {
        $this->paid_media_payload = $paid_media_payload;
    }

}