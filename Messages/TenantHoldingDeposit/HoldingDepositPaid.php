<?php

namespace Myrooms\Messages\Messages\TenantHoldingDeposit;

class HoldingDepositPaid
{
    private $paymentId;

    private const dateFormat = 'Y-m-d';

    public function __construct(int $paymentId)
    {
        \Assert\Assert::lazy()
            ->that($paymentId)->notNull()->integer()
            ->verifyNow();

        $this->paymentId = $paymentId;
    }

    public function getPaymentId(): string
    {
        return $this->paymentId;
    }
}