<?php

namespace App\Enums;

use BenSampo\Enum\Enum;
use BenSampo\Enum\Contracts\LocalizedEnum;

final class Sex extends Enum implements LocalizedEnum
{
    const NOT_KNOWN = 0;
    const MALE = 1;
    const FEMALE = 2;
    const NOT_APPLICABLE = 9;
}
