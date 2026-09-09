<?php

declare(strict_types=1);

namespace Zanzara\Telegram\Type;

/**
 * Represents a service message about the addition of new tasks to a checklist.
 */
class ChecklistTasksAdded
{

    /**
     * @var Message|null
     */
    private $checklist_message;

    /**
     * @var ChecklistTask[]
     */
    private $tasks;

    /**
     * @return Message|null
     */
    public function getChecklistMessage(): ?Message
    {
        return $this->checklist_message;
    }

    /**
     * @param Message|null $checklist_message
     */
    public function setChecklistMessage(Message $checklist_message): void
    {
        $this->checklist_message = $checklist_message;
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

}
