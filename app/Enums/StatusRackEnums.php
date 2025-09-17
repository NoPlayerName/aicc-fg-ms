<?php

namespace App\Enums;

use App\Enums\EnumTraits;

enum StatusRackEnums: int
{
    use EnumTraits;
    case Empty = 0;
    case Loaded = 1;
    public function cssClass(): string
    {
        return match ($this) {
            self::Empty => 'table-success',
            self::Loaded => 'table-secondary',
        };
    }
}
