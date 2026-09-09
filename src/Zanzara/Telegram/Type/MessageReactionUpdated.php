<?php

declare(strict_types=1);

namespace Zanzara\Telegram\Type;

/**
 * This object represents a change of a reaction on a message performed by a user.
 *
 * More on https://core.telegram.org/bots/api#messagereactionupdated
 */
class MessageReactionUpdated
{

    /**
     * The chat containing the message the user reacted to
     *
     * @var Chat
     */
    private $chat;

    /**
     * Unique identifier of the message inside the chat
     *
     * @var int
     */
    private $message_id;

    /**
     * Optional. The user that changed the reaction, if the user isn't anonymous
     *
     * @var User|null
     */
    private $user;

    /**
     * Optional. The chat on behalf of which the reaction was changed, if the user is anonymous
     *
     * @var Chat|null
     */
    private $actor_chat;

    /**
     * Date of the change in Unix time
     *
     * @var int
     */
    private $date;

    /**
     * Previous list of reaction types that were set by the user
     *
     * @var ReactionType[]
     */
    private $old_reaction;

    /**
     * New list of reaction types that have been set by the user
     *
     * @var ReactionType[]
     */
    private $new_reaction;

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
    public function getMessageId(): int
    {
        return $this->message_id;
    }

    /**
     * @param int $message_id
     */
    public function setMessageId(int $message_id): void
    {
        $this->message_id = $message_id;
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
    public function setUser(?User $user): void
    {
        $this->user = $user;
    }

    /**
     * @return Chat|null
     */
    public function getActorChat(): ?Chat
    {
        return $this->actor_chat;
    }

    /**
     * @param Chat|null $actor_chat
     */
    public function setActorChat(?Chat $actor_chat): void
    {
        $this->actor_chat = $actor_chat;
    }

    /**
     * @return int
     */
    public function getDate(): int
    {
        return $this->date;
    }

    /**
     * @param int $date
     */
    public function setDate(int $date): void
    {
        $this->date = $date;
    }

    /**
     * @return ReactionType[]
     */
    public function getOldReaction(): array
    {
        return $this->old_reaction;
    }

    /**
     * @param ReactionType[] $old_reaction
     */
    public function setOldReaction(array $old_reaction): void
    {
        $this->old_reaction = $old_reaction;
    }

    /**
     * @return ReactionType[]
     */
    public function getNewReaction(): array
    {
        return $this->new_reaction;
    }

    /**
     * @param ReactionType[] $new_reaction
     */
    public function setNewReaction(array $new_reaction): void
    {
        $this->new_reaction = $new_reaction;
    }

}