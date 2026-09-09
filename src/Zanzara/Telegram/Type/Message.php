<?php

declare(strict_types=1);

namespace Zanzara\Telegram\Type;

use Zanzara\Telegram\Type\File\Animation;
use Zanzara\Telegram\Type\File\Audio;
use Zanzara\Telegram\Type\File\Contact;
use Zanzara\Telegram\Type\File\Document;
use Zanzara\Telegram\Type\File\Location;
use Zanzara\Telegram\Type\File\Sticker;
use Zanzara\Telegram\Type\File\Venue;
use Zanzara\Telegram\Type\File\Video;
use Zanzara\Telegram\Type\File\VideoNote;
use Zanzara\Telegram\Type\File\Voice;
use Zanzara\Telegram\Type\Forum\ForumTopicClosed;
use Zanzara\Telegram\Type\Forum\ForumTopicCreated;
use Zanzara\Telegram\Type\Forum\ForumTopicEdited;
use Zanzara\Telegram\Type\Forum\ForumTopicReopened;
use Zanzara\Telegram\Type\Forum\GeneralForumTopicHidden;
use Zanzara\Telegram\Type\Forum\GeneralForumTopicUnhidden;
use Zanzara\Telegram\Type\Forum\WriteAccessAllowed;
use Zanzara\Telegram\Type\Game\Game;
use Zanzara\Telegram\Type\Keyboard\InlineKeyboardMarkup;
use Zanzara\Telegram\Type\Miscellaneous\Dice;
use Zanzara\Telegram\Type\Passport\PassportData;
use Zanzara\Telegram\Type\Poll\Poll;
use Zanzara\Telegram\Type\Shipping\Invoice;
use Zanzara\Telegram\Type\Shipping\SuccessfulPayment;
use Zanzara\Telegram\Type\WebApp\WebAppData;

/**
 * This object represents a message.
 *
 * More on https://core.telegram.org/bots/api#message
 */
class Message
{

    /**
     * Unique message identifier inside this chat
     *
     * @var int
     */
    private $message_id;

    /**
     * Optional. Unique identifier of a message thread to which the message belongs; for supergroups only
     *
     * @var int|null
     */
    private $message_thread_id;

    /**
     * Optional. Sender of the message; empty for messages sent to channels.
     * For backward compatibility, the field contains a fake sender user in non-channel chats,
     * if the message was sent on behalf of a chat.
     *
     * @var User|null
     */
    private $from;

    /**
     * Optional. Sender of the message, sent on behalf of a chat. For example, the channel itself for channel posts,
     * the supergroup itself for messages from anonymous group administrators, the linked channel for messages
     * automatically forwarded to the discussion group. For backward compatibility, the field from contains
     * a fake sender user in non-channel chats, if the message was sent on behalf of a chat.
     *
     * @var Chat|null
     */
    private $sender_chat;

    /**
     * Date the message was sent in Unix time
     *
     * @var int
     */
    private $date;

    /**
     * Conversation the message belongs to
     *
     * @var Chat
     */
    private $chat;

    /**
     * Optional. For forwarded messages, sender of the original message
     *
     * @var User|null
     */
    private $forward_from;

    /**
     * Optional. For messages forwarded from channels or from anonymous administrators, information about the original sender chat
     *
     * @var Chat|null
     */
    private $forward_from_chat;

    /**
     * Optional. For messages forwarded from channels, identifier of the original message in the channel
     *
     * @var int|null
     */
    private $forward_from_message_id;

    /**
     * Optional. For forwarded messages that were originally sent in channels or by an anonymous chat administrator,
     * signature of the message sender if present
     *
     * @var string|null
     */
    private $forward_signature;

    /**
     * Optional. Sender's name for messages forwarded from users who disallow adding a link
     * to their account in forwarded messages
     *
     * @var string|null
     */
    private $forward_sender_name;

    /**
     * Optional. For forwarded messages, date the original message was sent in Unix time
     *
     * @var int|null
     */
    private $forward_date;

    /**
     * Optional. True, if the message is sent to a forum topic
     *
     * @var bool|null
     */
    private $is_topic_message;

    /**
     * Optional. True, if the message is a channel post that was automatically forwarded to the connected discussion group
     *
     * @var bool|null
     */
    private $is_automatic_forward;

    /**
     * Optional. For replies, the original message. Note that the Message object in this field will not contain further
     * reply_to_message fields even if it itself is a reply
     *
     * @var Message|null
     */
    private $reply_to_message;

    /**
     * Optional. Bot through which the message was sent
     *
     * @var User|null
     */
    private $via_bot;

    /**
     * Optional. Date the message was last edited in Unix time
     *
     * @var int|null
     */
    private $edit_date;

    /**
     * Optional. True, if the message can't be forwarded
     *
     * @var bool|null
     */
    private $has_protected_content;

    /**
     * Optional. The unique identifier of a media message group this message belongs to
     *
     * @var string|null
     */
    private $media_group_id;

    /**
     * Optional. Signature of the post author for messages in channels, or the custom title
     * of an anonymous group administrator
     *
     * @var string|null
     */
    private $author_signature;

    /**
     * Optional. For text messages, the actual UTF-8 text of the message
     *
     * @var string|null
     */
    private $text;

    /**
     * Optional. For text messages, special entities like usernames, URLs, bot commands, etc. that appear in the text
     *
     * @var MessageEntity[]|null
     */
    private $entities;

    /**
     * Optional. Message is an animation, information about the animation. For backward compatibility,
     * when this field is set, the document field will also be set
     *
     * @var Animation|null
     */
    private $animation;

    /**
     * Optional. Message is an audio file, information about the file
     *
     * @var Audio|null
     */
    private $audio;

    /**
     * Optional. Message is a general file, information about the file
     *
     * @var Document|null
     */
    private $document;

    /**
     * Optional. Message is a photo, available sizes of the photo
     *
     * @var File\PhotoSize[]|null
     */
    private $photo;

    /**
     * Optional. Message is a sticker, information about the sticker
     *
     * @var Sticker|null
     */
    private $sticker;

    /**
     * Optional. Message is a video, information about the video
     *
     * @var Video|null
     */
    private $video;

    /**
     * Optional. Message is a video note, information about the video message
     *
     * @var VideoNote|null
     */
    private $video_note;

    /**
     * Optional. Message is a voice message, information about the file
     *
     * @var Voice|null
     */
    private $voice;

    /**
     * Optional. Caption for the animation, audio, document, photo, video or voice
     *
     * @var string|null
     */
    private $caption;

    /**
     * Optional. For messages with a caption, special entities like usernames, URLs, bot commands, etc.
     * that appear in the caption
     *
     * @var MessageEntity[]|null
     */
    private $caption_entities;

    /**
     * Optional. True, if the message media is covered by a spoiler animation
     *
     * @var bool|null
     */
    private $has_media_spoiler;

    /**
     * Optional. Message is a shared contact, information about the contact
     *
     * @var Contact|null
     */
    private $contact;

    /**
     * Optional. Message is a dice with random value
     *
     * @var Dice|null
     */
    private $dice;

    /**
     * Optional. Message is a game, information about the game
     *
     * @var Game|null
     */
    private $game;

    /**
     * Optional. Message is a native poll, information about the poll
     *
     * @var Poll|null
     */
    private $poll;

    /**
     * Optional. Message is a venue, information about the venue.
     * For backward compatibility, when this field is set, the location field will also be set
     *
     * @var Venue|null
     */
    private $venue;

    /**
     * Optional. Message is a shared location, information about the location
     *
     * @var Location|null
     */
    private $location;

    /**
     * Optional. New members that were added to the group or supergroup
     * and information about them (the bot itself may be one of these members)
     *
     * @var User[]|null
     */
    private $new_chat_members;

    /**
     * Optional. A member was removed from the group, information about them (this member may be the bot itself)
     *
     * @var User|null
     */
    private $left_chat_member;

    /**
     * Optional. A chat title was changed to this value
     *
     * @var string|null
     */
    private $new_chat_title;

    /**
     * Optional. A chat photo was change to this value
     *
     * @var File\PhotoSize[]|null
     */
    private $new_chat_photo;

    /**
     * Optional. Service message: the chat photo was deleted
     *
     * @var bool|null
     */
    private $delete_chat_photo;

    /**
     * Optional. Service message: the group has been created
     *
     * @var bool|null
     */
    private $group_chat_created;

    /**
     * Optional. Service message: the supergroup has been created. This field can't be received in a message coming
     * through updates, because bot can't be a member of a supergroup when it is created.
     * It can only be found in reply_to_message if someone replies to a very first message in a directly created supergroup.
     *
     * @var bool|null
     */
    private $supergroup_chat_created;

    /**
     * Optional. Service message: the channel has been created. This field can't be received in a message coming
     * through updates, because bot can't be a member of a channel when it is created.
     * It can only be found in reply_to_message if someone replies to a very first message in a channel.
     *
     * @var bool|null
     */
    private $channel_chat_created;

    /**
     * Optional. Service message: auto-delete timer settings changed in the chat
     *
     * @var MessageAutoDeleteTimerChanged|null
     */
    private $message_auto_delete_timer_changed;

    /**
     * Optional. The group has been migrated to a supergroup with the specified identifier. This number may be greater than
     * 32 bits and some programming languages may have difficulty/silent defects in interpreting it. But it is smaller
     * than 52 bits, so a signed 64 bit integer or double-precision float type are safe for storing this identifier.
     *
     * @var int|null
     */
    private $migrate_to_chat_id;

    /**
     * Optional. The supergroup has been migrated from a group with the specified identifier. This number may be greater
     * than 32 bits and some programming languages may have difficulty/silent defects in interpreting it. But it is
     * smaller than 52 bits, so a signed 64 bit integer or double-precision float type are safe for storing this
     * identifier.
     *
     * @var int|null
     */
    private $migrate_from_chat_id;

    /**
     * Optional. Specified message was pinned. Note that the Message object in this field will not contain further
     * reply_to_message fields even if it is itself a reply.
     *
     * @var Message|null
     */
    private $pinned_message;

    /**
     * Optional. Message is an invoice for a payment, information about the invoice.
     *
     * @var Invoice|null
     */
    private $invoice;

    /**
     * Optional. Message is a service message about a successful payment, information about the payment
     *
     * @var SuccessfulPayment|null
     */
    private $successful_payment;

    /**
     * Optional. Service message: a user was shared with the bot
     *
     * @var UserShared|null
     */
    private $user_shared;

    /**
     * Optional. Service message: a chat was shared with the bot
     *
     * @var ChatShared|null
     */
    private $chat_shared;

    /**
     * Optional. The domain name of the website on which the user has logged in
     *
     * @var string|null
     */
    private $connected_website;

    /**
     * Optional. Service message: the user allowed the bot added to the attachment menu to write messages
     *
     * @var WriteAccessAllowed|null
     */
    private $write_access_allowed;

    /**
     * Optional. Telegram Passport data
     *
     * @var PassportData|null
     */
    private $passport_data;

    /**
     * Optional. Service message. A user in the chat triggered another user's proximity alert while sharing Live Location.
     *
     * @var ProximityAlertTriggered|null
     */
    private $proximity_alert_triggered;

    /**
     * Optional. Service message: forum topic created
     *
     * @var ForumTopicCreated|null
     */
    private $forum_topic_created;

    /**
     * Optional. Service message: forum topic edited
     *
     * @var ForumTopicEdited|null
     */
    private $forum_topic_edited;

    /**
     * Optional. Service message: forum topic closed
     *
     * @var ForumTopicClosed|null
     */
    private $forum_topic_closed;

    /**
     * Optional. Service message: forum topic reopened
     *
     * @var ForumTopicReopened|null
     */
    private $forum_topic_reopened;

    /**
     * Optional. Service message: the 'General' forum topic hidden
     *
     * @var GeneralForumTopicHidden|null
     */
    private $general_forum_topic_hidden;

    /**
     * Optional. Service message: the 'General' forum topic unhidden
     *
     * @var GeneralForumTopicUnhidden|null
     */
    private $general_forum_topic_unhidden;

    /**
     * Optional. Service message: video chat scheduled
     *
     * @var VideoChatScheduled|null
     */
    private $video_chat_scheduled;

    /**
     * Optional. Service message: video chat started
     *
     * @var VideoChatStarted|null
     */
    private $video_chat_started;

    /**
     * Optional. Service message: video chat ended
     *
     * @var VideoChatEnded|null
     */
    private $video_chat_ended;

    /**
     * Optional. Service message: new participants invited to a video chat
     *
     * @var VideoChatParticipantsInvited|null
     */
    private $video_chat_participants_invited;

    /**
     * Optional. Service message: data sent by a Web App
     *
     * @var WebAppData|null
     */
    private $web_app_data;

    /**
     * Optional. Inline keyboard attached to the message. login_url buttons are represented as ordinary url buttons.
     *
     * @var InlineKeyboardMarkup|null
     */
    private $reply_markup;

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
     * @return int|null
     */
    public function getMessageThreadId(): ?int
    {
        return $this->message_thread_id;
    }

    /**
     * @param int|null $message_thread_id
     */
    public function setMessageThreadId(?int $message_thread_id): void
    {
        $this->message_thread_id = $message_thread_id;
    }

    /**
     * @return User|null
     */
    public function getFrom(): ?User
    {
        return $this->from;
    }

    /**
     * @param User|null $from
     */
    public function setFrom(?User $from): void
    {
        $this->from = $from;
    }

    /**
     * @return Chat|null
     */
    public function getSenderChat(): ?Chat
    {
        return $this->sender_chat;
    }

    /**
     * @param Chat|null $sender_chat
     */
    public function setSenderChat(?Chat $sender_chat): void
    {
        $this->sender_chat = $sender_chat;
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
     * @return User|null
     */
    public function getForwardFrom(): ?User
    {
        return $this->forward_from;
    }

    /**
     * @param User|null $forward_from
     */
    public function setForwardFrom(?User $forward_from): void
    {
        $this->forward_from = $forward_from;
    }

    /**
     * @return Chat|null
     */
    public function getForwardFromChat(): ?Chat
    {
        return $this->forward_from_chat;
    }

    /**
     * @param Chat|null $forward_from_chat
     */
    public function setForwardFromChat(?Chat $forward_from_chat): void
    {
        $this->forward_from_chat = $forward_from_chat;
    }

    /**
     * @return int|null
     */
    public function getForwardFromMessageId(): ?int
    {
        return $this->forward_from_message_id;
    }

    /**
     * @param int|null $forward_from_message_id
     */
    public function setForwardFromMessageId(?int $forward_from_message_id): void
    {
        $this->forward_from_message_id = $forward_from_message_id;
    }

    /**
     * @return string|null
     */
    public function getForwardSignature(): ?string
    {
        return $this->forward_signature;
    }

    /**
     * @param string|null $forward_signature
     */
    public function setForwardSignature(?string $forward_signature): void
    {
        $this->forward_signature = $forward_signature;
    }

    /**
     * @return string|null
     */
    public function getForwardSenderName(): ?string
    {
        return $this->forward_sender_name;
    }

    /**
     * @param string|null $forward_sender_name
     */
    public function setForwardSenderName(?string $forward_sender_name): void
    {
        $this->forward_sender_name = $forward_sender_name;
    }

    /**
     * @return int|null
     */
    public function getForwardDate(): ?int
    {
        return $this->forward_date;
    }

    /**
     * @param int|null $forward_date
     */
    public function setForwardDate(?int $forward_date): void
    {
        $this->forward_date = $forward_date;
    }

    /**
     * @return bool|null
     */
    public function isTopicMessage(): ?bool
    {
        return $this->is_topic_message;
    }

    /**
     * @param bool|null $is_topic_message
     */
    public function setIsTopicMessage(?bool $is_topic_message): void
    {
        $this->is_topic_message = $is_topic_message;
    }

    /**
     * @return bool|null
     */
    public function isAutomaticForward(): ?bool
    {
        return $this->is_automatic_forward;
    }

    /**
     * @param bool|null $is_automatic_forward
     */
    public function setIsAutomaticForward(?bool $is_automatic_forward): void
    {
        $this->is_automatic_forward = $is_automatic_forward;
    }

    /**
     * @return Message|null
     */
    public function getReplyToMessage(): ?Message
    {
        return $this->reply_to_message;
    }

    /**
     * @param Message|null $reply_to_message
     */
    public function setReplyToMessage(?Message $reply_to_message): void
    {
        $this->reply_to_message = $reply_to_message;
    }

    /**
     * @return User|null
     */
    public function getViaBot(): ?User
    {
        return $this->via_bot;
    }

    /**
     * @param User|null $via_bot
     */
    public function setViaBot(?User $via_bot): void
    {
        $this->via_bot = $via_bot;
    }

    /**
     * @return int|null
     */
    public function getEditDate(): ?int
    {
        return $this->edit_date;
    }

    /**
     * @param int|null $edit_date
     */
    public function setEditDate(?int $edit_date): void
    {
        $this->edit_date = $edit_date;
    }

    /**
     * @return bool|null
     */
    public function hasProtectedContent(): ?bool
    {
        return $this->has_protected_content;
    }

    /**
     * @param bool|null $has_protected_content
     */
    public function setHasProtectedContent(?bool $has_protected_content): void
    {
        $this->has_protected_content = $has_protected_content;
    }

    /**
     * @return string|null
     */
    public function getMediaGroupId(): ?string
    {
        return $this->media_group_id;
    }

    /**
     * @param string|null $media_group_id
     */
    public function setMediaGroupId(?string $media_group_id): void
    {
        $this->media_group_id = $media_group_id;
    }

    /**
     * @return string|null
     */
    public function getAuthorSignature(): ?string
    {
        return $this->author_signature;
    }

    /**
     * @param string|null $author_signature
     */
    public function setAuthorSignature(?string $author_signature): void
    {
        $this->author_signature = $author_signature;
    }

    /**
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * @param string|null $text
     */
    public function setText(?string $text): void
    {
        $this->text = $text;
    }

    /**
     * @return MessageEntity[]|null
     */
    public function getEntities(): ?array
    {
        return $this->entities;
    }

    /**
     * @param MessageEntity[]|null $entities
     */
    public function setEntities(?array $entities): void
    {
        $this->entities = $entities;
    }

    /**
     * @return Animation|null
     */
    public function getAnimation(): ?Animation
    {
        return $this->animation;
    }

    /**
     * @param Animation|null $animation
     */
    public function setAnimation(?Animation $animation): void
    {
        $this->animation = $animation;
    }

    /**
     * @return Audio|null
     */
    public function getAudio(): ?Audio
    {
        return $this->audio;
    }

    /**
     * @param Audio|null $audio
     */
    public function setAudio(?Audio $audio): void
    {
        $this->audio = $audio;
    }

    /**
     * @return Document|null
     */
    public function getDocument(): ?Document
    {
        return $this->document;
    }

    /**
     * @param Document|null $document
     */
    public function setDocument(?Document $document): void
    {
        $this->document = $document;
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
    public function setPhoto(?array $photo): void
    {
        $this->photo = $photo;
    }

    /**
     * @return Sticker|null
     */
    public function getSticker(): ?Sticker
    {
        return $this->sticker;
    }

    /**
     * @param Sticker|null $sticker
     */
    public function setSticker(?Sticker $sticker): void
    {
        $this->sticker = $sticker;
    }

    /**
     * @return Video|null
     */
    public function getVideo(): ?Video
    {
        return $this->video;
    }

    /**
     * @param Video|null $video
     */
    public function setVideo(?Video $video): void
    {
        $this->video = $video;
    }

    /**
     * @return VideoNote|null
     */
    public function getVideoNote(): ?VideoNote
    {
        return $this->video_note;
    }

    /**
     * @param VideoNote|null $video_note
     */
    public function setVideoNote(?VideoNote $video_note): void
    {
        $this->video_note = $video_note;
    }

    /**
     * @return Voice|null
     */
    public function getVoice(): ?Voice
    {
        return $this->voice;
    }

    /**
     * @param Voice|null $voice
     */
    public function setVoice(?Voice $voice): void
    {
        $this->voice = $voice;
    }

    /**
     * @return string|null
     */
    public function getCaption(): ?string
    {
        return $this->caption;
    }

    /**
     * @param string|null $caption
     */
    public function setCaption(?string $caption): void
    {
        $this->caption = $caption;
    }

    /**
     * @return MessageEntity[]|null
     */
    public function getCaptionEntities(): ?array
    {
        return $this->caption_entities;
    }

    /**
     * @param MessageEntity[]|null $caption_entities
     */
    public function setCaptionEntities(?array $caption_entities): void
    {
        $this->caption_entities = $caption_entities;
    }

    /**
     * @return bool|null
     */
    public function hasMediaSpoiler(): ?bool
    {
        return $this->has_media_spoiler;
    }

    /**
     * @param bool|null $has_media_spoiler
     */
    public function setHasMediaSpoiler(?bool $has_media_spoiler): void
    {
        $this->has_media_spoiler = $has_media_spoiler;
    }

    /**
     * @return Contact|null
     */
    public function getContact(): ?Contact
    {
        return $this->contact;
    }

    /**
     * @param Contact|null $contact
     */
    public function setContact(?Contact $contact): void
    {
        $this->contact = $contact;
    }

    /**
     * @return Dice|null
     */
    public function getDice(): ?Dice
    {
        return $this->dice;
    }

    /**
     * @param Dice|null $dice
     */
    public function setDice(?Dice $dice): void
    {
        $this->dice = $dice;
    }

    /**
     * @return Game|null
     */
    public function getGame(): ?Game
    {
        return $this->game;
    }

    /**
     * @param Game|null $game
     */
    public function setGame(?Game $game): void
    {
        $this->game = $game;
    }

    /**
     * @return Poll|null
     */
    public function getPoll(): ?Poll
    {
        return $this->poll;
    }

    /**
     * @param Poll|null $poll
     */
    public function setPoll(?Poll $poll): void
    {
        $this->poll = $poll;
    }

    /**
     * @return Venue|null
     */
    public function getVenue(): ?Venue
    {
        return $this->venue;
    }

    /**
     * @param Venue|null $venue
     */
    public function setVenue(?Venue $venue): void
    {
        $this->venue = $venue;
    }

    /**
     * @return Location|null
     */
    public function getLocation(): ?Location
    {
        return $this->location;
    }

    /**
     * @param Location|null $location
     */
    public function setLocation(?Location $location): void
    {
        $this->location = $location;
    }

    /**
     * @return User[]|null
     */
    public function getNewChatMembers(): ?array
    {
        return $this->new_chat_members;
    }

    /**
     * @param User[]|null $new_chat_members
     */
    public function setNewChatMembers(?array $new_chat_members): void
    {
        $this->new_chat_members = $new_chat_members;
    }

    /**
     * @return User|null
     */
    public function getLeftChatMember(): ?User
    {
        return $this->left_chat_member;
    }

    /**
     * @param User|null $left_chat_member
     */
    public function setLeftChatMember(?User $left_chat_member): void
    {
        $this->left_chat_member = $left_chat_member;
    }

    /**
     * @return string|null
     */
    public function getNewChatTitle(): ?string
    {
        return $this->new_chat_title;
    }

    /**
     * @param string|null $new_chat_title
     */
    public function setNewChatTitle(?string $new_chat_title): void
    {
        $this->new_chat_title = $new_chat_title;
    }

    /**
     * @return File\PhotoSize[]|null
     */
    public function getNewChatPhoto(): ?array
    {
        return $this->new_chat_photo;
    }

    /**
     * @param File\PhotoSize[]|null $new_chat_photo
     */
    public function setNewChatPhoto(?array $new_chat_photo): void
    {
        $this->new_chat_photo = $new_chat_photo;
    }

    /**
     * @return bool|null
     */
    public function getDeleteChatPhoto(): ?bool
    {
        return $this->delete_chat_photo;
    }

    /**
     * @param bool|null $delete_chat_photo
     */
    public function setDeleteChatPhoto(?bool $delete_chat_photo): void
    {
        $this->delete_chat_photo = $delete_chat_photo;
    }

    /**
     * @return bool|null
     */
    public function getGroupChatCreated(): ?bool
    {
        return $this->group_chat_created;
    }

    /**
     * @param bool|null $group_chat_created
     */
    public function setGroupChatCreated(?bool $group_chat_created): void
    {
        $this->group_chat_created = $group_chat_created;
    }

    /**
     * @return bool|null
     */
    public function getSupergroupChatCreated(): ?bool
    {
        return $this->supergroup_chat_created;
    }

    /**
     * @param bool|null $supergroup_chat_created
     */
    public function setSupergroupChatCreated(?bool $supergroup_chat_created): void
    {
        $this->supergroup_chat_created = $supergroup_chat_created;
    }

    /**
     * @return bool|null
     */
    public function getChannelChatCreated(): ?bool
    {
        return $this->channel_chat_created;
    }

    /**
     * @param bool|null $channel_chat_created
     */
    public function setChannelChatCreated(?bool $channel_chat_created): void
    {
        $this->channel_chat_created = $channel_chat_created;
    }

    /**
     * @return MessageAutoDeleteTimerChanged|null
     */
    public function getMessageAutoDeleteTimerChanged(): ?MessageAutoDeleteTimerChanged
    {
        return $this->message_auto_delete_timer_changed;
    }

    /**
     * @param MessageAutoDeleteTimerChanged|null $message_auto_delete_timer_changed
     */
    public function setMessageAutoDeleteTimerChanged(?MessageAutoDeleteTimerChanged $message_auto_delete_timer_changed): void
    {
        $this->message_auto_delete_timer_changed = $message_auto_delete_timer_changed;
    }

    /**
     * @return int|null
     */
    public function getMigrateToChatId(): ?int
    {
        return $this->migrate_to_chat_id;
    }

    /**
     * @param int|null $migrate_to_chat_id
     */
    public function setMigrateToChatId(?int $migrate_to_chat_id): void
    {
        $this->migrate_to_chat_id = $migrate_to_chat_id;
    }

    /**
     * @return int|null
     */
    public function getMigrateFromChatId(): ?int
    {
        return $this->migrate_from_chat_id;
    }

    /**
     * @param int|null $migrate_from_chat_id
     */
    public function setMigrateFromChatId(?int $migrate_from_chat_id): void
    {
        $this->migrate_from_chat_id = $migrate_from_chat_id;
    }

    /**
     * @return Message|null
     */
    public function getPinnedMessage(): ?Message
    {
        return $this->pinned_message;
    }

    /**
     * @param Message|null $pinned_message
     */
    public function setPinnedMessage(?Message $pinned_message): void
    {
        $this->pinned_message = $pinned_message;
    }

    /**
     * @return Invoice|null
     */
    public function getInvoice(): ?Invoice
    {
        return $this->invoice;
    }

    /**
     * @param Invoice|null $invoice
     */
    public function setInvoice(?Invoice $invoice): void
    {
        $this->invoice = $invoice;
    }

    /**
     * @return SuccessfulPayment|null
     */
    public function getSuccessfulPayment(): ?SuccessfulPayment
    {
        return $this->successful_payment;
    }

    /**
     * @param SuccessfulPayment|null $successful_payment
     */
    public function setSuccessfulPayment(?SuccessfulPayment $successful_payment): void
    {
        $this->successful_payment = $successful_payment;
    }

    /**
     * @return UserShared|null
     */
    public function getUserShared(): ?UserShared
    {
        return $this->user_shared;
    }

    /**
     * @param UserShared|null $user_shared
     */
    public function setUserShared(?UserShared $user_shared): void
    {
        $this->user_shared = $user_shared;
    }

    /**
     * @return ChatShared|null
     */
    public function getChatShared(): ?ChatShared
    {
        return $this->chat_shared;
    }

    /**
     * @param ChatShared|null $chat_shared
     */
    public function setChatShared(?ChatShared $chat_shared): void
    {
        $this->chat_shared = $chat_shared;
    }

    /**
     * @return string|null
     */
    public function getConnectedWebsite(): ?string
    {
        return $this->connected_website;
    }

    /**
     * @param string|null $connected_website
     */
    public function setConnectedWebsite(?string $connected_website): void
    {
        $this->connected_website = $connected_website;
    }

    /**
     * @return WriteAccessAllowed|null
     */
    public function getWriteAccessAllowed(): ?WriteAccessAllowed
    {
        return $this->write_access_allowed;
    }

    /**
     * @param WriteAccessAllowed|null $write_access_allowed
     */
    public function setWriteAccessAllowed(?WriteAccessAllowed $write_access_allowed): void
    {
        $this->write_access_allowed = $write_access_allowed;
    }

    /**
     * @return PassportData|null
     */
    public function getPassportData(): ?PassportData
    {
        return $this->passport_data;
    }

    /**
     * @param PassportData|null $passport_data
     */
    public function setPassportData(?PassportData $passport_data): void
    {
        $this->passport_data = $passport_data;
    }

    /**
     * @return ProximityAlertTriggered|null
     */
    public function getProximityAlertTriggered(): ?ProximityAlertTriggered
    {
        return $this->proximity_alert_triggered;
    }

    /**
     * @param ProximityAlertTriggered|null $proximity_alert_triggered
     */
    public function setProximityAlertTriggered(?ProximityAlertTriggered $proximity_alert_triggered): void
    {
        $this->proximity_alert_triggered = $proximity_alert_triggered;
    }

    /**
     * @return ForumTopicCreated|null
     */
    public function getForumTopicCreated(): ?ForumTopicCreated
    {
        return $this->forum_topic_created;
    }

    /**
     * @param ForumTopicCreated|null $forum_topic_created
     */
    public function setForumTopicCreated(?ForumTopicCreated $forum_topic_created): void
    {
        $this->forum_topic_created = $forum_topic_created;
    }

    /**
     * @return ForumTopicEdited|null
     */
    public function getForumTopicEdited(): ?ForumTopicEdited
    {
        return $this->forum_topic_edited;
    }

    /**
     * @param ForumTopicEdited|null $forum_topic_edited
     */
    public function setForumTopicEdited(?ForumTopicEdited $forum_topic_edited): void
    {
        $this->forum_topic_edited = $forum_topic_edited;
    }

    /**
     * @return ForumTopicClosed|null
     */
    public function getForumTopicClosed(): ?ForumTopicClosed
    {
        return $this->forum_topic_closed;
    }

    /**
     * @param ForumTopicClosed|null $forum_topic_closed
     */
    public function setForumTopicClosed(?ForumTopicClosed $forum_topic_closed): void
    {
        $this->forum_topic_closed = $forum_topic_closed;
    }

    /**
     * @return ForumTopicReopened|null
     */
    public function getForumTopicReopened(): ?ForumTopicReopened
    {
        return $this->forum_topic_reopened;
    }

    /**
     * @param ForumTopicReopened|null $forum_topic_reopened
     */
    public function setForumTopicReopened(?ForumTopicReopened $forum_topic_reopened): void
    {
        $this->forum_topic_reopened = $forum_topic_reopened;
    }

    /**
     * @return GeneralForumTopicHidden|null
     */
    public function getGeneralForumTopicHidden(): ?GeneralForumTopicHidden
    {
        return $this->general_forum_topic_hidden;
    }

    /**
     * @param GeneralForumTopicHidden|null $general_forum_topic_hidden
     */
    public function setGeneralForumTopicHidden(?GeneralForumTopicHidden $general_forum_topic_hidden): void
    {
        $this->general_forum_topic_hidden = $general_forum_topic_hidden;
    }

    /**
     * @return GeneralForumTopicUnhidden|null
     */
    public function getGeneralForumTopicUnhidden(): ?GeneralForumTopicUnhidden
    {
        return $this->general_forum_topic_unhidden;
    }

    /**
     * @param GeneralForumTopicUnhidden|null $general_forum_topic_unhidden
     */
    public function setGeneralForumTopicUnhidden(?GeneralForumTopicUnhidden $general_forum_topic_unhidden): void
    {
        $this->general_forum_topic_unhidden = $general_forum_topic_unhidden;
    }

    /**
     * @return VideoChatScheduled|null
     */
    public function getVideoChatScheduled(): ?VideoChatScheduled
    {
        return $this->video_chat_scheduled;
    }

    /**
     * @param VideoChatScheduled|null $video_chat_scheduled
     */
    public function setVideoChatScheduled(?VideoChatScheduled $video_chat_scheduled): void
    {
        $this->video_chat_scheduled = $video_chat_scheduled;
    }

    /**
     * @return VideoChatStarted|null
     */
    public function getVideoChatStarted(): ?VideoChatStarted
    {
        return $this->video_chat_started;
    }

    /**
     * @param VideoChatStarted|null $video_chat_started
     */
    public function setVideoChatStarted(?VideoChatStarted $video_chat_started): void
    {
        $this->video_chat_started = $video_chat_started;
    }

    /**
     * @return VideoChatEnded|null
     */
    public function getVideoChatEnded(): ?VideoChatEnded
    {
        return $this->video_chat_ended;
    }

    /**
     * @param VideoChatEnded|null $video_chat_ended
     */
    public function setVideoChatEnded(?VideoChatEnded $video_chat_ended): void
    {
        $this->video_chat_ended = $video_chat_ended;
    }

    /**
     * @return VideoChatParticipantsInvited|null
     */
    public function getVideoChatParticipantsInvited(): ?VideoChatParticipantsInvited
    {
        return $this->video_chat_participants_invited;
    }

    /**
     * @param VideoChatParticipantsInvited|null $video_chat_participants_invited
     */
    public function setVideoChatParticipantsInvited(?VideoChatParticipantsInvited $video_chat_participants_invited): void
    {
        $this->video_chat_participants_invited = $video_chat_participants_invited;
    }

    /**
     * @return WebAppData|null
     */
    public function getWebAppData(): ?WebAppData
    {
        return $this->web_app_data;
    }

    /**
     * @param WebAppData|null $web_app_data
     */
    public function setWebAppData(?WebAppData $web_app_data): void
    {
        $this->web_app_data = $web_app_data;
    }

    /**
     * @return InlineKeyboardMarkup|null
     */
    public function getReplyMarkup(): ?InlineKeyboardMarkup
    {
        return $this->reply_markup;
    }

    /**
     * @param InlineKeyboardMarkup|null $reply_markup
     */
    public function setReplyMarkup(?InlineKeyboardMarkup $reply_markup): void
    {
        $this->reply_markup = $reply_markup;
    }

    /**
     * Optional. Information about the direct messages chat topic that contains the message
     *
     * @var DirectMessagesTopic|null
     */
    private $direct_messages_topic;

    /**
     * Optional. If the sender of the message boosted the chat, the number of boosts added by the user
     *
     * @var int|null
     */
    private $sender_boost_count;

    /**
     * Optional. The bot that actually sent the message on behalf of the business account
     *
     * @var User|null
     */
    private $sender_business_bot;

    /**
     * Optional. Tag or custom title of the sender of the message; for supergroups only
     *
     * @var string|null
     */
    private $sender_tag;

    /**
     * Optional. For ephemeral messages, the user who received the message
     *
     * @var User|null
     */
    private $receiver_user;

    /**
     * Optional. For ephemeral messages, identifier of the ephemeral message inside this chat
     *
     * @var int|null
     */
    private $ephemeral_message_id;

    /**
     * Optional. The unique identifier for the guest query. Use this identifier with the method answerGuestQuery to
     * send a response message
     *
     * @var string|null
     */
    private $guest_query_id;

    /**
     * Optional. Unique identifier of the business connection from which the message was received
     *
     * @var string|null
     */
    private $business_connection_id;

    /**
     * Optional. Information about the original message for forwarded messages
     *
     * @var MessageOrigin|null
     */
    private $forward_origin;

    /**
     * Optional. Information about the message that is being replied to, which may come from another chat or forum
     * topic
     *
     * @var ExternalReplyInfo|null
     */
    private $external_reply;

    /**
     * Optional. For replies that quote part of the original message, the quoted part of the message
     *
     * @var TextQuote|null
     */
    private $quote;

    /**
     * Optional. For replies to a story, the original story
     *
     * @var Story|null
     */
    private $reply_to_story;

    /**
     * Optional. Identifier of the specific checklist task that is being replied to
     *
     * @var int|null
     */
    private $reply_to_checklist_task_id;

    /**
     * Optional. Persistent identifier of the specific poll option that is being replied to
     *
     * @var string|null
     */
    private $reply_to_poll_option_id;

    /**
     * Optional. For a message sent by a guest bot, the user whose original message triggered the bot's response
     *
     * @var User|null
     */
    private $guest_bot_caller_user;

    /**
     * Optional. For a message sent by a guest bot, the chat whose original message triggered the bot's response
     *
     * @var Chat|null
     */
    private $guest_bot_caller_chat;

    /**
     * Optional. True, if the message was sent by an implicit action, for example, as an away or a greeting business
     * message, or as a scheduled message
     *
     * @var bool|null
     */
    private $is_from_offline;

    /**
     * Optional. True, if the message is a paid post. Note that such posts must not be deleted for 24 hours to receive
     * the payment and can't be edited
     *
     * @var bool|null
     */
    private $is_paid_post;

    /**
     * Optional. The number of Telegram Stars that were paid by the sender of the message to send it
     *
     * @var int|null
     */
    private $paid_star_count;

    /**
     * Optional. Link preview options for the message
     *
     * @var LinkPreviewOptions|null
     */
    private $link_preview_options;

    /**
     * Optional. Information about a suggested post
     *
     * @var SuggestedPostInfo|null
     */
    private $suggested_post_info;

    /**
     * Optional. Unique identifier of the message effect added to the message
     *
     * @var string|null
     */
    private $effect_id;

    /**
     * Optional. The rich formatted message
     *
     * @var RichMessage|null
     */
    private $rich_message;

    /**
     * Optional. Message is a live photo, information about the live photo
     *
     * @var LivePhoto|null
     */
    private $live_photo;

    /**
     * Optional. Message is a paid media, information about the paid media
     *
     * @var PaidMediaInfo|null
     */
    private $paid_media;

    /**
     * Optional. Message is a story, information about the story
     *
     * @var Story|null
     */
    private $story;

    /**
     * Optional. True, if the caption must be shown above and not below the media
     *
     * @var bool|null
     */
    private $show_caption_above_media;

    /**
     * Optional. Message is a checklist, information about the checklist
     *
     * @var Checklist|null
     */
    private $checklist;

    /**
     * Optional. Service message: the owner of the chat left the chat
     *
     * @var ChatOwnerLeft|null
     */
    private $chat_owner_left;

    /**
     * Optional. Service message: the ownership of the chat changed
     *
     * @var ChatOwnerChanged|null
     */
    private $chat_owner_changed;

    /**
     * Optional. Message is a service message about a refunded payment
     *
     * @var RefundedPayment|null
     */
    private $refunded_payment;

    /**
     * Optional. Service message: users were shared with the bot
     *
     * @var UsersShared|null
     */
    private $users_shared;

    /**
     * Optional. Message is a service message about a regular gift that was sent or received
     *
     * @var GiftInfo|null
     */
    private $gift;

    /**
     * Optional. Message is a service message about a unique gift that was sent or received
     *
     * @var UniqueGiftInfo|null
     */
    private $unique_gift;

    /**
     * Optional. Message is a service message about an upgrade of a regular gift
     *
     * @var GiftInfo|null
     */
    private $gift_upgrade_sent;

    /**
     * Optional. Service message: user boosted the chat
     *
     * @var ChatBoostAdded|null
     */
    private $boost_added;

    /**
     * Optional. Service message: a chat background was set
     *
     * @var ChatBackground|null
     */
    private $chat_background_set;

    /**
     * Optional. Service message: status changes for tasks in a checklist
     *
     * @var ChecklistTasksDone|null
     */
    private $checklist_tasks_done;

    /**
     * Optional. Service message: new tasks were added to a checklist
     *
     * @var ChecklistTasksAdded|null
     */
    private $checklist_tasks_added;

    /**
     * Optional. Service message: a chat was added to a community
     *
     * @var CommunityChatAdded|null
     */
    private $community_chat_added;

    /**
     * Optional. Service message: a chat was added to a community by the bot
     *
     * @var CommunityChatJoined|null
     */
    private $community_chat_joined;

    /**
     * Optional. Service message: a chat was removed from a community
     *
     * @var CommunityChatRemoved|null
     */
    private $community_chat_removed;

    /**
     * Optional. Service message: a price change for direct messages sent to the channel chat
     *
     * @var DirectMessagePriceChanged|null
     */
    private $direct_message_price_changed;

    /**
     * Optional. Service message: a scheduled giveaway was created
     *
     * @var GiveawayCreated|null
     */
    private $giveaway_created;

    /**
     * Optional. Message is a message about a scheduled giveaway
     *
     * @var Giveaway|null
     */
    private $giveaway;

    /**
     * Optional. Message is a message about the completion of a giveaway with public winners
     *
     * @var GiveawayWinners|null
     */
    private $giveaway_winners;

    /**
     * Optional. Service message about the completion of a giveaway without public winners
     *
     * @var GiveawayCompleted|null
     */
    private $giveaway_completed;

    /**
     * Optional. Service message: a new bot was created to be managed by the bot
     *
     * @var ManagedBotCreated|null
     */
    private $managed_bot_created;

    /**
     * Optional. Service message: a price change for paid messages sent to the chat
     *
     * @var PaidMessagePriceChanged|null
     */
    private $paid_message_price_changed;

    /**
     * Optional. Service message: a new option was added to a poll
     *
     * @var PollOptionAdded|null
     */
    private $poll_option_added;

    /**
     * Optional. Service message: a poll option was deleted from a poll
     *
     * @var PollOptionDeleted|null
     */
    private $poll_option_deleted;

    /**
     * Optional. Service message about the approval of a suggested post
     *
     * @var SuggestedPostApproved|null
     */
    private $suggested_post_approved;

    /**
     * Optional. Service message about the failed approval of a suggested post
     *
     * @var SuggestedPostApprovalFailed|null
     */
    private $suggested_post_approval_failed;

    /**
     * Optional. Service message about the rejection of a suggested post
     *
     * @var SuggestedPostDeclined|null
     */
    private $suggested_post_declined;

    /**
     * Optional. Service message about a successful payment for a suggested post
     *
     * @var SuggestedPostPaid|null
     */
    private $suggested_post_paid;

    /**
     * Optional. Service message about a payment refund for a suggested post
     *
     * @var SuggestedPostRefunded|null
     */
    private $suggested_post_refunded;

    /**
     * @return DirectMessagesTopic|null
     */
    public function getDirectMessagesTopic(): ?DirectMessagesTopic
    {
        return $this->direct_messages_topic;
    }

    /**
     * @param DirectMessagesTopic|null $direct_messages_topic
     */
    public function setDirectMessagesTopic(?DirectMessagesTopic $direct_messages_topic): void
    {
        $this->direct_messages_topic = $direct_messages_topic;
    }

    /**
     * @return int|null
     */
    public function getSenderBoostCount(): ?int
    {
        return $this->sender_boost_count;
    }

    /**
     * @param int|null $sender_boost_count
     */
    public function setSenderBoostCount(?int $sender_boost_count): void
    {
        $this->sender_boost_count = $sender_boost_count;
    }

    /**
     * @return User|null
     */
    public function getSenderBusinessBot(): ?User
    {
        return $this->sender_business_bot;
    }

    /**
     * @param User|null $sender_business_bot
     */
    public function setSenderBusinessBot(?User $sender_business_bot): void
    {
        $this->sender_business_bot = $sender_business_bot;
    }

    /**
     * @return string|null
     */
    public function getSenderTag(): ?string
    {
        return $this->sender_tag;
    }

    /**
     * @param string|null $sender_tag
     */
    public function setSenderTag(?string $sender_tag): void
    {
        $this->sender_tag = $sender_tag;
    }

    /**
     * @return User|null
     */
    public function getReceiverUser(): ?User
    {
        return $this->receiver_user;
    }

    /**
     * @param User|null $receiver_user
     */
    public function setReceiverUser(?User $receiver_user): void
    {
        $this->receiver_user = $receiver_user;
    }

    /**
     * @return int|null
     */
    public function getEphemeralMessageId(): ?int
    {
        return $this->ephemeral_message_id;
    }

    /**
     * @param int|null $ephemeral_message_id
     */
    public function setEphemeralMessageId(?int $ephemeral_message_id): void
    {
        $this->ephemeral_message_id = $ephemeral_message_id;
    }

    /**
     * @return string|null
     */
    public function getGuestQueryId(): ?string
    {
        return $this->guest_query_id;
    }

    /**
     * @param string|null $guest_query_id
     */
    public function setGuestQueryId(?string $guest_query_id): void
    {
        $this->guest_query_id = $guest_query_id;
    }

    /**
     * @return string|null
     */
    public function getBusinessConnectionId(): ?string
    {
        return $this->business_connection_id;
    }

    /**
     * @param string|null $business_connection_id
     */
    public function setBusinessConnectionId(?string $business_connection_id): void
    {
        $this->business_connection_id = $business_connection_id;
    }

    /**
     * @return MessageOrigin|null
     */
    public function getForwardOrigin(): ?MessageOrigin
    {
        return $this->forward_origin;
    }

    /**
     * @param MessageOrigin|null $forward_origin
     */
    public function setForwardOrigin(?MessageOrigin $forward_origin): void
    {
        $this->forward_origin = $forward_origin;
    }

    /**
     * @return ExternalReplyInfo|null
     */
    public function getExternalReply(): ?ExternalReplyInfo
    {
        return $this->external_reply;
    }

    /**
     * @param ExternalReplyInfo|null $external_reply
     */
    public function setExternalReply(?ExternalReplyInfo $external_reply): void
    {
        $this->external_reply = $external_reply;
    }

    /**
     * @return TextQuote|null
     */
    public function getQuote(): ?TextQuote
    {
        return $this->quote;
    }

    /**
     * @param TextQuote|null $quote
     */
    public function setQuote(?TextQuote $quote): void
    {
        $this->quote = $quote;
    }

    /**
     * @return Story|null
     */
    public function getReplyToStory(): ?Story
    {
        return $this->reply_to_story;
    }

    /**
     * @param Story|null $reply_to_story
     */
    public function setReplyToStory(?Story $reply_to_story): void
    {
        $this->reply_to_story = $reply_to_story;
    }

    /**
     * @return int|null
     */
    public function getReplyToChecklistTaskId(): ?int
    {
        return $this->reply_to_checklist_task_id;
    }

    /**
     * @param int|null $reply_to_checklist_task_id
     */
    public function setReplyToChecklistTaskId(?int $reply_to_checklist_task_id): void
    {
        $this->reply_to_checklist_task_id = $reply_to_checklist_task_id;
    }

    /**
     * @return string|null
     */
    public function getReplyToPollOptionId(): ?string
    {
        return $this->reply_to_poll_option_id;
    }

    /**
     * @param string|null $reply_to_poll_option_id
     */
    public function setReplyToPollOptionId(?string $reply_to_poll_option_id): void
    {
        $this->reply_to_poll_option_id = $reply_to_poll_option_id;
    }

    /**
     * @return User|null
     */
    public function getGuestBotCallerUser(): ?User
    {
        return $this->guest_bot_caller_user;
    }

    /**
     * @param User|null $guest_bot_caller_user
     */
    public function setGuestBotCallerUser(?User $guest_bot_caller_user): void
    {
        $this->guest_bot_caller_user = $guest_bot_caller_user;
    }

    /**
     * @return Chat|null
     */
    public function getGuestBotCallerChat(): ?Chat
    {
        return $this->guest_bot_caller_chat;
    }

    /**
     * @param Chat|null $guest_bot_caller_chat
     */
    public function setGuestBotCallerChat(?Chat $guest_bot_caller_chat): void
    {
        $this->guest_bot_caller_chat = $guest_bot_caller_chat;
    }

    /**
     * @return bool|null
     */
    public function isFromOffline(): ?bool
    {
        return $this->is_from_offline;
    }

    /**
     * @param bool|null $is_from_offline
     */
    public function setIsFromOffline(?bool $is_from_offline): void
    {
        $this->is_from_offline = $is_from_offline;
    }

    /**
     * @return bool|null
     */
    public function isPaidPost(): ?bool
    {
        return $this->is_paid_post;
    }

    /**
     * @param bool|null $is_paid_post
     */
    public function setIsPaidPost(?bool $is_paid_post): void
    {
        $this->is_paid_post = $is_paid_post;
    }

    /**
     * @return int|null
     */
    public function getPaidStarCount(): ?int
    {
        return $this->paid_star_count;
    }

    /**
     * @param int|null $paid_star_count
     */
    public function setPaidStarCount(?int $paid_star_count): void
    {
        $this->paid_star_count = $paid_star_count;
    }

    /**
     * @return LinkPreviewOptions|null
     */
    public function getLinkPreviewOptions(): ?LinkPreviewOptions
    {
        return $this->link_preview_options;
    }

    /**
     * @param LinkPreviewOptions|null $link_preview_options
     */
    public function setLinkPreviewOptions(?LinkPreviewOptions $link_preview_options): void
    {
        $this->link_preview_options = $link_preview_options;
    }

    /**
     * @return SuggestedPostInfo|null
     */
    public function getSuggestedPostInfo(): ?SuggestedPostInfo
    {
        return $this->suggested_post_info;
    }

    /**
     * @param SuggestedPostInfo|null $suggested_post_info
     */
    public function setSuggestedPostInfo(?SuggestedPostInfo $suggested_post_info): void
    {
        $this->suggested_post_info = $suggested_post_info;
    }

    /**
     * @return string|null
     */
    public function getEffectId(): ?string
    {
        return $this->effect_id;
    }

    /**
     * @param string|null $effect_id
     */
    public function setEffectId(?string $effect_id): void
    {
        $this->effect_id = $effect_id;
    }

    /**
     * @return RichMessage|null
     */
    public function getRichMessage(): ?RichMessage
    {
        return $this->rich_message;
    }

    /**
     * @param RichMessage|null $rich_message
     */
    public function setRichMessage(?RichMessage $rich_message): void
    {
        $this->rich_message = $rich_message;
    }

    /**
     * @return LivePhoto|null
     */
    public function getLivePhoto(): ?LivePhoto
    {
        return $this->live_photo;
    }

    /**
     * @param LivePhoto|null $live_photo
     */
    public function setLivePhoto(?LivePhoto $live_photo): void
    {
        $this->live_photo = $live_photo;
    }

    /**
     * @return PaidMediaInfo|null
     */
    public function getPaidMedia(): ?PaidMediaInfo
    {
        return $this->paid_media;
    }

    /**
     * @param PaidMediaInfo|null $paid_media
     */
    public function setPaidMedia(?PaidMediaInfo $paid_media): void
    {
        $this->paid_media = $paid_media;
    }

    /**
     * @return Story|null
     */
    public function getStory(): ?Story
    {
        return $this->story;
    }

    /**
     * @param Story|null $story
     */
    public function setStory(?Story $story): void
    {
        $this->story = $story;
    }

    /**
     * @return bool|null
     */
    public function getShowCaptionAboveMedia(): ?bool
    {
        return $this->show_caption_above_media;
    }

    /**
     * @param bool|null $show_caption_above_media
     */
    public function setShowCaptionAboveMedia(?bool $show_caption_above_media): void
    {
        $this->show_caption_above_media = $show_caption_above_media;
    }

    /**
     * @return Checklist|null
     */
    public function getChecklist(): ?Checklist
    {
        return $this->checklist;
    }

    /**
     * @param Checklist|null $checklist
     */
    public function setChecklist(?Checklist $checklist): void
    {
        $this->checklist = $checklist;
    }

    /**
     * @return ChatOwnerLeft|null
     */
    public function getChatOwnerLeft(): ?ChatOwnerLeft
    {
        return $this->chat_owner_left;
    }

    /**
     * @param ChatOwnerLeft|null $chat_owner_left
     */
    public function setChatOwnerLeft(?ChatOwnerLeft $chat_owner_left): void
    {
        $this->chat_owner_left = $chat_owner_left;
    }

    /**
     * @return ChatOwnerChanged|null
     */
    public function getChatOwnerChanged(): ?ChatOwnerChanged
    {
        return $this->chat_owner_changed;
    }

    /**
     * @param ChatOwnerChanged|null $chat_owner_changed
     */
    public function setChatOwnerChanged(?ChatOwnerChanged $chat_owner_changed): void
    {
        $this->chat_owner_changed = $chat_owner_changed;
    }

    /**
     * @return RefundedPayment|null
     */
    public function getRefundedPayment(): ?RefundedPayment
    {
        return $this->refunded_payment;
    }

    /**
     * @param RefundedPayment|null $refunded_payment
     */
    public function setRefundedPayment(?RefundedPayment $refunded_payment): void
    {
        $this->refunded_payment = $refunded_payment;
    }

    /**
     * @return UsersShared|null
     */
    public function getUsersShared(): ?UsersShared
    {
        return $this->users_shared;
    }

    /**
     * @param UsersShared|null $users_shared
     */
    public function setUsersShared(?UsersShared $users_shared): void
    {
        $this->users_shared = $users_shared;
    }

    /**
     * @return GiftInfo|null
     */
    public function getGift(): ?GiftInfo
    {
        return $this->gift;
    }

    /**
     * @param GiftInfo|null $gift
     */
    public function setGift(?GiftInfo $gift): void
    {
        $this->gift = $gift;
    }

    /**
     * @return UniqueGiftInfo|null
     */
    public function getUniqueGift(): ?UniqueGiftInfo
    {
        return $this->unique_gift;
    }

    /**
     * @param UniqueGiftInfo|null $unique_gift
     */
    public function setUniqueGift(?UniqueGiftInfo $unique_gift): void
    {
        $this->unique_gift = $unique_gift;
    }

    /**
     * @return GiftInfo|null
     */
    public function getGiftUpgradeSent(): ?GiftInfo
    {
        return $this->gift_upgrade_sent;
    }

    /**
     * @param GiftInfo|null $gift_upgrade_sent
     */
    public function setGiftUpgradeSent(?GiftInfo $gift_upgrade_sent): void
    {
        $this->gift_upgrade_sent = $gift_upgrade_sent;
    }

    /**
     * @return ChatBoostAdded|null
     */
    public function getBoostAdded(): ?ChatBoostAdded
    {
        return $this->boost_added;
    }

    /**
     * @param ChatBoostAdded|null $boost_added
     */
    public function setBoostAdded(?ChatBoostAdded $boost_added): void
    {
        $this->boost_added = $boost_added;
    }

    /**
     * @return ChatBackground|null
     */
    public function getChatBackgroundSet(): ?ChatBackground
    {
        return $this->chat_background_set;
    }

    /**
     * @param ChatBackground|null $chat_background_set
     */
    public function setChatBackgroundSet(?ChatBackground $chat_background_set): void
    {
        $this->chat_background_set = $chat_background_set;
    }

    /**
     * @return ChecklistTasksDone|null
     */
    public function getChecklistTasksDone(): ?ChecklistTasksDone
    {
        return $this->checklist_tasks_done;
    }

    /**
     * @param ChecklistTasksDone|null $checklist_tasks_done
     */
    public function setChecklistTasksDone(?ChecklistTasksDone $checklist_tasks_done): void
    {
        $this->checklist_tasks_done = $checklist_tasks_done;
    }

    /**
     * @return ChecklistTasksAdded|null
     */
    public function getChecklistTasksAdded(): ?ChecklistTasksAdded
    {
        return $this->checklist_tasks_added;
    }

    /**
     * @param ChecklistTasksAdded|null $checklist_tasks_added
     */
    public function setChecklistTasksAdded(?ChecklistTasksAdded $checklist_tasks_added): void
    {
        $this->checklist_tasks_added = $checklist_tasks_added;
    }

    /**
     * @return CommunityChatAdded|null
     */
    public function getCommunityChatAdded(): ?CommunityChatAdded
    {
        return $this->community_chat_added;
    }

    /**
     * @param CommunityChatAdded|null $community_chat_added
     */
    public function setCommunityChatAdded(?CommunityChatAdded $community_chat_added): void
    {
        $this->community_chat_added = $community_chat_added;
    }

    /**
     * @return CommunityChatJoined|null
     */
    public function getCommunityChatJoined(): ?CommunityChatJoined
    {
        return $this->community_chat_joined;
    }

    /**
     * @param CommunityChatJoined|null $community_chat_joined
     */
    public function setCommunityChatJoined(?CommunityChatJoined $community_chat_joined): void
    {
        $this->community_chat_joined = $community_chat_joined;
    }

    /**
     * @return CommunityChatRemoved|null
     */
    public function getCommunityChatRemoved(): ?CommunityChatRemoved
    {
        return $this->community_chat_removed;
    }

    /**
     * @param CommunityChatRemoved|null $community_chat_removed
     */
    public function setCommunityChatRemoved(?CommunityChatRemoved $community_chat_removed): void
    {
        $this->community_chat_removed = $community_chat_removed;
    }

    /**
     * @return DirectMessagePriceChanged|null
     */
    public function getDirectMessagePriceChanged(): ?DirectMessagePriceChanged
    {
        return $this->direct_message_price_changed;
    }

    /**
     * @param DirectMessagePriceChanged|null $direct_message_price_changed
     */
    public function setDirectMessagePriceChanged(?DirectMessagePriceChanged $direct_message_price_changed): void
    {
        $this->direct_message_price_changed = $direct_message_price_changed;
    }

    /**
     * @return GiveawayCreated|null
     */
    public function getGiveawayCreated(): ?GiveawayCreated
    {
        return $this->giveaway_created;
    }

    /**
     * @param GiveawayCreated|null $giveaway_created
     */
    public function setGiveawayCreated(?GiveawayCreated $giveaway_created): void
    {
        $this->giveaway_created = $giveaway_created;
    }

    /**
     * @return Giveaway|null
     */
    public function getGiveaway(): ?Giveaway
    {
        return $this->giveaway;
    }

    /**
     * @param Giveaway|null $giveaway
     */
    public function setGiveaway(?Giveaway $giveaway): void
    {
        $this->giveaway = $giveaway;
    }

    /**
     * @return GiveawayWinners|null
     */
    public function getGiveawayWinners(): ?GiveawayWinners
    {
        return $this->giveaway_winners;
    }

    /**
     * @param GiveawayWinners|null $giveaway_winners
     */
    public function setGiveawayWinners(?GiveawayWinners $giveaway_winners): void
    {
        $this->giveaway_winners = $giveaway_winners;
    }

    /**
     * @return GiveawayCompleted|null
     */
    public function getGiveawayCompleted(): ?GiveawayCompleted
    {
        return $this->giveaway_completed;
    }

    /**
     * @param GiveawayCompleted|null $giveaway_completed
     */
    public function setGiveawayCompleted(?GiveawayCompleted $giveaway_completed): void
    {
        $this->giveaway_completed = $giveaway_completed;
    }

    /**
     * @return ManagedBotCreated|null
     */
    public function getManagedBotCreated(): ?ManagedBotCreated
    {
        return $this->managed_bot_created;
    }

    /**
     * @param ManagedBotCreated|null $managed_bot_created
     */
    public function setManagedBotCreated(?ManagedBotCreated $managed_bot_created): void
    {
        $this->managed_bot_created = $managed_bot_created;
    }

    /**
     * @return PaidMessagePriceChanged|null
     */
    public function getPaidMessagePriceChanged(): ?PaidMessagePriceChanged
    {
        return $this->paid_message_price_changed;
    }

    /**
     * @param PaidMessagePriceChanged|null $paid_message_price_changed
     */
    public function setPaidMessagePriceChanged(?PaidMessagePriceChanged $paid_message_price_changed): void
    {
        $this->paid_message_price_changed = $paid_message_price_changed;
    }

    /**
     * @return PollOptionAdded|null
     */
    public function getPollOptionAdded(): ?PollOptionAdded
    {
        return $this->poll_option_added;
    }

    /**
     * @param PollOptionAdded|null $poll_option_added
     */
    public function setPollOptionAdded(?PollOptionAdded $poll_option_added): void
    {
        $this->poll_option_added = $poll_option_added;
    }

    /**
     * @return PollOptionDeleted|null
     */
    public function getPollOptionDeleted(): ?PollOptionDeleted
    {
        return $this->poll_option_deleted;
    }

    /**
     * @param PollOptionDeleted|null $poll_option_deleted
     */
    public function setPollOptionDeleted(?PollOptionDeleted $poll_option_deleted): void
    {
        $this->poll_option_deleted = $poll_option_deleted;
    }

    /**
     * @return SuggestedPostApproved|null
     */
    public function getSuggestedPostApproved(): ?SuggestedPostApproved
    {
        return $this->suggested_post_approved;
    }

    /**
     * @param SuggestedPostApproved|null $suggested_post_approved
     */
    public function setSuggestedPostApproved(?SuggestedPostApproved $suggested_post_approved): void
    {
        $this->suggested_post_approved = $suggested_post_approved;
    }

    /**
     * @return SuggestedPostApprovalFailed|null
     */
    public function getSuggestedPostApprovalFailed(): ?SuggestedPostApprovalFailed
    {
        return $this->suggested_post_approval_failed;
    }

    /**
     * @param SuggestedPostApprovalFailed|null $suggested_post_approval_failed
     */
    public function setSuggestedPostApprovalFailed(?SuggestedPostApprovalFailed $suggested_post_approval_failed): void
    {
        $this->suggested_post_approval_failed = $suggested_post_approval_failed;
    }

    /**
     * @return SuggestedPostDeclined|null
     */
    public function getSuggestedPostDeclined(): ?SuggestedPostDeclined
    {
        return $this->suggested_post_declined;
    }

    /**
     * @param SuggestedPostDeclined|null $suggested_post_declined
     */
    public function setSuggestedPostDeclined(?SuggestedPostDeclined $suggested_post_declined): void
    {
        $this->suggested_post_declined = $suggested_post_declined;
    }

    /**
     * @return SuggestedPostPaid|null
     */
    public function getSuggestedPostPaid(): ?SuggestedPostPaid
    {
        return $this->suggested_post_paid;
    }

    /**
     * @param SuggestedPostPaid|null $suggested_post_paid
     */
    public function setSuggestedPostPaid(?SuggestedPostPaid $suggested_post_paid): void
    {
        $this->suggested_post_paid = $suggested_post_paid;
    }

    /**
     * @return SuggestedPostRefunded|null
     */
    public function getSuggestedPostRefunded(): ?SuggestedPostRefunded
    {
        return $this->suggested_post_refunded;
    }

    /**
     * @param SuggestedPostRefunded|null $suggested_post_refunded
     */
    public function setSuggestedPostRefunded(?SuggestedPostRefunded $suggested_post_refunded): void
    {
        $this->suggested_post_refunded = $suggested_post_refunded;
    }

    /**
     * @return bool
     */
    public function isServiceMessage(): bool
    {
        return (
            $this->delete_chat_photo !== null ||
            $this->group_chat_created !== null ||
            $this->supergroup_chat_created !== null ||
            $this->channel_chat_created !== null ||
            $this->message_auto_delete_timer_changed !== null ||
            $this->successful_payment !== null ||
            $this->user_shared !== null ||
            $this->chat_shared !== null ||
            $this->write_access_allowed !== null ||
            $this->proximity_alert_triggered !== null ||
            $this->forum_topic_created !== null ||
            $this->forum_topic_edited !== null ||
            $this->forum_topic_closed !== null ||
            $this->forum_topic_reopened !== null ||
            $this->general_forum_topic_hidden !== null ||
            $this->general_forum_topic_unhidden !== null ||
            $this->video_chat_scheduled !== null ||
            $this->video_chat_started !== null ||
            $this->video_chat_ended !== null ||
            $this->video_chat_participants_invited !== null ||
            $this->web_app_data !== null ||
            $this->chat_owner_left !== null ||
            $this->chat_owner_changed !== null ||
            $this->refunded_payment !== null ||
            $this->users_shared !== null ||
            $this->gift !== null ||
            $this->unique_gift !== null ||
            $this->gift_upgrade_sent !== null ||
            $this->boost_added !== null ||
            $this->chat_background_set !== null ||
            $this->checklist_tasks_done !== null ||
            $this->checklist_tasks_added !== null ||
            $this->community_chat_added !== null ||
            $this->community_chat_joined !== null ||
            $this->community_chat_removed !== null ||
            $this->direct_message_price_changed !== null ||
            $this->giveaway_created !== null ||
            $this->giveaway !== null ||
            $this->giveaway_winners !== null ||
            $this->giveaway_completed !== null ||
            $this->managed_bot_created !== null ||
            $this->paid_message_price_changed !== null ||
            $this->poll_option_added !== null ||
            $this->poll_option_deleted !== null ||
            $this->suggested_post_approved !== null ||
            $this->suggested_post_approval_failed !== null ||
            $this->suggested_post_declined !== null ||
            $this->suggested_post_paid !== null ||
            $this->suggested_post_refunded !== null
        );
    }
}