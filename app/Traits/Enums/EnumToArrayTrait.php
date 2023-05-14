<?php

namespace App\Traits\Enums;

trait EnumToArrayTrait
{
    /**
     * @return array
     */
    public static function casesToArray(): array
    {
        return array_map(fn($status) => $status->value, self::cases());
    }

}