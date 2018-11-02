<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trains_detail extends Model
{
    protected $table = 'trains_detail';
    protected $fillable = ['trains_id','code'];
    public function trains()
    {
    	return $this->belongsTo(Trains::class);
    }
    public function trains_schedule()
    {
    	return $this->hasMany(Trains_schedule::class);
    }
}
