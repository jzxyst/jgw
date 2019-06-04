<?php

use Illuminate\Database\Seeder;

class DummySeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(OauthClientsTableSeeder::class);
        $this->call(OauthAccessTokensTableSeeder::class);
        $this->call(OauthRefreshTokensTableSeeder::class);

        $this->call(UsersTableSeeder::class);
        $this->call(OrganizationsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(PoliciesTableSeeder::class);
        $this->call(UserRolesTableSeeder::class);
        $this->call(RolePoliciesTableSeeder::class);
    }
}
