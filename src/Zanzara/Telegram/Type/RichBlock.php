<?php

declare(strict_types=1);

namespace Zanzara\Telegram\Type;

/**
 * This object represents a block in a rich formatted message. Only the common type discriminator is modeled.
 */
class RichBlock
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
