<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Kasey C.',
            'email' => 'kcowley1988@gmail.com',
            'password' => Hash::make('1234'),
        ]);
    }
}
