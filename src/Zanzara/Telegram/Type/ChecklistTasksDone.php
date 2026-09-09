<?php

declare(strict_types=1);

namespace Zanzara\Telegram\Type;

/**
 * Represents a service message about status changes for tasks in a checklist.
 */
class ChecklistTasksDone
{

    /**
     * @var Message|null
     */
    private $checklist_message;

    /**
     * @var int[]|null
     */
    private $marked_as_done_task_ids;

    /**
     * @var int[]|null
     */
    private $marked_as_not_done_task_ids;

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
     * @return int[]|null
     */
    public function getMarkedAsDoneTaskIds(): ?array
    {
        return $this->marked_as_done_task_ids;
    }

    /**
     * @param int[]|null $marked_as_done_task_ids
     */
    public function setMarkedAsDoneTaskIds(array $marked_as_done_task_ids): void
    {
        $this->marked_as_done_task_ids = $marked_as_done_task_ids;
    }

    /**
     * @return int[]|null
     */
    public function getMarkedAsNotDoneTaskIds(): ?array
    {
        return $this->marked_as_not_done_task_ids;
    }

    /**
     * @param int[]|null $marked_as_not_done_task_ids
     */
    public function setMarkedAsNotDoneTaskIds(array $marked_as_not_done_task_ids): void
    {
        $this->marked_as_not_done_task_ids = $marked_as_not_done_task_ids;
    }

}
