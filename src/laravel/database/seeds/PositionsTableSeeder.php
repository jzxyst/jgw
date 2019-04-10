<?php

use Illuminate\Database\Seeder;
use App\Enums\Position;
use App\Enums\PositionGroup;

class PositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('positions')->insert([
            ['position_group_id' => PositionGroup::NotSet, 'position_name' => Position::getDescription(Position::NotSet), 'sort_number' => 0],
            ['position_group_id' => PositionGroup::Staff, 'position_name' => Position::getDescription(Position::Staff), 'sort_number' => 0],
            ['position_group_id' => PositionGroup::Chief, 'position_name' => Position::getDescription(Position::Chief), 'sort_number' => 0],
            ['position_group_id' => PositionGroup::UnitHead, 'position_name' => Position::getDescription(Position::UnitHead), 'sort_number' => 0],
            ['position_group_id' => PositionGroup::SectionHead, 'position_name' => Position::getDescription(Position::SectionHead), 'sort_number' => 0],
            ['position_group_id' => PositionGroup::Manager, 'position_name' => Position::getDescription(Position::Manager), 'sort_number' => 0],
            ['position_group_id' => PositionGroup::President, 'position_name' => Position::getDescription(Position::President), 'sort_number' => 0],
        ]);
    }
}
