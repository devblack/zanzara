<?php

declare(strict_types=1);

namespace Zanzara\Telegram\Type;

/**
 * Describes an amount of Telegram Stars.
 */
class StarAmount
{

    /**
     * The total number of Telegram Stars
     */
    private $amount;

    /**
     * Optional. The number of 1/1000000000 shares of Telegram Stars
     */
    private $nanostar_amount;

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

    /**
     * @return int|null
     */
    public function getNanostarAmount(): ?int
    {
        return $this->nanostar_amount;
    }

    /**
     * @param int|null $nanostar_amount
     */
    public function setNanostarAmount(?int $nanostar_amount): void
    {
        $this->nanostar_amount = $nanostar_amount;
    }

}