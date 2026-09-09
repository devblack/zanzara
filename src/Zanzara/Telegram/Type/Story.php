<?php

declare(strict_types=1);

namespace Zanzara\Telegram\Type;

/**
 * This object represents a story.
 *
 * More on https://core.telegram.org/bots/api#story
 */
class Story
{

    /**
     * Chat that posted the story
     *
     * @var Chat
     */
    private $chat;

    /**
     * Unique identifier of the story
     *
     * @var int
     */
    private $id;

    /**
     * @return Chat
     */
    public function getChat(): Chat
    {
        return $this->chat;
    }

    /**
     * @param Chat $chat
     */
    public function setChat(Chat $chat): void
    {
        $this->chat = $chat;
    }

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

}