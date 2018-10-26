<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transportation extends Model
{
    protected $table='transportation';
    protected $primaryKey = 'id';
    protected $fillable= ['transportation_class_id','transportation_type_id','code','description','seat_qty'];
}
