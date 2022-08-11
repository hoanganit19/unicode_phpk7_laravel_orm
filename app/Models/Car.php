<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mechanic;

class Car extends Model
{
    use HasFactory;

    protected $table = 'cars';

    public function mechanic(){
        return $this->belongsTo(
            Mechanic::class,
            'mechanic_id',
            'id'
        );
    }
}
