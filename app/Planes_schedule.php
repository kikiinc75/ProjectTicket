<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planes_schedule extends Model
{
    protected $table = 'planes_schedule';
    protected $fillable = ['airport_id','planes_detail_id','from', 'destination','eco_seat_pay','bus_seat_pay','first_seat_pay', 'boardingtime'];
    public function planes_detail(){
    	return $this->belongsTo(Planes_detail::class);
    }
    public function airport(){
    	return $this->belongsTo(Airport::class);
    }
    public function planes_reservation(){
    	return $this->hasMany(Trains_reservation::class);
    }
}
