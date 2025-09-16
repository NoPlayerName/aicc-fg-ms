<?php

namespace App\Enums;

use App\Enums\EnumTraits;

enum StatusPalletEnums: int
{
    use EnumTraits;
    case Out = 0;
    case In = 1;
}
