<?php

declare(strict_types=1);

namespace App\User\Model\Entity;

use Ramsey\Uuid\Uuid;
use Webmozart\Assert\Assert;

class UserUuid
{
    public function __construct(private string $uuid)
    {
        Assert::notEmpty($this->uuid);
    }

    public static function next(): self
    {
        return new self(Uuid::uuid4()->toString());
    }

    public function getValue(): string
    {
        return $this->uuid;
    }

    public function __toString(): string
    {
        return $this->getValue();
    }
}