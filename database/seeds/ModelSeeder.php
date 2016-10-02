<?php

use Illuminate\Database\Seeder;
use App\Model;

class ModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::create([
            'make_id' => 1,
            'name' => 'Ram 1500',
        ]);
    }
}
