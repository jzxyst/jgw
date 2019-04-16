<?php

use Illuminate\Database\Seeder;
use App\Enums\WorkStateGroup;

class WorkStateGroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('work_state_groups')->insert(array_map(function($key){
            return ['work_state_group_id' => $key, 'work_state_group_name' => WorkStateGroup::getDescription($key)];
        }, WorkStateGroup::getValues()));
    }
}
