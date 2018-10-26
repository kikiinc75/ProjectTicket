<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cusromer extends Model
{
    protected $table='cusromer';
    protected $primaryKey = 'id';
    protected $fillable= ['nik','name','address','phone','gender'];
    
}
