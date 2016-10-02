<?php

namespace App;

use Illuminate\Database\Eloquent\Model as EloquentModel;

class Vehicle extends EloquentModel
{
    protected $fillable = ['make_id', 'model_id'];

    /**
     * Get the maintenance entries
     * @return MaintenanceEntry
     */
    public function entries()
    {
        return $this->hasMany(MaintenanceEntry::class);
    }
}
