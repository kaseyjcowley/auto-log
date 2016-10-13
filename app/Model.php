<?php

namespace App;

use Illuminate\Database\Eloquent\Model as EloquentModel;

class Model extends EloquentModel
{
    protected $fillable = ['make_id', 'name'];
    protected $hidden = ['created_at', 'updated_at'];
}
