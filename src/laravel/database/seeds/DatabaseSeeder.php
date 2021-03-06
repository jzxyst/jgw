<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(SexesTableSeeder::class);
         $this->call(PositionsTableSeeder::class);
         $this->call(PositionGroupsTableSeeder::class);
         $this->call(WorkStatesTableSeeder::class);
         $this->call(WorkStateGroupsTableSeeder::class);
    }
}
