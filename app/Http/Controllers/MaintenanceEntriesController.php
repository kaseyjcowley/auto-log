<?php

namespace App\Http\Controllers;

use App\Vehicle;
use App\MaintenanceEntry;
use App\Http\Requests\StoreMaintenanceEntryRequest;
use App\Http\Requests\UpdateMaintenanceEntryRequest;

class MaintenanceEntriesController extends Controller
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
     * @param  StoreMaintenanceEntryRequest $request
     * @param  integer                      $vehicleId
     * @return Response
     */
    public function store(StoreMaintenanceEntryRequest $request, $vehicleId)
    {
        $entry = new MaintenanceEntry([
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
     * @param  UpdateMaintenanceEntryRequest $request
     * @param  integer                       $vehicleId
     * @param  integer                       $entry
     * @return Response
     */
    public function update(UpdateMaintenanceEntryRequest $request, $vehicleId, $entry)
    {
        MaintenanceEntry::find($entry)->update(
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
        MaintenanceEntry::find($entry)->delete();

        return $this->respondNoContent();
    }
}
