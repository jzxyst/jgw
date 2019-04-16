<?php

namespace App\Enums;

use BenSampo\Enum\Enum;
use BenSampo\Enum\Contracts\LocalizedEnum;

final class WorkStateGroup extends Enum implements LocalizedEnum
{
//    const Undef = 0;
    const Begin = 1;
    const Finish = 2;
    const Out = 3;
    const OnTheWay = 4;
    const Arrive = 5;
}
