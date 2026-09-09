<?php

declare(strict_types=1);

namespace Zanzara\Telegram\Type;

/**
 * This object contains information about a user that was shared with the bot using a KeyboardButtonRequestUsers button.
 */
class SharedUser
{

    /**
     * @var int
     */
    private $user_id;

    /**
     * @var string|null
     */
    private $first_name;

    /**
     * @var string|null
     */
    private $last_name;

    /**
     * @var string|null
     */
    private $username;

    /**
     * @var File\PhotoSize[]|null
     */
    private $photo;

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }

    /**
     * @param int $user_id
     */
    public function setUserId(int $user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return string|null
     */
    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    /**
     * @param string|null $first_name
     */
    public function setFirstName(string $first_name): void
    {
        $this->first_name = $first_name;
    }

    /**
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    /**
     * @param string|null $last_name
     */
    public function setLastName(string $last_name): void
    {
        $this->last_name = $last_name;
    }

    /**
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * @param string|null $username
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    /**
     * @return File\PhotoSize[]|null
     */
    public function getPhoto(): ?array
    {
        return $this->photo;
    }

    /**
     * @param File\PhotoSize[]|null $photo
     */
    public function setPhoto(array $photo): void
    {
        $this->photo = $photo;
    }

}
