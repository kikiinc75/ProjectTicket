<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trains_schedule extends Model
{
    protected $table = 'trains_schedule';
    protected $fillable = ['station_id','trains_id','from', 'destination', 'boardingtime'];
    public function trains_detail(){
    	return $this->belongsTo(Trains_detail::class);
    }
    public function station(){
    	return $this->belongsTo(Ttation::class);
    }
    public function trains_reservation(){
    	return $this->hasMany(Trains_reservation::class);
    }
}
