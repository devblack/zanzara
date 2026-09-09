<?php

declare(strict_types=1);

namespace Zanzara\Telegram\Type;

/**
 * Represents a list of boosts added to a chat by a user.
 */
class UserChatBoosts
{

    /**
     * The list of boosts added to the chat by the user
     *
     * @var ChatBoost[]
     */
    private $boosts;

    /**
     * @return ChatBoost[]
     */
    public function getBoosts(): array
    {
        return $this->boosts;
    }

    /**
     * @param ChatBoost[] $boosts
     */
    public function setBoosts(array $boosts): void
    {
        $this->boosts = $boosts;
    }

}