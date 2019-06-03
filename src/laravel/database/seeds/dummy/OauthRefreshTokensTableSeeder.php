<?php

use Illuminate\Database\Seeder;

class OauthRefreshTokensTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // localhost/oauth/token
        DB::table('oauth_refresh_tokens')->insert([
            [
                'id' => '4d6a423adea7465ede82e443537ff3421aca883acddd8f927be284aafc9cacdcfd89af159e7a470c',
                'access_token_id' => 'fb6ee8d3b44dc35d9a25ee3671adf8ec9589bea7b5e44f35fc9e9e3aa9c46c616042fe832f2991f5',
                'revoked' => 0,
                'expires_at' => '2020-01-01 00:00:00'
            ],
        ]);
    }
}
