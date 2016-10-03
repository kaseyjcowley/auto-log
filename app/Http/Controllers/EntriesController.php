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
    public function index($vehicleId)
    {
        return Vehicle::find($vehicleId)->entries;
    }

    /**
     * @param  StoreEntryRequest $request
     * @param  integer           $vehicleId
     * @return Response
     */
    public function store(StoreEntryRequest $request, $vehicleId)
    {
        $entry = new Entry([
            'mileage' => $request->input('mileage'),
            'description' => $request->input('description'),
            'date_performed' => $request->input('date_performed'),
        ]);

        Vehicle::find($vehicleId)->entries()->save($entry);

        return $this->respondCreated();
    }

    /**
     * @param  integer $vehicleId
     * @param  integer $entry
     * @return Response
     */
    public function show($vehicleId, $entry)
    {
        return Vehicle::find($vehicleId)->entries()->find($entry);
    }

    /**
     * @param  UpdateEntryRequest $request
     * @param  integer            $vehicleId
     * @param  integer            $entry
     * @return Response
     */
    public function update(UpdateEntryRequest $request, $vehicleId, $entry)
    {
        Entry::find($entry)->update(
            $request->input()
        );

        return $this->respondNoContent();
    }

    /**
     * @param  integer $vehicleId
     * @param  integer $entry
     * @return Response
     */
    public function destroy($vehicleId, $entry)
    {
        Entry::find($entry)->delete();

        return $this->respondNoContent();
    }
}
