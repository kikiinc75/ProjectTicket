<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planes extends Model
{
    protected $table = 'planes';
    protected $fillable = ['name', 'eco_seat_qty', 'bus_seat_qty', 'first_seat_qty'];
    public function planes_detail()
    {
        return $this->hasMany(Planes_detail::class);
    }
}
