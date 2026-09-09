<?php

declare(strict_types=1);

namespace Zanzara\Telegram\Type;

/**
 * Represents a service message about a new option added to a poll.
 */
class PollOptionAdded
{

    /**
     * @var Message|null
     */
    private $poll_message;

    /**
     * @var string
     */
    private $option_persistent_id;

    /**
     * @var string
     */
    private $option_text;

    /**
     * @var MessageEntity[]|null
     */
    private $option_text_entities;

    /**
     * @return Message|null
     */
    public function getPollMessage(): ?Message
    {
        return $this->poll_message;
    }

    /**
     * @param Message|null $poll_message
     */
    public function setPollMessage(Message $poll_message): void
    {
        $this->poll_message = $poll_message;
    }

    /**
     * @return string
     */
    public function getOptionPersistentId(): string
    {
        return $this->option_persistent_id;
    }

    /**
     * @param string $option_persistent_id
     */
    public function setOptionPersistentId(string $option_persistent_id): void
    {
        $this->option_persistent_id = $option_persistent_id;
    }

    /**
     * @return string
     */
    public function getOptionText(): string
    {
        return $this->option_text;
    }

    /**
     * @param string $option_text
     */
    public function setOptionText(string $option_text): void
    {
        $this->option_text = $option_text;
    }

    /**
     * @return MessageEntity[]|null
     */
    public function getOptionTextEntities(): ?array
    {
        return $this->option_text_entities;
    }

    /**
     * @param MessageEntity[]|null $option_text_entities
     */
    public function setOptionTextEntities(array $option_text_entities): void
    {
        $this->option_text_entities = $option_text_entities;
    }

}
