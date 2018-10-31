<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planes extends Model
{
    protected $table = 'planes';
    protected $fillable = ['name', 'eco_seat_qty', 'bus_seat_qty', 'exec_seat_qty'];
    public function planes_detail()
    {
    	return $this->hasOne(planes_detail::class);
    }
    public function planes_schedule()
    {
    	return $this->hasOne(planes_schedule::class);
    }}
