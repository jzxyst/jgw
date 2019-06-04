<?php

namespace App\Orm;

use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{
    protected $primaryKey = 'policy_id';

    /**
     * Return policy collection.
     * @param $entryPoint
     * @return mixed
     */
    public static function getPolicyByEntryPoint($entryPoint)
    {
        return Policy::where('entry_point', $entryPoint)->get()->first();
    }

    /**
     * @param $entryPoint
     * @return bool
     */
    public function isMatchEntryPoint($entryPoint)
    {
        return $this->entry_point === $entryPoint;
    }
}
