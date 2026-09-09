<?php

declare(strict_types=1);

namespace Zanzara\Telegram\Type;

/**
 * This object contains information about the users whose identifiers were shared with the bot using a KeyboardButtonRequestUsers button.
 */
class UsersShared
{

    /**
     * @var int
     */
    private $request_id;

    /**
     * @var SharedUser[]
     */
    private $users;

    /**
     * @return int
     */
    public function getRequestId(): int
    {
        return $this->request_id;
    }

    /**
     * @param int $request_id
     */
    public function setRequestId(int $request_id): void
    {
        $this->request_id = $request_id;
    }

    /**
     * @return SharedUser[]
     */
    public function getUsers(): array
    {
        return $this->users;
    }

    /**
     * @param SharedUser[] $users
     */
    public function setUsers(array $users): void
    {
        $this->users = $users;
    }

}
