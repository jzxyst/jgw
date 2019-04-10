<?php

use App\Enums\Sex;

return [

    Sex::class => [
        Sex::NOT_KNOWN => 'not known',
        Sex::MALE => 'male',
        Sex::FEMALE => 'female',
        Sex::NOT_APPLICABLE => 'not applicable',
    ],

    \App\Enums\PositionGroup::class => [
        \App\Enums\PositionGroup::NotSet => 'not set',
        \App\Enums\PositionGroup::Staff => 'staff',
        \App\Enums\PositionGroup::Chief => 'chief',
        \App\Enums\PositionGroup::UnitHead => 'unit head',
        \App\Enums\PositionGroup::SectionHead => 'section head',
        \App\Enums\PositionGroup::Manager => 'manager',
        \App\Enums\PositionGroup::President => 'president',
    ],

    \App\Enums\Position::class => [
        \App\Enums\Position::NotSet => 'not set',
        \App\Enums\Position::Staff => 'staff',
        \App\Enums\Position::Chief => 'chief',
        \App\Enums\Position::UnitHead => 'unit head',
        \App\Enums\Position::SectionHead => 'section head',
        \App\Enums\Position::Manager => 'manager',
        \App\Enums\Position::President => 'president',
    ]
];
