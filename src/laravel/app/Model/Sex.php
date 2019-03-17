<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Sex extends Model
{
    protected $primaryKey = 'sex_id';

    protected $hidden = [
        'created_at', 'updated_at'
    ];
}
