<?php

namespace App;

use Illuminate\Database\Eloquent\Model as EloquentModel;

class Vehicle extends EloquentModel
{
    protected $fillable = ['make_id', 'model_id'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * Get the vehicle entries
     * @return Entry
     */
    public function entries()
    {
        return $this->hasMany(Entry::class);
    }

    /**
     * Get the owner
     * @return User
     */
    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the make
     * @return Make
     */
    public function make()
    {
        return $this->belongsTo(Make::class);
    }

    /**
     * Get the model
     * @return Model
     */
    public function model()
    {
        return $this->belongsTo(Model::class);
    }
}
