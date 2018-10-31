<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trains_schedule extends Model
{
    protected $table = 'trains_schedule';
    protected $fillable = ['station_id','trains_id','from', 'destination', 'boardingtime'];
    public function trains(){
    	return $this->belongsTo(trains::class);
    }
    public function station(){
    	return $this->belongsTo(station::class);
    }
    public function trains_reservation(){
    	return $this->hasMany(trains_reservation::class);
    }
}
