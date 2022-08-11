<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'products';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $attributes = [
        'status' => 0
    ];

    protected $fillable = ['name', 'price'];
}
