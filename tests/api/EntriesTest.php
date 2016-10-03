<?php

use App\Entry;
use App\Vehicle;
use Illuminate\Http\Response;

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

    /** @test */
    public function it_stores_entries()
    {
        $data = [
            'mileage' => 1000,
            'description' => 'foo bar',
            'date_performed' => '2016-01-01',
        ];

        $this->post('/api/vehicles/1/entries', $data);

        $this->assertResponseStatus(Response::HTTP_CREATED);

        $this->get('/api/vehicles/1/entries')->seeJson($data);
    }
}
