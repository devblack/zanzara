<?php

declare(strict_types=1);

namespace Zanzara\Telegram\Type;

/**
 * Describes a service message about a regular gift that was sent or received.
 */
class GiftInfo
{

    /**
     * @var Gift
     */
    private $gift;

    /**
     * @var string|null
     */
    private $owned_gift_id;

    /**
     * @var int|null
     */
    private $convert_star_count;

    /**
     * @var int|null
     */
    private $prepaid_upgrade_star_count;

    /**
     * @var bool|null
     */
    private $is_upgrade_separate;

    /**
     * @var bool|null
     */
    private $can_be_upgraded;

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
     * @var int|null
     */
    private $unique_gift_number;

    /**
     * @return Gift
     */
    public function getGift(): Gift
    {
        return $this->gift;
    }

    /**
     * @param Gift $gift
     */
    public function setGift(Gift $gift): void
    {
        $this->gift = $gift;
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
    public function getConvertStarCount(): ?int
    {
        return $this->convert_star_count;
    }

    /**
     * @param int|null $convert_star_count
     */
    public function setConvertStarCount(int $convert_star_count): void
    {
        $this->convert_star_count = $convert_star_count;
    }

    /**
     * @return int|null
     */
    public function getPrepaidUpgradeStarCount(): ?int
    {
        return $this->prepaid_upgrade_star_count;
    }

    /**
     * @param int|null $prepaid_upgrade_star_count
     */
    public function setPrepaidUpgradeStarCount(int $prepaid_upgrade_star_count): void
    {
        $this->prepaid_upgrade_star_count = $prepaid_upgrade_star_count;
    }

    /**
     * @return bool|null
     */
    public function getIsUpgradeSeparate(): ?bool
    {
        return $this->is_upgrade_separate;
    }

    /**
     * @param bool|null $is_upgrade_separate
     */
    public function setIsUpgradeSeparate(bool $is_upgrade_separate): void
    {
        $this->is_upgrade_separate = $is_upgrade_separate;
    }

    /**
     * @return bool|null
     */
    public function getCanBeUpgraded(): ?bool
    {
        return $this->can_be_upgraded;
    }

    /**
     * @param bool|null $can_be_upgraded
     */
    public function setCanBeUpgraded(bool $can_be_upgraded): void
    {
        $this->can_be_upgraded = $can_be_upgraded;
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
     * @return int|null
     */
    public function getUniqueGiftNumber(): ?int
    {
        return $this->unique_gift_number;
    }

    /**
     * @param int|null $unique_gift_number
     */
    public function setUniqueGiftNumber(int $unique_gift_number): void
    {
        $this->unique_gift_number = $unique_gift_number;
    }

}
