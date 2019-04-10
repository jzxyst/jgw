<?php
namespace App\Model;

use Illuminate\Support\Facades\Hash;

class User extends ModelBase
{
    protected static $className = 'User';

    private static $passwordColumnName = 'password';

    /**
     * Insert new record to User table.
     * @param array $data
     * @return mixed
     */
    public static function create(array $data)
    {
        // Hash password
        isset($data[self::$passwordColumnName]) and $data[self::$passwordColumnName] = self::hashPassword($data[self::$passwordColumnName]);

        // generate unique id
        $data['unique_id'] = $data['unique_id'] ?? self::generateUniqueId();

        return parent::create($data);
    }

    /**
     * Hash password.
     * @param $password
     * @return string
     */
    public static function hashPassword($password)
    {
        // Hash password
        return Hash::make($password);
    }

    /**
     * Return whether password match.
     * @param $password
     * @param \App\Orm\User $orm
     * @return bool
     */
    public static function isMatchPassword($password, \App\Orm\User $orm)
    {
        return Hash::check($password, $orm[self::$passwordColumnName]);
    }

    /**
     * Generate unique id.
     * @return string
     */
    public static function generateUniqueId()
    {
        return uniqid(rand(), true);
    }
}
