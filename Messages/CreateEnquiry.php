<?php

namespace Myrooms\Messages\Messages;

class CreateEnquiry
{
    private $unitId;
    private $startDate;
    private $endDate;
    private $name;
    private $surname;
    private $email;
    private $phoneNumber;
    private $paymentId;
    private $portalId;

    private const dateFormat = 'Y-m-d';

    public function __construct(string $unitId, \DateTimeImmutable $startDate, \DateTimeImmutable $endDate, string $name, string $surname, string $phoneNumber, string $email, string $paymentId, string $portalId)
    {

        \Assert\Assert::lazy()
            ->that($name)->notNull()->string()
            ->that($surname)->notNull()->string()
            ->that($unitId)->notNull()->string()
            ->that($startDate->format(self::dateFormat))->date( self::dateFormat)
            ->that($endDate->format(self::dateFormat))->date(self::dateFormat)->greaterThan($startDate->format(self::dateFormat))
            ->that($email)->notNull()->string()->email()
            ->that($phoneNumber)->notNull()->string()
            ->that($paymentId)->notNull()->string()
            ->that($portalId)->notNull()->string()
            ->verifyNow();

        $this->name= $name;
        $this->surname= $surname;
        $this->startDate= $startDate;
        $this->endDate= $endDate;
        $this->email= $email;
        $this->phoneNumber= $phoneNumber;
        $this->unitId = $unitId;
        $this->paymentId = $paymentId;
        $this->portalId = $portalId;

    }

    public function getUnitId(): string
    {
        return $this->unitId;
    }

    public function getStartDate(): \DateTimeImmutable
    {
        return $this->startDate;
    }

    public function getEndDate(): \DateTimeImmutable
    {
        return $this->endDate;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    public function getPaymentId(): string
    {
        return $this->paymentId;
    }

    public function getPortalId(): string
    {
        return $this->portalId;
    }
}