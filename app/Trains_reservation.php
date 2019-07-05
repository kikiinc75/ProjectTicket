<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trains_reservation extends Model
{
    protected $table = 'trains_reservation';
    protected $fillable = ['trains_schedule_id','user_id','customer_id','trains_class_seat'];
    public function user(){
    	return $this->belongsTo(User::class);
    }
    public function trains_schedule(){
    	return $this->belongsTo(Trains_schedule::class);
    }
    public function customer(){
    	return $this->belongsTo(Customer::class);
    }
}
