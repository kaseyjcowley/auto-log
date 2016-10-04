<?php

namespace App;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Database\Eloquent\Builder;

class Entry extends EloquentModel
{
    protected $fillable = [
        'vehicle_id',
        'mileage',
        'description',
        'date_performed'
    ];

    protected $casts = [
        'vehicle_id' => 'integer',
        'mileage' => 'integer',
    ];

    /**
     * @param  Builder $query
     * @param  integer $vehicleId
     * @return Builder
     */
    public function scopeForVehicle(Builder $query, int $vehicleId)
    {
        return $query->where('vehicle_id', $vehicleId);
    }
}
