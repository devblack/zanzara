<?php

declare(strict_types=1);

namespace Zanzara\Telegram\Type;

/**
 * This object describes a unique gift that was upgraded from a regular gift.
 */
class UniqueGift
{

    /**
     * @var string
     */
    private $gift_id;

    /**
     * @var bool|null
     */
    private $is_premium;

    /**
     * @var bool|null
     */
    private $is_burned;

    /**
     * @var bool|null
     */
    private $is_from_blockchain;

    /**
     * @return string
     */
    public function getGiftId(): string
    {
        return $this->gift_id;
    }

    /**
     * @param string $gift_id
     */
    public function setGiftId(string $gift_id): void
    {
        $this->gift_id = $gift_id;
    }

    /**
     * @return bool|null
     */
    public function getIsPremium(): ?bool
    {
        return $this->is_premium;
    }

    /**
     * @param bool|null $is_premium
     */
    public function setIsPremium(bool $is_premium): void
    {
        $this->is_premium = $is_premium;
    }

    /**
     * @return bool|null
     */
    public function getIsBurned(): ?bool
    {
        return $this->is_burned;
    }

    /**
     * @param bool|null $is_burned
     */
    public function setIsBurned(bool $is_burned): void
    {
        $this->is_burned = $is_burned;
    }

    /**
     * @return bool|null
     */
    public function getIsFromBlockchain(): ?bool
    {
        return $this->is_from_blockchain;
    }

    /**
     * @param bool|null $is_from_blockchain
     */
    public function setIsFromBlockchain(bool $is_from_blockchain): void
    {
        $this->is_from_blockchain = $is_from_blockchain;
    }

}
