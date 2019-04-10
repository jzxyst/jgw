<?php

use Illuminate\Database\Seeder;
use App\Enums\PositionGroup;

class PositionGroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('position_groups')->insert([
            ['position_group_name' => PositionGroup::getDescription(PositionGroup::NotSet), 'sort_number' => 0],
            ['position_group_name' => PositionGroup::getDescription(PositionGroup::Staff), 'sort_number' => 0],
            ['position_group_name' => PositionGroup::getDescription(PositionGroup::Chief), 'sort_number' => 0],
            ['position_group_name' => PositionGroup::getDescription(PositionGroup::UnitHead), 'sort_number' => 0],
            ['position_group_name' => PositionGroup::getDescription(PositionGroup::SectionHead), 'sort_number' => 0],
            ['position_group_name' => PositionGroup::getDescription(PositionGroup::Manager), 'sort_number' => 0],
            ['position_group_name' => PositionGroup::getDescription(PositionGroup::President), 'sort_number' => 0],
        ]);
    }
}
