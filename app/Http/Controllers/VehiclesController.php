<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Vehicle;
use App\User;

class VehiclesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($userId)
    {
        return Vehicle::join('makes', 'makes.id', '=', 'vehicles.make_id')
            ->join('models', 'models.id', '=', 'vehicles.model_id')
            ->where('user_id', $userId)
            ->get([
                'vehicles.id',
                'user_id',
                'makes.name AS make',
                'models.name AS model'
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $userId)
    {
        $this->validate($request, [
            'make_id'  => 'required|integer|exists:makes,id',
            'model_id' => 'required|integer|exists:models,id',
        ]);

        $vehicle = new Vehicle([
            'make_id' => $request->input('make_id'),
            'model_id' => $request->input('model_id'),
        ]);

        User::findOrFail($userId)->vehicles()->save($vehicle);

        return $this->respondCreated($vehicle);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
