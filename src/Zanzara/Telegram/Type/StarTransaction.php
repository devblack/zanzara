<?php

declare(strict_types=1);

namespace Zanzara\Telegram\Type;

/**
 * This object contains information about a Star transaction.
 *
 * More on https://core.telegram.org/bots/api#startransaction
 */
class StarTransaction
{

    /**
     * Unique identifier of the transaction
     *
     * @var string
     */
    private $id;

    /**
     * Integer amount of Telegram Stars transferred by the transaction
     *
     * @var int
     */
    private $amount;

    /**
     * The number of 1/1000000000 shares of Telegram Stars transferred by the transaction
     *
     * @var int|null
     */
    private $nanostar_amount;

    /**
     * Date the transaction was created in Unix time
     *
     * @var int
     */
    private $date;

    /**
     * Optional. Source of an incoming transaction (e.g., a user purchasing goods or services, Fragment refunding a
     * failed withdrawal)
     *
     * @var TransactionPartner|null
     */
    private $source;

    /**
     * Optional. Receiver of an outgoing transaction (e.g., a user for a purchase refund, Fragment for a withdrawal)
     *
     * @var TransactionPartner|null
     */
    private $receiver;

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
     * @return int|null
     */
    public function getAmount(): ?int
    {
        return $this->amount;
    }

    /**
     * @param int|null $amount
     */
    public function setAmount(?int $amount): void
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

    /**
     * @return int
     */
    public function getDate(): int
    {
        return $this->date;
    }

    /**
     * @param int $date
     */
    public function setDate(int $date): void
    {
        $this->date = $date;
    }

    /**
     * @return TransactionPartner|null
     */
    public function getSource(): ?TransactionPartner
    {
        return $this->source;
    }

    /**
     * @param TransactionPartner|null $source
     */
    public function setSource(?TransactionPartner $source): void
    {
        $this->source = $source;
    }

    /**
     * @return TransactionPartner|null
     */
    public function getReceiver(): ?TransactionPartner
    {
        return $this->receiver;
    }

    /**
     * @param TransactionPartner|null $receiver
     */
    public function setReceiver(?TransactionPartner $receiver): void
    {
        $this->receiver = $receiver;
    }

}