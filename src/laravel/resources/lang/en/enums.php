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
    ],

    \App\Enums\WorkStateGroup::class => [
//        \App\Enums\WorkStateGroup::Undef => 'undef',
        \App\Enums\WorkStateGroup::Begin => 'begin',
        \App\Enums\WorkStateGroup::Finish => 'finish',
        \App\Enums\WorkStateGroup::Out => 'out',
        \App\Enums\WorkStateGroup::OnTheWay => 'on the way',
        \App\Enums\WorkStateGroup::Arrive => 'arrive',
    ],

    \App\Enums\WorkState::class => [
//        \App\Enums\WorkState::Undef => 'undef',
        \App\Enums\WorkState::Begin => 'begin',
        \App\Enums\WorkState::Finish => 'finish',
        \App\Enums\WorkState::Out => 'out',
        \App\Enums\WorkState::OnTheWay => 'on the way',
        \App\Enums\WorkState::Arrive => 'arrive',
    ]
];
