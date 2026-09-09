<?php

declare(strict_types=1);

namespace Zanzara\Telegram\Type;

/**
 * This object describes the source of a chat boost. It can be one of
 *
 * - ChatBoostSourcePremium
 * - ChatBoostSourceGiftCode
 * - ChatBoostSourceGiveaway
 *
 * More on https://core.telegram.org/bots/api#chatboostsource
 */
class ChatBoostSource
{

    /**
     * Source of the boost, one of "premium", "gift_code", "giveaway"
     *
     * @var string
     */
    private $source;

    /**
     * @return string
     */
    public function getSource(): string
    {
        return $this->source;
    }

    /**
     * @param string $source
     */
    public function setSource(string $source): void
    {
        $this->source = $source;
    }

}