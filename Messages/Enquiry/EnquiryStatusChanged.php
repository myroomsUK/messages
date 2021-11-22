<?php

declare(strict_types=1);

namespace Myrooms\Messages\Messages\Enquiry;

use Myrooms\Messages\Messages\Enquiry\Exception\InvalidEnquiryStatusException;

class EnquiryStatusChanged
{
    const ENQUIRY_ID = "enquiryId";
    const STATUS = "status";

    /**
     * @var int
     */
    private $enquiryId;

    /**
     * @var EnquiryStatus
     */
    private $status;

    public function __construct(int $enquiryId, EnquiryStatus $status)
    {
        \Assert\Assert::lazy()
            ->that($enquiryId)->notNull()->integer()
            ->that($status)->isInstanceOf(EnquiryStatus::class);

        $this->enquiryId = $enquiryId;
        $this->status = $status;
    }

    public function getEnquiryId(): int
    {
        return $this->enquiryId;
    }

    public function getStatus(): EnquiryStatus
    {
        return $this->status;
    }

    public function toArray(): array
    {
        return [
            self::ENQUIRY_ID => $this->enquiryId,
            self::STATUS => $this->status->getStatus()
        ];
    }

    /**
     * @param array $array
     * @return static
     * @throws InvalidEnquiryStatusException
     */
    public static function fromArray(array $array): self
    {
        return new self($array[self::ENQUIRY_ID], new EnquiryStatus($array[self::STATUS]));
    }
    
}