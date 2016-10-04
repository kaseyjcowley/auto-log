<?php

namespace App\Http\Controllers;

use App\Vehicle;
use App\Entry;
use App\Http\Requests\StoreEntryRequest;
use App\Http\Requests\UpdateEntryRequest;

class EntriesController extends Controller
{
    /**
     * @param  integer $vehicleId
     * @return Response
     */
    public function index(int $vehicleId)
    {
        return Entry::forVehicle($vehicleId)->get();
    }

    /**
     * @param  StoreEntryRequest $request
     * @param  integer           $vehicleId
     * @return Response
     */
    public function store(StoreEntryRequest $request, int $vehicleId)
    {
        $entry = new Entry([
            'mileage' => $request->input('mileage'),
            'description' => $request->input('description'),
            'date_performed' => $request->input('date_performed'),
        ]);

        Vehicle::findOrFail($vehicleId)->entries()->save($entry);

        return $this->respondCreated();
    }

    /**
     * @param  integer $vehicleId
     * @param  integer $entry
     * @return Response
     */
    public function show(int $vehicleId, int $entry)
    {
        return Entry::forVehicle($vehicleId)->findOrFail($entry);
    }

    /**
     * @param  UpdateEntryRequest $request
     * @param  integer            $vehicleId
     * @param  integer            $entry
     * @return Response
     */
    public function update(UpdateEntryRequest $request, int $vehicleId, int $entry)
    {
        Entry::findOrFail($entry)->update(
            $request->input()
        );

        return $this->respondNoContent();
    }

    /**
     * @param  integer $vehicleId
     * @param  integer $entry
     * @return Response
     */
    public function destroy(int $vehicleId, int $entry)
    {
        Entry::findOrFail($entry)->delete();

        return $this->respondNoContent();
    }
}
