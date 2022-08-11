<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Car;

class Owner extends Model
{
    use HasFactory;

    protected $table = 'owners';

    public function car(){
        return $this->belongsTo(
            Car::class,
            'car_id',
            'id'
        );
    }
}
