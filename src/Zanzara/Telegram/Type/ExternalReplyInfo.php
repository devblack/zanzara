<?php

declare(strict_types=1);

namespace Zanzara\Telegram\Type;

use Zanzara\Telegram\Type\File\Animation;
use Zanzara\Telegram\Type\File\Audio;
use Zanzara\Telegram\Type\File\Document;
use Zanzara\Telegram\Type\File\Video;
use Zanzara\Telegram\Type\File\VideoNote;
use Zanzara\Telegram\Type\File\Voice;
use Zanzara\Telegram\Type\File\Contact;
use Zanzara\Telegram\Type\File\Location;
use Zanzara\Telegram\Type\File\Sticker;
use Zanzara\Telegram\Type\File\Venue;
use Zanzara\Telegram\Type\Miscellaneous\Dice;
use Zanzara\Telegram\Type\Game\Game;
use Zanzara\Telegram\Type\Shipping\Invoice;
use Zanzara\Telegram\Type\Poll\Poll;

/**
 * This object contains information about a message that is being replied to, which may come from another chat or forum topic.
 */
class ExternalReplyInfo
{

    /**
     * @var MessageOrigin
     */
    private $origin;

    /**
     * @var Chat|null
     */
    private $chat;

    /**
     * @var int|null
     */
    private $message_id;

    /**
     * @var LinkPreviewOptions|null
     */
    private $link_preview_options;

    /**
     * @var Animation|null
     */
    private $animation;

    /**
     * @var Audio|null
     */
    private $audio;

    /**
     * @var Document|null
     */
    private $document;

    /**
     * @var LivePhoto|null
     */
    private $live_photo;

    /**
     * @var PaidMediaInfo|null
     */
    private $paid_media;

    /**
     * @var File\PhotoSize[]|null
     */
    private $photo;

    /**
     * @var Sticker|null
     */
    private $sticker;

    /**
     * @var Story|null
     */
    private $story;

    /**
     * @var Video|null
     */
    private $video;

    /**
     * @var VideoNote|null
     */
    private $video_note;

    /**
     * @var Voice|null
     */
    private $voice;

    /**
     * @var bool|null
     */
    private $has_media_spoiler;

    /**
     * @var Checklist|null
     */
    private $checklist;

    /**
     * @var Contact|null
     */
    private $contact;

    /**
     * @var Dice|null
     */
    private $dice;

    /**
     * @var Game|null
     */
    private $game;

    /**
     * @var Giveaway|null
     */
    private $giveaway;

    /**
     * @var GiveawayWinners|null
     */
    private $giveaway_winners;

    /**
     * @var Invoice|null
     */
    private $invoice;

    /**
     * @var Location|null
     */
    private $location;

    /**
     * @var Poll|null
     */
    private $poll;

    /**
     * @var Venue|null
     */
    private $venue;

    /**
     * @return MessageOrigin
     */
    public function getOrigin(): MessageOrigin
    {
        return $this->origin;
    }

    /**
     * @param MessageOrigin $origin
     */
    public function setOrigin(MessageOrigin $origin): void
    {
        $this->origin = $origin;
    }

    /**
     * @return Chat|null
     */
    public function getChat(): ?Chat
    {
        return $this->chat;
    }

    /**
     * @param Chat|null $chat
     */
    public function setChat(Chat $chat): void
    {
        $this->chat = $chat;
    }

    /**
     * @return int|null
     */
    public function getMessageId(): ?int
    {
        return $this->message_id;
    }

    /**
     * @param int|null $message_id
     */
    public function setMessageId(int $message_id): void
    {
        $this->message_id = $message_id;
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
    public function setLinkPreviewOptions(LinkPreviewOptions $link_preview_options): void
    {
        $this->link_preview_options = $link_preview_options;
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
    public function setAnimation(Animation $animation): void
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
    public function setAudio(Audio $audio): void
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
    public function setDocument(Document $document): void
    {
        $this->document = $document;
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
    public function setLivePhoto(LivePhoto $live_photo): void
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
    public function setPaidMedia(PaidMediaInfo $paid_media): void
    {
        $this->paid_media = $paid_media;
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
    public function setSticker(Sticker $sticker): void
    {
        $this->sticker = $sticker;
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
    public function setStory(Story $story): void
    {
        $this->story = $story;
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
    public function setVideo(Video $video): void
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
    public function setVideoNote(VideoNote $video_note): void
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
    public function setVoice(Voice $voice): void
    {
        $this->voice = $voice;
    }

    /**
     * @return bool|null
     */
    public function getHasMediaSpoiler(): ?bool
    {
        return $this->has_media_spoiler;
    }

    /**
     * @param bool|null $has_media_spoiler
     */
    public function setHasMediaSpoiler(bool $has_media_spoiler): void
    {
        $this->has_media_spoiler = $has_media_spoiler;
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
    public function setChecklist(Checklist $checklist): void
    {
        $this->checklist = $checklist;
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
    public function setContact(Contact $contact): void
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
    public function setDice(Dice $dice): void
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
    public function setGame(Game $game): void
    {
        $this->game = $game;
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
    public function setGiveaway(Giveaway $giveaway): void
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
    public function setGiveawayWinners(GiveawayWinners $giveaway_winners): void
    {
        $this->giveaway_winners = $giveaway_winners;
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
    public function setInvoice(Invoice $invoice): void
    {
        $this->invoice = $invoice;
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
    public function setLocation(Location $location): void
    {
        $this->location = $location;
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
    public function setPoll(Poll $poll): void
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
    public function setVenue(Venue $venue): void
    {
        $this->venue = $venue;
    }

}
