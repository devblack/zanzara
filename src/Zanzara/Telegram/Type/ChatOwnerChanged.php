<?php

declare(strict_types=1);

namespace Zanzara\Telegram\Type;

/**
 * Represents a service message about a change of ownership in a chat.
 */
class ChatOwnerChanged
{

    /**
     * @var User
     */
    private $new_owner;

    /**
     * @return User
     */
    public function getNewOwner(): User
    {
        return $this->new_owner;
    }

    /**
     * @param User $new_owner
     */
    public function setNewOwner(User $new_owner): void
    {
        $this->new_owner = $new_owner;
    }

}
