<?php
namespace App\Traits;

use App\Observers\UserWorkStatusLogObserver;
use Illuminate\Database\Eloquent\Model;

trait UserWorkStatusLogObservable
{
    public static function bootUserWorkStatusLogObservable()
    {
        self::observe(UserWorkStatusLogObserver::class);
    }
}
