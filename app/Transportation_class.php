<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transportation_class extends Model
{
    protected $table='transportation_class';
    protected $primaryKey = 'id';
    protected $fillable= ['description_class'];

}
