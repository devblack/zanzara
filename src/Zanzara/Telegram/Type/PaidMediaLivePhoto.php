<?php

declare(strict_types=1);

namespace Zanzara\Telegram\Type;

/**
 * The paid media is a live photo.
 */
class PaidMediaLivePhoto
{

    /**
     * @var string
     */
    private $type;

    /**
     * @var LivePhoto
     */
    private $live_photo;

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return LivePhoto
     */
    public function getLivePhoto(): LivePhoto
    {
        return $this->live_photo;
    }

    /**
     * @param LivePhoto $live_photo
     */
    public function setLivePhoto(LivePhoto $live_photo): void
    {
        $this->live_photo = $live_photo;
    }

}
