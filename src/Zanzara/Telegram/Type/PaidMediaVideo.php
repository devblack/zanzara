<?php

declare(strict_types=1);

namespace Zanzara\Telegram\Type;

use Zanzara\Telegram\Type\File\Video;

/**
 * The paid media is a video.
 */
class PaidMediaVideo
{

    /**
     * @var string
     */
    private $type;

    /**
     * @var Video
     */
    private $video;

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
     * @return Video
     */
    public function getVideo(): Video
    {
        return $this->video;
    }

    /**
     * @param Video $video
     */
    public function setVideo(Video $video): void
    {
        $this->video = $video;
    }

}
