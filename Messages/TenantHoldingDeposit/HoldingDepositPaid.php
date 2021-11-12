<?php

namespace Myrooms\Messages\Messages\TenantHoldingDeposit;

class HoldingDepositPaid
{
    const PAYMENT_ULID = "paymentUlid";

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

    public function toArray(){
        return [
          self::PAYMENT_ULID => $this->paymentUlid
        ];
    }

    static public function fromArray($array){
        return new self($array[self::PAYMENT_ULID]);
    }
}
