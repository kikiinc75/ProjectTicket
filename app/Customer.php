<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table='cusromer';
    protected $fillable= ['nik','name','address','phone','gender'];

    public function planes_reservation(){
        return $this->hasMany(planes_reservation::class);
    }
    public function trains_reservation(){
        return $this->hasMany(trains_reservation::class);
    }
}
