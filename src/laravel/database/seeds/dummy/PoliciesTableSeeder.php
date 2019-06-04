<?php

use Illuminate\Database\Seeder;

class PoliciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('policies')->insert([
            ['policy_id' => 1, 'policy_name' => 'ユーザ一覧', 'entry_point' => 'App\Orm\Policies\UserPolicy::index'],
            ['policy_id' => 2, 'policy_name' => 'ユーザ閲覧', 'entry_point' => 'App\Orm\Policies\UserPolicy::view'],
            ['policy_id' => 3, 'policy_name' => 'ユーザ作成', 'entry_point' => 'App\Orm\Policies\UserPolicy::create'],
            ['policy_id' => 4, 'policy_name' => 'ユーザ更新', 'entry_point' => 'App\Orm\Policies\UserPolicy::update'],
            ['policy_id' => 5, 'policy_name' => 'ユーザ削除', 'entry_point' => 'App\Orm\Policies\UserPolicy::delete'],
        ]);
    }
}
