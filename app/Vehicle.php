<?php

namespace App;

use Illuminate\Database\Eloquent\Model as EloquentModel;

class Vehicle extends EloquentModel
{
    protected $fillable = ['make_id', 'model_id'];

    /**
     * Get the vehicle entries
     * @return Entry
     */
    public function entries()
    {
        return $this->hasMany(Entry::class);
    }
}
