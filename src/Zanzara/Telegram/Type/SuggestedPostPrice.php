<?php

declare(strict_types=1);

namespace Zanzara\Telegram\Type;

/**
 * The price of a suggested post.
 */
class SuggestedPostPrice
{

    /**
     * @var string
     */
    private $currency;

    /**
     * @var int
     */
    private $amount;

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     */
    public function setCurrency(string $currency): void
    {
        $this->currency = $currency;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     */
    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
    }

}
