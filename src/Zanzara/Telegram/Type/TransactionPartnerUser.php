<?php

declare(strict_types=1);

namespace Zanzara\Telegram\Type;

/**
 * Describes the source of a transaction. It can be one of
 * TransactionPartnerUser, TransactionPartnerChat, TransactionPartnerAffiliateProgram, TransactionPartnerFragment,
 * TransactionPartnerTelegramAds, TransactionPartnerTelegramApi or TransactionPartnerOther.
 *
 * @see TransactionPartner
 * More on https://core.telegram.org/bots/api#transactionpartneruser
 */
class TransactionPartnerUser extends TransactionPartner
{

    /**
     * Information about the user
     *
     * @var User
     */
    private $user;

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

}