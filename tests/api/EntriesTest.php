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

    /** @test */
    public function it_shows_an_entry()
    {
        Vehicle::find(1)->entries()->save(
            factory(Entry::class)->make()
        );

        $this->get('api/vehicles/1/entries/1')
            ->seeJsonStructure(['id', 'vehicle_id', 'mileage', 'description', 'date_performed']);
    }

    /** @test */
    public function it_updates_an_entry()
    {
        $entry = factory(Entry::class)->make();

        Vehicle::find(1)->entries()->save($entry);

        $this->patch("api/vehicles/1/entries/{$entry->id}", [
            'mileage' => 12345,
        ]);

        $this->assertResponseStatus(Response::HTTP_NO_CONTENT);

        $this->get('api/vehicles/1/entries/1')
            ->seeJson([
                'id' => $entry->id,
                'mileage' => 12345,
            ]);
    }

    /** @test */
    public function it_deletes_an_entry()
    {
        $entry = factory(Entry::class)->make();

        Vehicle::find(1)->entries()->save($entry);

        $this->delete("api/vehicles/1/entries/{$entry->id}");
        $this->assertResponseStatus(Response::HTTP_NO_CONTENT);

        $this->get("api/vehicles/1/entries/{$entry->id}");
        $this->assertResponseStatus(Response::HTTP_NOT_FOUND);
    }
}
