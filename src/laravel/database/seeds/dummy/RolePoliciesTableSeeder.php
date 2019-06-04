<?php

use Illuminate\Database\Seeder;

class RolePoliciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role_policies')->insert([
            ['role_id' => 1, 'policy_id' => 1],
            ['role_id' => 1, 'policy_id' => 2],
            ['role_id' => 1, 'policy_id' => 3],
            ['role_id' => 1, 'policy_id' => 4],
            ['role_id' => 1, 'policy_id' => 5],
        ]);
    }
}
