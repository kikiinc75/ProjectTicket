<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trains extends Model
{
    protected $table = 'trains';
    protected $fillable = ['name', 'eco_seat_qty', 'bus_seat_qty', 'exec_seat_qty'];
    public function trains_detail()
    {
    	return $this->hasMany(Trains_detail::class);
    }
}
