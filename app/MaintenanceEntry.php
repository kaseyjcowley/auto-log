<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaintenanceEntry extends Model
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
}
