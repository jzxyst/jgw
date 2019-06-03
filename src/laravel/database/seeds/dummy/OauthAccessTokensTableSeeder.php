<?php

use Illuminate\Database\Seeder;

class OauthAccessTokensTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // localhost/oauth/token
        DB::table('oauth_access_tokens')->insert([
            [
                'id' => 'fb6ee8d3b44dc35d9a25ee3671adf8ec9589bea7b5e44f35fc9e9e3aa9c46c616042fe832f2991f5',
                'user_id' => 1,
                'client_id' => 1,
                'name' => null,
                'scopes' => '["*"]',
                'revoked' => 0,
                'expires_at' => '2020-01-01 00:00:00'
            ],
        ]);
    }
}
