<?php

declare(strict_types=1);

namespace Zanzara\Telegram\Type;

/**
 * Represents the rights of a business bot.
 *
 * More on https://core.telegram.org/bots/api#businessbotrights
 */
class BusinessBotRights
{

    /**
     * Optional. True, if the bot can reply to the business user's messages
     *
     * @var bool|null
     */
    private $can_reply;

    /**
     * Optional. True, if the bot can read messages
     *
     * @var bool|null
     */
    private $can_read_messages;

    /**
     * Optional. True, if the bot can delete messages sent by the business user
     *
     * @var bool|null
     */
    private $can_delete_sent_messages;

    /**
     * Optional. True, if the bot can delete all messages in the chat
     *
     * @var bool|null
     */
    private $can_delete_all_messages;

    /**
     * Optional. True, if the bot can edit the business user's name
     *
     * @var bool|null
     */
    private $can_edit_name;

    /**
     * Optional. True, if the bot can edit the business user's bio
     *
     * @var bool|null
     */
    private $can_edit_bio;

    /**
     * Optional. True, if the bot can edit the business user's profile photo
     *
     * @var bool|null
     */
    private $can_edit_profile_photo;

    /**
     * Optional. True, if the bot can edit the business user's username
     *
     * @var bool|null
     */
    private $can_edit_username;

    /**
     * Optional. True, if the bot can change the business user's gift settings
     *
     * @var bool|null
     */
    private $can_change_gift_settings;

    /**
     * Optional. True, if the bot can view gifts and stars earned by the business user
     *
     * @var bool|null
     */
    private $can_view_gifts_and_stars;

    /**
     * Optional. True, if the bot can convert gifts to Stars
     *
     * @var bool|null
     */
    private $can_convert_gifts_to_stars;

    /**
     * Optional. True, if the bot can transfer and upgrade gifts
     *
     * @var bool|null
     */
    private $can_transfer_and_upgrade_gifts;

    /**
     * Optional. True, if the bot can transfer Stars
     *
     * @var bool|null
     */
    private $can_transfer_stars;

    /**
     * Optional. True, if the bot can manage stories
     *
     * @var bool|null
     */
    private $can_manage_stories;

    /**
     * @return bool|null
     */
    public function canReply(): ?bool
    {
        return $this->can_reply;
    }

    /**
     * @param bool|null $can_reply
     */
    public function setCanReply(?bool $can_reply): void
    {
        $this->can_reply = $can_reply;
    }

    /**
     * @return bool|null
     */
    public function canReadMessages(): ?bool
    {
        return $this->can_read_messages;
    }

    /**
     * @param bool|null $can_read_messages
     */
    public function setCanReadMessages(?bool $can_read_messages): void
    {
        $this->can_read_messages = $can_read_messages;
    }

    /**
     * @return bool|null
     */
    public function canDeleteSentMessages(): ?bool
    {
        return $this->can_delete_sent_messages;
    }

    /**
     * @param bool|null $can_delete_sent_messages
     */
    public function setCanDeleteSentMessages(?bool $can_delete_sent_messages): void
    {
        $this->can_delete_sent_messages = $can_delete_sent_messages;
    }

    /**
     * @return bool|null
     */
    public function canDeleteAllMessages(): ?bool
    {
        return $this->can_delete_all_messages;
    }

    /**
     * @param bool|null $can_delete_all_messages
     */
    public function setCanDeleteAllMessages(?bool $can_delete_all_messages): void
    {
        $this->can_delete_all_messages = $can_delete_all_messages;
    }

    /**
     * @return bool|null
     */
    public function canEditName(): ?bool
    {
        return $this->can_edit_name;
    }

    /**
     * @param bool|null $can_edit_name
     */
    public function setCanEditName(?bool $can_edit_name): void
    {
        $this->can_edit_name = $can_edit_name;
    }

    /**
     * @return bool|null
     */
    public function canEditBio(): ?bool
    {
        return $this->can_edit_bio;
    }

    /**
     * @param bool|null $can_edit_bio
     */
    public function setCanEditBio(?bool $can_edit_bio): void
    {
        $this->can_edit_bio = $can_edit_bio;
    }

    /**
     * @return bool|null
     */
    public function canEditProfilePhoto(): ?bool
    {
        return $this->can_edit_profile_photo;
    }

    /**
     * @param bool|null $can_edit_profile_photo
     */
    public function setCanEditProfilePhoto(?bool $can_edit_profile_photo): void
    {
        $this->can_edit_profile_photo = $can_edit_profile_photo;
    }

    /**
     * @return bool|null
     */
    public function canEditUsername(): ?bool
    {
        return $this->can_edit_username;
    }

    /**
     * @param bool|null $can_edit_username
     */
    public function setCanEditUsername(?bool $can_edit_username): void
    {
        $this->can_edit_username = $can_edit_username;
    }

    /**
     * @return bool|null
     */
    public function canChangeGiftSettings(): ?bool
    {
        return $this->can_change_gift_settings;
    }

    /**
     * @param bool|null $can_change_gift_settings
     */
    public function setCanChangeGiftSettings(?bool $can_change_gift_settings): void
    {
        $this->can_change_gift_settings = $can_change_gift_settings;
    }

    /**
     * @return bool|null
     */
    public function canViewGiftsAndStars(): ?bool
    {
        return $this->can_view_gifts_and_stars;
    }

    /**
     * @param bool|null $can_view_gifts_and_stars
     */
    public function setCanViewGiftsAndStars(?bool $can_view_gifts_and_stars): void
    {
        $this->can_view_gifts_and_stars = $can_view_gifts_and_stars;
    }

    /**
     * @return bool|null
     */
    public function canConvertGiftsToStars(): ?bool
    {
        return $this->can_convert_gifts_to_stars;
    }

    /**
     * @param bool|null $can_convert_gifts_to_stars
     */
    public function setCanConvertGiftsToStars(?bool $can_convert_gifts_to_stars): void
    {
        $this->can_convert_gifts_to_stars = $can_convert_gifts_to_stars;
    }

    /**
     * @return bool|null
     */
    public function canTransferAndUpgradeGifts(): ?bool
    {
        return $this->can_transfer_and_upgrade_gifts;
    }

    /**
     * @param bool|null $can_transfer_and_upgrade_gifts
     */
    public function setCanTransferAndUpgradeGifts(?bool $can_transfer_and_upgrade_gifts): void
    {
        $this->can_transfer_and_upgrade_gifts = $can_transfer_and_upgrade_gifts;
    }

    /**
     * @return bool|null
     */
    public function canTransferStars(): ?bool
    {
        return $this->can_transfer_stars;
    }

    /**
     * @param bool|null $can_transfer_stars
     */
    public function setCanTransferStars(?bool $can_transfer_stars): void
    {
        $this->can_transfer_stars = $can_transfer_stars;
    }

    /**
     * @return bool|null
     */
    public function canManageStories(): ?bool
    {
        return $this->can_manage_stories;
    }

    /**
     * @param bool|null $can_manage_stories
     */
    public function setCanManageStories(?bool $can_manage_stories): void
    {
        $this->can_manage_stories = $can_manage_stories;
    }

}