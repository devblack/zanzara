<?php

declare(strict_types=1);

namespace Zanzara\Telegram\Type;

/**
 * Contains information about a suggested post.
 */
class SuggestedPostInfo
{

    /**
     * @var string
     */
    private $state;

    /**
     * @var SuggestedPostPrice|null
     */
    private $price;

    /**
     * @var int|null
     */
    private $send_date;

    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * @param string $state
     */
    public function setState(string $state): void
    {
        $this->state = $state;
    }

    /**
     * @return SuggestedPostPrice|null
     */
    public function getPrice(): ?SuggestedPostPrice
    {
        return $this->price;
    }

    /**
     * @param SuggestedPostPrice|null $price
     */
    public function setPrice(SuggestedPostPrice $price): void
    {
        $this->price = $price;
    }

    /**
     * @return int|null
     */
    public function getSendDate(): ?int
    {
        return $this->send_date;
    }

    /**
     * @param int|null $send_date
     */
    public function setSendDate(int $send_date): void
    {
        $this->send_date = $send_date;
    }

}
