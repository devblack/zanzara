<?php

declare(strict_types=1);

namespace Zanzara\Telegram\Type;

/**
 * This object describes the type of a chat background. Only the type discriminator is modeled.
 */
class BackgroundType
{

    /**
     * @var string
     */
    private $type;

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

}
