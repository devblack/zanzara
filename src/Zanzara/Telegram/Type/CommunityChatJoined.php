<?php

declare(strict_types=1);

namespace Zanzara\Telegram\Type;

/**
 * Represents a service message about a chat that was added to a community.
 */
class CommunityChatJoined
{

    /**
     * @var Community
     */
    private $community;

    /**
     * @return Community
     */
    public function getCommunity(): Community
    {
        return $this->community;
    }

    /**
     * @param Community $community
     */
    public function setCommunity(Community $community): void
    {
        $this->community = $community;
    }

}
