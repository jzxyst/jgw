<?php

use Illuminate\Database\Seeder;
use App\Enums\WorkState;
use App\Enums\WorkStateGroup;

class WorkStatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('work_states')->insert([
            ['work_state_id' => WorkState::Begin, 'work_state_group_id' => WorkStateGroup::Begin, 'work_state_name' => WorkState::getDescription(WorkState::Begin)],
            ['work_state_id' => WorkState::Finish, 'work_state_group_id' => WorkStateGroup::Finish, 'work_state_name' => WorkState::getDescription(WorkState::Finish)],
            ['work_state_id' => WorkState::Out, 'work_state_group_id' => WorkStateGroup::Out, 'work_state_name' => WorkState::getDescription(WorkState::Out)],
            ['work_state_id' => WorkState::OnTheWay, 'work_state_group_id' => WorkStateGroup::OnTheWay, 'work_state_name' => WorkState::getDescription(WorkState::OnTheWay)],
            ['work_state_id' => WorkState::Arrive, 'work_state_group_id' => WorkStateGroup::Arrive, 'work_state_name' => WorkState::getDescription(WorkState::Arrive)],
        ]);
    }
}
