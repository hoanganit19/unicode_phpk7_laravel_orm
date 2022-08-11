<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Owner;
use App\Models\Car;

class Mechanic extends Model
{
    use HasFactory;

    protected $table = 'mechanics';

    public function carOwner(){
        return $this->hasOneThrough(
            Owner::class,
            Car::class,
            'mechanic_id', //khoá ngoại của bảng trung gian
            'car_id', //Khoá ngoại của bảng mục tiêu
            'id', //Khoá chính của table hiện tại
            'id' //Khoá chính của bảng trung gian
        );
    }
}
