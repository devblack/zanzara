<?php

declare(strict_types=1);

namespace Zanzara\Telegram\Type;

/**
 * The paid media is a photo.
 */
class PaidMediaPhoto
{

    /**
     * @var string
     */
    private $type;

    /**
     * @var File\PhotoSize[]
     */
    private $photo;

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
     * @return File\PhotoSize[]
     */
    public function getPhoto(): array
    {
        return $this->photo;
    }

    /**
     * @param File\PhotoSize[] $photo
     */
    public function setPhoto(array $photo): void
    {
        $this->photo = $photo;
    }

}
