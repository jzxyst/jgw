<?php

namespace App\Orm;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $primaryKey = 'position_id';

    public function position_group()
    {
        return $this->hasOne('\App\Orm\PositionGroup', 'position_group_id', 'position_group_id');
    }
}
