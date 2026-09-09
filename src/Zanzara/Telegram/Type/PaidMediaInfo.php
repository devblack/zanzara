<?php

declare(strict_types=1);

namespace Zanzara\Telegram\Type;

/**
 * Describes the paid media added to a message.
 */
class PaidMediaInfo
{

    /**
     * @var int
     */
    private $star_count;

    /**
     * @var PaidMedia[]
     */
    private $paid_media;

    /**
     * @return int
     */
    public function getStarCount(): int
    {
        return $this->star_count;
    }

    /**
     * @param int $star_count
     */
    public function setStarCount(int $star_count): void
    {
        $this->star_count = $star_count;
    }

    /**
     * @return PaidMedia[]
     */
    public function getPaidMedia(): array
    {
        return $this->paid_media;
    }

    /**
     * @param PaidMedia[] $paid_media
     */
    public function setPaidMedia(array $paid_media): void
    {
        $this->paid_media = $paid_media;
    }

}
