<?php

declare(strict_types=1);

namespace Myrooms\Messages\Messages\Enquiry;

class EnquiryStatus
{
    const CREATED = 0;
    const ACCEPTED = 1;
    const DENIED = 2;
    
    const VALUES = [
        self::CREATED => "Created",
        self::ACCEPTED => "Accepted",
        self::DENIED => "Denied",
    ];

    /**
     * @var int
     */
    private $status;

    public function __construct(int $status)
    {
        if (!in_array($status, self::VALUES)) {
            throw new \Exception(sprintf("%d is not a valid value.", $status));
        }
        
        $this->status = $status;
    }

    public function getStatus(): int
    {
        return $this->status;
    }
    
    public function getLabel(): string
    {
        return self::VALUES[$this->status];
    }
    
    public static function createCreated(): self
    {
        return new self(self::CREATED);
    }

    public static function createAccepted(): self
    {
        return new self(self::ACCEPTED);
    }

    public static function createDenied(): self
    {
        return new self(self::DENIED);
    }

    public function isCreated(): bool
    {
        return $this->status == self::CREATED;
    }

    public function isAccepted(): bool
    {
        return $this->status == self::ACCEPTED;
    }

    public function isDenied(): bool
    {
        return $this->status == self::DENIED;
    }
}