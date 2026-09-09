<?php

declare(strict_types=1);

namespace Zanzara\Telegram\Type;

/**
 * This object represents a rich formatted message.
 */
class RichMessage
{

    /**
     * @var RichBlock[]
     */
    private $blocks;

    /**
     * @var bool|null
     */
    private $is_rtl;

    /**
     * @return RichBlock[]
     */
    public function getBlocks(): array
    {
        return $this->blocks;
    }

    /**
     * @param RichBlock[] $blocks
     */
    public function setBlocks(array $blocks): void
    {
        $this->blocks = $blocks;
    }

    /**
     * @return bool|null
     */
    public function getIsRtl(): ?bool
    {
        return $this->is_rtl;
    }

    /**
     * @param bool|null $is_rtl
     */
    public function setIsRtl(bool $is_rtl): void
    {
        $this->is_rtl = $is_rtl;
    }

}
