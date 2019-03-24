<?php
namespace App\Model;

class ModelBase
{
    protected static $className;

    public static function create(array $values)
    {
        // orm instance
        $namespace = config('model.orm_namespace');
        $orm_name = $namespace . '\\' . static::$className;
        $orm = new $orm_name();

        // add to attributes
        foreach ($values as $key => $value) {
            $orm->{$key} = $value;
        }
        $orm->save();

        return $orm;
    }
}
