<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trains_reservation extends Model
{
    protected $table = 'trains_reservation';
    protected $fillable = ['schedule_id','user_id','customer_id','class_seat', 'price'];
    public function user(){
    	return $this->belongsTo(user::class);
    }
    public function trains_schedule(){
    	return $this->belongsTo(trains_schedule::class);
    }
    public function customer(){
    	return $this->belongsTo(customer::class);
    }
}
