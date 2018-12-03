<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planes_reservation extends Model
{
    protected $table = 'planes_reservation';
    protected $fillable = ['planes_schedule_id','user_id','customer_id','planes_class_seat'];
    public function user(){
    	return $this->belongsTo(User::class);
    }
    public function planes_schedule(){
    	return $this->belongsTo(Planes_schedule::class);
    }
    public function customer(){
    	return $this->belongsTo(Customer::class);
    }
}
