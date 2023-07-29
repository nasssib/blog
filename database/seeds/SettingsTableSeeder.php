<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Setting::create([

            'site_name'=>'laravel`s blog',
            'address'=>'syria',
            'contact_number'=>'09999999',
            'contact_email'=>'nassibbb@mail.com'
        ]);
    }
}
