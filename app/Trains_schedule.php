<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trains_schedule extends Model
{
    protected $table = 'trains_schedule';
    protected $fillable = ['station_id','trains_detail_id','from', 'destination','eco_seat_pay','bus_seat_pay','exec_seat_pay', 'boardingtime'];
    public function trains_detail(){
    	return $this->belongsTo(Trains_detail::class);
    }
    public function station(){
    	return $this->belongsTo(Station::class);
    }
    public function trains_reservation(){
    	return $this->hasMany(Trains_reservation::class);
    }
}
