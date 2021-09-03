<?php

namespace Myrooms\Messages\Messages\TenantHoldingDeposit;

class HoldingDepositPaid
{
    private $paymentUlid;

    private const dateFormat = 'Y-m-d';

    public function __construct(string $paymentUlid)
    {
        \Assert\Assert::lazy()
            ->that($paymentUlid)->notNull()->string()
            ->verifyNow();

        $this->paymentUlid = $paymentUlid;
    }

    public function getPaymentUlid(): string
    {
        return $this->paymentUlid;
    }
}
