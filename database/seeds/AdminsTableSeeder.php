<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Admin::create([
            'name'  => 'Admin ('.str_random(10).')',
            'email' => 'admin'.str_random(10).'@host.com',
            'password'  => bcrypt('password')
        ]);
    }
}
