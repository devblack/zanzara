<?php

declare(strict_types=1);

namespace Zanzara\Telegram\Type;

/**
 * Represents a checklist.
 */
class Checklist
{

    /**
     * @var string
     */
    private $title;

    /**
     * @var MessageEntity[]|null
     */
    private $title_entities;

    /**
     * @var ChecklistTask[]
     */
    private $tasks;

    /**
     * @var bool|null
     */
    private $others_can_add_tasks;

    /**
     * @var bool|null
     */
    private $others_can_mark_tasks_as_done;

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return MessageEntity[]|null
     */
    public function getTitleEntities(): ?array
    {
        return $this->title_entities;
    }

    /**
     * @param MessageEntity[]|null $title_entities
     */
    public function setTitleEntities(array $title_entities): void
    {
        $this->title_entities = $title_entities;
    }

    /**
     * @return ChecklistTask[]
     */
    public function getTasks(): array
    {
        return $this->tasks;
    }

    /**
     * @param ChecklistTask[] $tasks
     */
    public function setTasks(array $tasks): void
    {
        $this->tasks = $tasks;
    }

    /**
     * @return bool|null
     */
    public function getOthersCanAddTasks(): ?bool
    {
        return $this->others_can_add_tasks;
    }

    /**
     * @param bool|null $others_can_add_tasks
     */
    public function setOthersCanAddTasks(bool $others_can_add_tasks): void
    {
        $this->others_can_add_tasks = $others_can_add_tasks;
    }

    /**
     * @return bool|null
     */
    public function getOthersCanMarkTasksAsDone(): ?bool
    {
        return $this->others_can_mark_tasks_as_done;
    }

    /**
     * @param bool|null $others_can_mark_tasks_as_done
     */
    public function setOthersCanMarkTasksAsDone(bool $others_can_mark_tasks_as_done): void
    {
        $this->others_can_mark_tasks_as_done = $others_can_mark_tasks_as_done;
    }

}
