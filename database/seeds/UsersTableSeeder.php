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
        User::create([
            'name' => "Emmanuel Oduro",
            'email' => "emmarthurson@gmail.com",
            'email_verified_at' => now(),
            'password' => Hash::make('decount655'), // password
            'remember_token' => Str::random(10),
        ]);
    }
}
