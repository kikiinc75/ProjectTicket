<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planes_detail extends Model
{
    protected $table = 'planes_detail';
    protected $fillable = ['planes_id','code'];

    public function planes()
    {
    	return $this->belongsTo(Planes::class);
    }
    public function planes_schedule()
    {
    	return $this->hasMany(Planes_schedule::class);
    }
}
