<?php

declare(strict_types=1);

namespace Zanzara\Telegram\Type;

/**
 * This object describes the origin of a message. It can be one of MessageOriginUser, MessageOriginHiddenUser, MessageOriginChat or MessageOriginChannel.
 */
class MessageOrigin
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
