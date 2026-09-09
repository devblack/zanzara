<?php

declare(strict_types=1);

namespace Zanzara\Telegram\Type;

/**
 * This object represents a chat background.
 */
class ChatBackground
{

    /**
     * @var BackgroundType
     */
    private $type;

    /**
     * @return BackgroundType
     */
    public function getType(): BackgroundType
    {
        return $this->type;
    }

    /**
     * @param BackgroundType $type
     */
    public function setType(BackgroundType $type): void
    {
        $this->type = $type;
    }

}
