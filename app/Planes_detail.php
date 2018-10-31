<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planes_detail extends Model
{
    protected $table = 'planes_detail';
    protected $fillable = ['planes_id','code', 'eco_seat_pay', 'bus_seat_pay', 'exec_seat_pay'];
    public function planes()
    {
    	return $this->belongsTo(planes::class);
    }}
