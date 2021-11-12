<?php

namespace Myrooms\Messages\Messages;

class CreateEnquiry
{
    const UNIT_ID = "unitId";
    const START_DATE = "startDate";
    const END_DATE = "endDate";
    const NAME = "name";
    const SURNAME = "surname";
    const EMAIL = "email";
    const PHONE = "phoneNumber";
    const PAYMENT_ID = "paymentId";
    const PORTAL_ID = "portalId";


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

    public function toArray(){
        return [
            self::NAME => $this->name,
            self::SURNAME => $this->surname,
            self::START_DATE => $this->startDate->format(self::dateFormat),
            self::END_DATE => $this->endDate->format(self::dateFormat),
            self::EMAIL => $this->email,
            self::PHONE => $this->phoneNumber,
            self::UNIT_ID => $this->unitId,
            self::PAYMENT_ID => $this->paymentId,
            self::PORTAL_ID => $this->portalId
        ];
    }

    static public function fromArray($array){
        return new self($array[self::UNIT_ID], new \DateTimeImmutable($array[self::START_DATE]), new \DateTimeImmutable($array[self::END_DATE]) , $array[self::NAME], $array[self::SURNAME], $array[self::PHONE], $array[self::EMAIL], $array[self::PAYMENT_ID], $array[self::PORTAL_ID]);
    }
}
