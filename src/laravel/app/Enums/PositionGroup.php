<?php

namespace App\Enums;

use BenSampo\Enum\Enum;
use BenSampo\Enum\Contracts\LocalizedEnum;

final class PositionGroup extends Enum implements LocalizedEnum
{
    const NotSet = 1;
    const Staff = 2;
    const Chief = 3;
    const UnitHead = 4;
    const SectionHead = 5;
    const Manager = 6;
    const President = 7;
}
