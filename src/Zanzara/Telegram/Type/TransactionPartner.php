<?php

declare(strict_types=1);

namespace Zanzara\Telegram\Type;

/**
 * Describes the type of a transaction. Currently, it can be one of
 *
 * - TransactionPartnerUser
 * - TransactionPartnerChat
 * - TransactionPartnerAffiliateProgram
 * - TransactionPartnerFragment
 * - TransactionPartnerTelegramAds
 * - TransactionPartnerTelegramApi
 * - TransactionPartnerOther
 *
 * More on https://core.telegram.org/bots/api#transactionpartner
 */
class TransactionPartner
{

    /**
     * Type of the transaction partner, one of "user", "chat", "affiliate_program", "fragment", "telegram_ads",
     * "telegram_api", "other"
     *
     * @var string
     */
    private $type;

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

}