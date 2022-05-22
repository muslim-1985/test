<?php

declare(strict_types=1);

namespace App\User\Model\Entity;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\GuidType;

class UuidType extends GuidType
{
    public const NAME = 'user_user_uuid';

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return $value instanceof UserUuid ? $value->getValue() : $value;
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return !empty($value) ? new UserUuid($value) : null;
    }

    public function getName(): string
    {
        return self::NAME;
    }

    public function requiresSQLCommentHint(AbstractPlatform $platform) : bool
    {
        return true;
    }
}