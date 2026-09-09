<?php

declare(strict_types=1);

namespace Zanzara\Telegram\Type;

/**
 * Describes an animated profile photo which displays when the recipient plays the message.
 */
class LivePhoto
{

    /**
     * @var File\PhotoSize[]|null
     */
    private $photo;

    /**
     * @var string
     */
    private $file_id;

    /**
     * @var string
     */
    private $file_unique_id;

    /**
     * @var int
     */
    private $width;

    /**
     * @var int
     */
    private $height;

    /**
     * @var int
     */
    private $duration;

    /**
     * @var string|null
     */
    private $mime_type;

    /**
     * @var int|null
     */
    private $file_size;

    /**
     * @return File\PhotoSize[]|null
     */
    public function getPhoto(): ?array
    {
        return $this->photo;
    }

    /**
     * @param File\PhotoSize[]|null $photo
     */
    public function setPhoto(array $photo): void
    {
        $this->photo = $photo;
    }

    /**
     * @return string
     */
    public function getFileId(): string
    {
        return $this->file_id;
    }

    /**
     * @param string $file_id
     */
    public function setFileId(string $file_id): void
    {
        $this->file_id = $file_id;
    }

    /**
     * @return string
     */
    public function getFileUniqueId(): string
    {
        return $this->file_unique_id;
    }

    /**
     * @param string $file_unique_id
     */
    public function setFileUniqueId(string $file_unique_id): void
    {
        $this->file_unique_id = $file_unique_id;
    }

    /**
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * @param int $width
     */
    public function setWidth(int $width): void
    {
        $this->width = $width;
    }

    /**
     * @return int
     */
    public function getHeight(): int
    {
        return $this->height;
    }

    /**
     * @param int $height
     */
    public function setHeight(int $height): void
    {
        $this->height = $height;
    }

    /**
     * @return int
     */
    public function getDuration(): int
    {
        return $this->duration;
    }

    /**
     * @param int $duration
     */
    public function setDuration(int $duration): void
    {
        $this->duration = $duration;
    }

    /**
     * @return string|null
     */
    public function getMimeType(): ?string
    {
        return $this->mime_type;
    }

    /**
     * @param string|null $mime_type
     */
    public function setMimeType(string $mime_type): void
    {
        $this->mime_type = $mime_type;
    }

    /**
     * @return int|null
     */
    public function getFileSize(): ?int
    {
        return $this->file_size;
    }

    /**
     * @param int|null $file_size
     */
    public function setFileSize(int $file_size): void
    {
        $this->file_size = $file_size;
    }

}
