<?php

use App\Entry;
use App\Vehicle;

class EntriesTest extends TestCase
{
    /** @test */
    public function it_exposes_entries()
    {
        Vehicle::find(1)->entries()->save(
            factory(Entry::class)->make()
        );

        $this->get('/api/vehicles/1/entries')
            ->seeJsonStructure([
                '*' => ['id', 'vehicle_id', 'mileage', 'description', 'date_performed'],
            ]);
    }
}
