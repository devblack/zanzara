<?php

declare(strict_types=1);

namespace Zanzara\Telegram\Type;

/**
 * Describes a service message about a unique gift that was sent or received.
 */
class UniqueGiftInfo
{

    /**
     * @var UniqueGift
     */
    private $gift;

    /**
     * @var string
     */
    private $origin;

    /**
     * @var string|null
     */
    private $text;

    /**
     * @var MessageEntity[]|null
     */
    private $entities;

    /**
     * @var bool|null
     */
    private $is_private;

    /**
     * @var string|null
     */
    private $last_resale_currency;

    /**
     * @var int|null
     */
    private $last_resale_amount;

    /**
     * @var string|null
     */
    private $owned_gift_id;

    /**
     * @var int|null
     */
    private $transfer_star_count;

    /**
     * @var int|null
     */
    private $next_transfer_date;

    /**
     * @return UniqueGift
     */
    public function getGift(): UniqueGift
    {
        return $this->gift;
    }

    /**
     * @param UniqueGift $gift
     */
    public function setGift(UniqueGift $gift): void
    {
        $this->gift = $gift;
    }

    /**
     * @return string
     */
    public function getOrigin(): string
    {
        return $this->origin;
    }

    /**
     * @param string $origin
     */
    public function setOrigin(string $origin): void
    {
        $this->origin = $origin;
    }

    /**
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * @param string|null $text
     */
    public function setText(string $text): void
    {
        $this->text = $text;
    }

    /**
     * @return MessageEntity[]|null
     */
    public function getEntities(): ?array
    {
        return $this->entities;
    }

    /**
     * @param MessageEntity[]|null $entities
     */
    public function setEntities(array $entities): void
    {
        $this->entities = $entities;
    }

    /**
     * @return bool|null
     */
    public function getIsPrivate(): ?bool
    {
        return $this->is_private;
    }

    /**
     * @param bool|null $is_private
     */
    public function setIsPrivate(bool $is_private): void
    {
        $this->is_private = $is_private;
    }

    /**
     * @return string|null
     */
    public function getLastResaleCurrency(): ?string
    {
        return $this->last_resale_currency;
    }

    /**
     * @param string|null $last_resale_currency
     */
    public function setLastResaleCurrency(string $last_resale_currency): void
    {
        $this->last_resale_currency = $last_resale_currency;
    }

    /**
     * @return int|null
     */
    public function getLastResaleAmount(): ?int
    {
        return $this->last_resale_amount;
    }

    /**
     * @param int|null $last_resale_amount
     */
    public function setLastResaleAmount(int $last_resale_amount): void
    {
        $this->last_resale_amount = $last_resale_amount;
    }

    /**
     * @return string|null
     */
    public function getOwnedGiftId(): ?string
    {
        return $this->owned_gift_id;
    }

    /**
     * @param string|null $owned_gift_id
     */
    public function setOwnedGiftId(string $owned_gift_id): void
    {
        $this->owned_gift_id = $owned_gift_id;
    }

    /**
     * @return int|null
     */
    public function getTransferStarCount(): ?int
    {
        return $this->transfer_star_count;
    }

    /**
     * @param int|null $transfer_star_count
     */
    public function setTransferStarCount(int $transfer_star_count): void
    {
        $this->transfer_star_count = $transfer_star_count;
    }

    /**
     * @return int|null
     */
    public function getNextTransferDate(): ?int
    {
        return $this->next_transfer_date;
    }

    /**
     * @param int|null $next_transfer_date
     */
    public function setNextTransferDate(int $next_transfer_date): void
    {
        $this->next_transfer_date = $next_transfer_date;
    }

}
