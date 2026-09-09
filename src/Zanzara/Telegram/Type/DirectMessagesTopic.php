<?php

declare(strict_types=1);

namespace Zanzara\Telegram\Type;

/**
 * Describes a topic in a direct messages chat.
 */
class DirectMessagesTopic
{

    /**
     * @var int
     */
    private $topic_id;

    /**
     * @var User|null
     */
    private $user;

    /**
     * @return int
     */
    public function getTopicId(): int
    {
        return $this->topic_id;
    }

    /**
     * @param int $topic_id
     */
    public function setTopicId(int $topic_id): void
    {
        $this->topic_id = $topic_id;
    }

    /**
     * @return User|null
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

    /**
     * @param User|null $user
     */
    public function setUser(User $user): void
    {
        $this->user = $user;
    }

}
