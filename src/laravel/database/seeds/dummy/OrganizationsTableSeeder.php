<?php

use Illuminate\Database\Seeder;

class OrganizationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('organizations')->insert([
            ['organization_id' => 1, 'parent_organization_id' => null, 'organization_name' => 'Company'],
            ['organization_id' => 2, 'parent_organization_id' => 1, 'organization_name' => 'System Solution Division'],
            ['organization_id' => 3, 'parent_organization_id' => 2, 'organization_name' => 'System Developing Section'],
            ['organization_id' => 4, 'parent_organization_id' => 3, 'organization_name' => 'E-Commerce Team'],
        ]);
    }
}
