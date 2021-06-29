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

    private const dateFormat = 'Y-m-d';

    public function __construct(string $unitId, \DateTimeImmutable $startDate, \DateTimeImmutable $endDate, string $name, string $surname, string $phoneNumber, string $email)
    {

        \Assert\Assert::lazy()
            ->that($name)->notNull()->string()
            ->that($surname)->notNull()->string()
            ->that($unitId)->notNull()->string()
            ->that($startDate->format(self::dateFormat))->date( self::dateFormat)
            ->that($endDate->format(self::dateFormat))->date(self::dateFormat)->greaterThan($checkIn->format(self::dateFormat))
            ->that($email)->string()->email()
            ->that($phoneNumber)->string()
            ->verifyNow();

        $this->name= $name;
        $this->surname= $surname;
        $this->startDate= $startDate;
        $this->endDate= $endDate;
        $this->email= $email;
        $this->phoneNumber= $phoneNumber;
        $this->unitId = $unitId;
    }
}