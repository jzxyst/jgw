<?php

use Illuminate\Database\Seeder;

class SexesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ISO 5218
        DB::table('sexes')->insert([
            ['sex_code' => '0', 'sex_name' => 'not known'],
            ['sex_code' => '1', 'sex_name' => 'male'],
            ['sex_code' => '2', 'sex_name' => 'female'],
            ['sex_code' => '9', 'sex_name' => 'not applicable'],
        ]);
    }
}
