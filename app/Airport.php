<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    protected $table = 'airport';
    protected $fillable = ['code','city', 'name'];
    
    public function planes_schedule(){
    	return $this->hasMany(Planes_schedule::class);
    }
}
