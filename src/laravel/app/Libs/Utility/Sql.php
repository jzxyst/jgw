<?php

namespace App\Libs\Utility;

class Sql {

    /**
     * Bind済みのSQLに変換する。
     * @param $query
     * @return string|string[]|null
     */
	public static function replaceBoundQuery($query)
    {
        $sql = $query->sql;
        foreach ($query->bindings as $binding) {
            $sql = preg_replace('/\?/', $binding, $sql, 1);
        }
        return $sql;
	}
}
