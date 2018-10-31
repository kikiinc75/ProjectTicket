<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planes_schedule extends Model
{
    protected $table = 'planes_schedule';
    protected $fillable = ['airport_id','planes_id','from', 'destination', 'boardingtime'];
    public function trains(){
    	return $this->belongsTo(trains::class);
    }
    public function airport(){
    	return $this->belongsTo(airport::class);
    }
    public function planes_reservation(){
    	return $this->hasMany(trains_reservation::class);
    }
}
