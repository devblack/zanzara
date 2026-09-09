<?php

declare(strict_types=1);

namespace Zanzara\Telegram\Type;

/**
 * This object contains basic information about a refunded payment.
 */
class RefundedPayment
{

    /**
     * @var string
     */
    private $currency;

    /**
     * @var int
     */
    private $total_amount;

    /**
     * @var string
     */
    private $invoice_payload;

    /**
     * @var string
     */
    private $telegram_payment_charge_id;

    /**
     * @var string|null
     */
    private $provider_payment_charge_id;

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     */
    public function setCurrency(string $currency): void
    {
        $this->currency = $currency;
    }

    /**
     * @return int
     */
    public function getTotalAmount(): int
    {
        return $this->total_amount;
    }

    /**
     * @param int $total_amount
     */
    public function setTotalAmount(int $total_amount): void
    {
        $this->total_amount = $total_amount;
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
    public function getTelegramPaymentChargeId(): string
    {
        return $this->telegram_payment_charge_id;
    }

    /**
     * @param string $telegram_payment_charge_id
     */
    public function setTelegramPaymentChargeId(string $telegram_payment_charge_id): void
    {
        $this->telegram_payment_charge_id = $telegram_payment_charge_id;
    }

    /**
     * @return string|null
     */
    public function getProviderPaymentChargeId(): ?string
    {
        return $this->provider_payment_charge_id;
    }

    /**
     * @param string|null $provider_payment_charge_id
     */
    public function setProviderPaymentChargeId(string $provider_payment_charge_id): void
    {
        $this->provider_payment_charge_id = $provider_payment_charge_id;
    }

}
