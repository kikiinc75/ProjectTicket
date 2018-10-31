<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trains_detail extends Model
{
    protected $table = 'trains_detail';
    protected $fillable = ['trains_id','name', 'eco_seat_qty', 'bus_seat_qty', 'exec_seat_qty'];
    public function trains()
    {
    	return $this->belongsTo(trains::class);
    }
}
