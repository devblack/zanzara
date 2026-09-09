<?php

declare(strict_types=1);

namespace Zanzara\Telegram\Type;

/**
 * This object contains information about the quoted part of a message that is replied to by the given message.
 */
class TextQuote
{

    /**
     * @var string
     */
    private $text;

    /**
     * @var MessageEntity[]|null
     */
    private $entities;

    /**
     * @var int
     */
    private $position;

    /**
     * @var bool|null
     */
    private $is_manual;

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
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
     * @return int
     */
    public function getPosition(): int
    {
        return $this->position;
    }

    /**
     * @param int $position
     */
    public function setPosition(int $position): void
    {
        $this->position = $position;
    }

    /**
     * @return bool|null
     */
    public function getIsManual(): ?bool
    {
        return $this->is_manual;
    }

    /**
     * @param bool|null $is_manual
     */
    public function setIsManual(bool $is_manual): void
    {
        $this->is_manual = $is_manual;
    }

}
