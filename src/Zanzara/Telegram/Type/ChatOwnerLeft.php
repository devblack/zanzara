<?php

declare(strict_types=1);

namespace Zanzara\Telegram\Type;

/**
 * Represents a service message about a user leaving a chat that was opened by that user.
 */
class ChatOwnerLeft
{

    /**
     * @var User|null
     */
    private $new_owner;

    /**
     * @return User|null
     */
    public function getNewOwner(): ?User
    {
        return $this->new_owner;
    }

    /**
     * @param User|null $new_owner
     */
    public function setNewOwner(User $new_owner): void
    {
        $this->new_owner = $new_owner;
    }

}
