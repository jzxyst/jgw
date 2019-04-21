<?php

use Illuminate\Database\Seeder;
use App\Enums\Sex;

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
            ['sex_id' => Sex::NOT_KNOWN, 'sex_name' => Sex::getDescription(Sex::NOT_KNOWN)],
            ['sex_id' => Sex::MALE, 'sex_name' => Sex::getDescription(Sex::MALE)],
            ['sex_id' => Sex::FEMALE, 'sex_name' => Sex::getDescription(Sex::FEMALE)],
            ['sex_id' => Sex::NOT_APPLICABLE, 'sex_name' => Sex::getDescription(Sex::NOT_APPLICABLE)],
        ]);
    }
}
