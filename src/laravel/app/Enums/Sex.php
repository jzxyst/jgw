<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class Sex extends Enum
{
    const NOT_KNOWN = 0;
    const MALE = 1;
    const FEMALE = 2;
    const NOT_APPLICABLE = 9;
}
