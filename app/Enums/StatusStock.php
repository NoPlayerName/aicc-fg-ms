<?php

namespace App\Enums;

use App\Enums\EnumTraits;

enum StatusStock: int
{
    use EnumTraits;
    case Out = 0;
    case In = 1;
    public function cssClass(): string
    {
        return match ($this) {
            self::In => 'table-success',
            self::Out => 'table-secondary',
        };
    }
}
