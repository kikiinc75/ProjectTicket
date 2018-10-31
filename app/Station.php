<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    protected $table = 'station';
    protected $fillable = ['code','city', 'name'];
    public function trains_schedule()
    {
    	return $this->hasMany(trains_schedule::class);
    }
}
