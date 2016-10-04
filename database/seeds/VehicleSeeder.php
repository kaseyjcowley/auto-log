<?php

use Illuminate\Database\Seeder;
use App\Vehicle;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vehicle::create([
            'user_id' => 1,
            'make_id' => 1,
            'model_id' => 1,
        ]);
    }
}
