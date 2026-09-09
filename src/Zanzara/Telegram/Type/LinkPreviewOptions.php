<?php

declare(strict_types=1);

namespace Zanzara\Telegram\Type;

/**
 * This object describes the options used for link preview generation.
 */
class LinkPreviewOptions
{

    /**
     * @var bool|null
     */
    private $is_disabled;

    /**
     * @var string|null
     */
    private $url;

    /**
     * @var bool|null
     */
    private $prefer_small_media;

    /**
     * @var bool|null
     */
    private $prefer_large_media;

    /**
     * @var bool|null
     */
    private $show_above_text;

    /**
     * @return bool|null
     */
    public function getIsDisabled(): ?bool
    {
        return $this->is_disabled;
    }

    /**
     * @param bool|null $is_disabled
     */
    public function setIsDisabled(bool $is_disabled): void
    {
        $this->is_disabled = $is_disabled;
    }

    /**
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @param string|null $url
     */
    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    /**
     * @return bool|null
     */
    public function getPreferSmallMedia(): ?bool
    {
        return $this->prefer_small_media;
    }

    /**
     * @param bool|null $prefer_small_media
     */
    public function setPreferSmallMedia(bool $prefer_small_media): void
    {
        $this->prefer_small_media = $prefer_small_media;
    }

    /**
     * @return bool|null
     */
    public function getPreferLargeMedia(): ?bool
    {
        return $this->prefer_large_media;
    }

    /**
     * @param bool|null $prefer_large_media
     */
    public function setPreferLargeMedia(bool $prefer_large_media): void
    {
        $this->prefer_large_media = $prefer_large_media;
    }

    /**
     * @return bool|null
     */
    public function getShowAboveText(): ?bool
    {
        return $this->show_above_text;
    }

    /**
     * @param bool|null $show_above_text
     */
    public function setShowAboveText(bool $show_above_text): void
    {
        $this->show_above_text = $show_above_text;
    }

}
