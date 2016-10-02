<?php

use Illuminate\Database\Seeder;
use App\Make;

class MakeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Make::create([
            'name' => 'Dodge',
        ]);
    }
}
