<?php

declare(strict_types=1);

namespace Zanzara\Telegram\Type;

/**
 * This object contains information about a chat boost.
 *
 * More on https://core.telegram.org/bots/api#chatboost
 */
class ChatBoost
{

    /**
     * Unique identifier of the boost
     *
     * @var string
     */
    private $boost_id;

    /**
     * Point in time (Unix timestamp) when the chat was boosted
     *
     * @var int
     */
    private $add_date;

    /**
     * Point in time (Unix timestamp) when the boost will automatically expire, unless the booster's Telegram Premium
     * subscription is prolonged
     *
     * @var int
     */
    private $expiration_date;

    /**
     * Source of the added boost
     *
     * @var ChatBoostSource
     */
    private $source;

    /**
     * @return string
     */
    public function getBoostId(): string
    {
        return $this->boost_id;
    }

    /**
     * @param string $boost_id
     */
    public function setBoostId(string $boost_id): void
    {
        $this->boost_id = $boost_id;
    }

    /**
     * @return int
     */
    public function getAddDate(): int
    {
        return $this->add_date;
    }

    /**
     * @param int $add_date
     */
    public function setAddDate(int $add_date): void
    {
        $this->add_date = $add_date;
    }

    /**
     * @return int
     */
    public function getExpirationDate(): int
    {
        return $this->expiration_date;
    }

    /**
     * @param int $expiration_date
     */
    public function setExpirationDate(int $expiration_date): void
    {
        $this->expiration_date = $expiration_date;
    }

    /**
     * @return ChatBoostSource
     */
    public function getSource(): ChatBoostSource
    {
        return $this->source;
    }

    /**
     * @param ChatBoostSource $source
     */
    public function setSource(ChatBoostSource $source): void
    {
        $this->source = $source;
    }

}