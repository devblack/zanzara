<?php

declare(strict_types=1);

namespace Zanzara\Telegram\Type;

/**
 * This object describes updates about changes in the user's subscription to the bot.
 *
 * More on https://core.telegram.org/bots/api#botsubscriptionupdated
 */
class BotSubscriptionUpdated
{

    /**
     * User that subscribed to the bot
     *
     * @var User
     */
    private $user;

    /**
     * Bot-specified invoice payload
     *
     * @var string
     */
    private $invoice_payload;

    /**
     * State of the subscription, one of "canceled", "active", "failed"
     *
     * @var string
     */
    private $state;

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    /**
     * @return string
     */
    public function getInvoicePayload(): string
    {
        return $this->invoice_payload;
    }

    /**
     * @param string $invoice_payload
     */
    public function setInvoicePayload(string $invoice_payload): void
    {
        $this->invoice_payload = $invoice_payload;
    }

    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * @param string $state
     */
    public function setState(string $state): void
    {
        $this->state = $state;
    }

}