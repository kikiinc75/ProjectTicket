<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transportation_type extends Model
{
    protected $table='transportation_type';
    protected $primaryKey = 'id';
    protected $fillable= ['description_type'];
}
