<?php

namespace App;

use Illuminate\Database\Eloquent\Model as EloquentModel;

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
}
