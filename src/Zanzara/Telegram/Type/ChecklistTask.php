<?php

declare(strict_types=1);

namespace Zanzara\Telegram\Type;

/**
 * Represents a task in a checklist.
 */
class ChecklistTask
{

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $text;

    /**
     * @var MessageEntity[]|null
     */
    private $text_entities;

    /**
     * @var User|null
     */
    private $completed_by_user;

    /**
     * @var Chat|null
     */
    private $completed_by_chat;

    /**
     * @var int|null
     */
    private $completion_date;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText(string $text): void
    {
        $this->text = $text;
    }

    /**
     * @return MessageEntity[]|null
     */
    public function getTextEntities(): ?array
    {
        return $this->text_entities;
    }

    /**
     * @param MessageEntity[]|null $text_entities
     */
    public function setTextEntities(array $text_entities): void
    {
        $this->text_entities = $text_entities;
    }

    /**
     * @return User|null
     */
    public function getCompletedByUser(): ?User
    {
        return $this->completed_by_user;
    }

    /**
     * @param User|null $completed_by_user
     */
    public function setCompletedByUser(User $completed_by_user): void
    {
        $this->completed_by_user = $completed_by_user;
    }

    /**
     * @return Chat|null
     */
    public function getCompletedByChat(): ?Chat
    {
        return $this->completed_by_chat;
    }

    /**
     * @param Chat|null $completed_by_chat
     */
    public function setCompletedByChat(Chat $completed_by_chat): void
    {
        $this->completed_by_chat = $completed_by_chat;
    }

    /**
     * @return int|null
     */
    public function getCompletionDate(): ?int
    {
        return $this->completion_date;
    }

    /**
     * @param int|null $completion_date
     */
    public function setCompletionDate(int $completion_date): void
    {
        $this->completion_date = $completion_date;
    }

}
