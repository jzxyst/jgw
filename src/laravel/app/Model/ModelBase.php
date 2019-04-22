<?php
namespace App\Model;

class ModelBase
{
    protected static $className;

    protected static $primaryKey;

    /**
     * @param array $values
     * @return mixed
     */
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

    /**
     * @param array $values
     * @param null $primaryKey
     * @return null
     */
    public static function update(array $values, $primaryKey = null)
    {
        // Primary key not set.
        if (isset($values[self::$primaryKey]) === false and isset($primaryKey) === false) {
            return null;
        }

        // Define primary key in array.
        if (isset($values[self::$primaryKey]) and isset($primaryKey) === false) {
            $primaryKey = $values[self::$primaryKey];
        }

        // orm instance
        $namespace = config('model.orm_namespace');
        $ormName = $namespace . '\\' . static::$className;
        $orm = $ormName::find($primaryKey);

        // add to attributes
        foreach ($values as $key => $value) {
            $orm->{$key} = $value;
        }
        $orm->save();

        return $orm;
    }
}
