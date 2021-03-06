<?php

use App\Enums\Sex;

return [

    Sex::class => [
        Sex::NOT_KNOWN => '未定義',
        Sex::MALE => '男性',
        Sex::FEMALE => '女性',
        Sex::NOT_APPLICABLE => '適用不可能',
    ],

    \App\Enums\PositionGroup::class => [
        \App\Enums\PositionGroup::NotSet => '未設定',
        \App\Enums\PositionGroup::Staff => '社員',
        \App\Enums\PositionGroup::Chief => '主任',
        \App\Enums\PositionGroup::UnitHead => '係長',
        \App\Enums\PositionGroup::SectionHead => '課長',
        \App\Enums\PositionGroup::Manager => '部長',
        \App\Enums\PositionGroup::President => '社長',
    ],

    \App\Enums\Position::class => [
        \App\Enums\Position::NotSet => '未設定',
        \App\Enums\Position::Staff => '社員',
        \App\Enums\Position::Chief => '主任',
        \App\Enums\Position::UnitHead => '係長',
        \App\Enums\Position::SectionHead => '課長',
        \App\Enums\Position::Manager => '部長',
        \App\Enums\Position::President => '社長',
    ],

    \App\Enums\WorkStateGroup::class => [
//        \App\Enums\WorkStateGroup::Undef => '未定義',
        \App\Enums\WorkStateGroup::Begin => '出勤',
        \App\Enums\WorkStateGroup::Finish => '退勤',
        \App\Enums\WorkStateGroup::Out => '外出',
        \App\Enums\WorkStateGroup::OnTheWay => '移動',
        \App\Enums\WorkStateGroup::Arrive => '到着',
    ],

    \App\Enums\WorkState::class => [
//        \App\Enums\WorkState::Undef => '未定義',
        \App\Enums\WorkState::Begin => '出勤',
        \App\Enums\WorkState::Finish => '退勤',
        \App\Enums\WorkState::Out => '外出',
        \App\Enums\WorkState::OnTheWay => '移動',
        \App\Enums\WorkState::Arrive => '到着',
    ]
];
