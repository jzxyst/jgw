<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Libs\Utility\Sql;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Local環境ではSQLの実行ログを残す
        if (\App::environment('local')) {
            DB::listen(function ($query) {
//                $sql = Sql::replaceBoundQuery($query);
                Log::debug("Query Time:{$query->time}s {$query->sql}");
            });
        }
    }
}
