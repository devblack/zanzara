<?php

declare(strict_types=1);

namespace Zanzara\Telegram\Type;

/**
 * The boost was obtained by the creation of Telegram Premium gift codes to boost a chat. Each such code boosts the
 * chat 4 times for the duration of the corresponding Telegram Premium subscription.
 *
 * More on https://core.telegram.org/bots/api#chatboostsourcegiftcode
 */
class ChatBoostSourceGiftCode extends ChatBoostSource
{

    /**
     * User for which the gift code was created
     *
     * @var User
     */
    private $user;

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user): void
    {
        $this->user = $user;
    }

}