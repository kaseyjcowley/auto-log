<?php

use Illuminate\Database\Seeder;
use App\Make;
use App\Model;
use App\Vehicle;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(MakeSeeder::class);
        $this->call(ModelSeeder::class);
        $this->call(VehicleSeeder::class);
    }
}
