<?php

declare(strict_types=1);

namespace Zanzara\Telegram\Type;

/**
 * Contains a list of Telegram Star transactions.
 *
 * More on https://core.telegram.org/bots/api#startransactions
 */
class StarTransactions
{

    /**
     * The list of transactions
     *
     * @var StarTransaction[]
     */
    private $transactions;

    /**
     * @return StarTransaction[]
     */
    public function getTransactions(): array
    {
        return $this->transactions;
    }

    /**
     * @param StarTransaction[] $transactions
     */
    public function setTransactions(array $transactions): void
    {
        $this->transactions = $transactions;
    }

}