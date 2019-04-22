<?php
namespace App\Model;

class ModelBase
{
    protected static $className;

    public static function create(array $values)
    {
        // orm instance
        $namespace = config('model.orm_namespace');
        $ormName = $namespace . '\\' . static::$className;
        $orm = new $ormName();

        // add to attributes
        foreach ($values as $key => $value) {
            $orm->{$key} = $value;
        }
        $orm->save();

        return $orm;
    }
}
