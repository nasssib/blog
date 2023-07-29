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
       $user = App\User::create([

            'name'=>'_nassib_',
            'email'=>'nassib@tail.com',
            'password'=>bcrypt('password'),
            'admin'=>1

        ]);

        $user = App\Profile::create([

            'user_id'=>$user->id,
            'avatar'=>'uploads/avatar/image.png',
            'about'=>'hi it is nassib profile',
            'facebook'=>'facebook.com',
            'youtube'=>'youtube.com'
        ]);
    }
}
