<?php

declare(strict_types=1);

namespace Zanzara\Telegram\Type;

/**
 * Describes the background of a gift.
 *
 * More on https://core.telegram.org/bots/api#giftbackground
 */
class GiftBackground
{

    /**
     * RGB hex color of the gift background center
     *
     * @var int
     */
    private $center_color;

    /**
     * RGB hex color of the gift background edge
     *
     * @var int
     */
    private $edge_color;

    /**
     * RGB hex color of the gift background text
     *
     * @var int
     */
    private $text_color;

    /**
     * @return int
     */
    public function getCenterColor(): int
    {
        return $this->center_color;
    }

    /**
     * @param int $center_color
     */
    public function setCenterColor(int $center_color): void
    {
        $this->center_color = $center_color;
    }

    /**
     * @return int
     */
    public function getEdgeColor(): int
    {
        return $this->edge_color;
    }

    /**
     * @param int $edge_color
     */
    public function setEdgeColor(int $edge_color): void
    {
        $this->edge_color = $edge_color;
    }

    /**
     * @return int
     */
    public function getTextColor(): int
    {
        return $this->text_color;
    }

    /**
     * @param int $text_color
     */
    public function setTextColor(int $text_color): void
    {
        $this->text_color = $text_color;
    }

}