<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = new \App\Libs\Seeder\User();
        $users = $user->getUser(100);
        foreach ($users as $user) {
            list($name1, $name2) = explode(' ', $user[0]);
            list($name1_kana, $name2_kana) = explode(' ', $user[1]);

            $user_model = \App\Model\User::create([
                'mail' => '',
                'name1' => $name1,
                'name2' => $name2,
            ]);
        }
    }
}
