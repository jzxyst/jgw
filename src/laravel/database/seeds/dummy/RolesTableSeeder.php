<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['role_id' => 1, 'role_name' => 'Super Admin'],
            ['role_id' => 2, 'role_name' => 'Admin'],
            ['role_id' => 3, 'role_name' => 'Developer'],
            ['role_id' => 4, 'role_name' => 'Staff'],
        ]);
    }
}
