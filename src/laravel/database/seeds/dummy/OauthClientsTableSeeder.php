<?php

use Illuminate\Database\Seeder;

class OauthClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // php artisan passport:client --password
        DB::table('oauth_clients')->insert([
            [
                'id' => 1,
                'user_id' => null,
                'name' => 'app',
                'secret' => 'ilG0A7NtYDC75N7BNfTkF8d8WdssppLlTN7kzwLg',
                'redirect' => '',
                'personal_access_client' => 0,
                'password_client' => 1,
                'revoked' => 0,
            ],
        ]);
    }
}
