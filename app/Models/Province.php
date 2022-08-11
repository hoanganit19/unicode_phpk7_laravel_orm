<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
use App\Models\User;

class Province extends Model
{
    use HasFactory;

    protected $table = 'provinces';

    public function posts(){
        return $this->hasManyThrough(
            Post::class,
            User::class,
            'province_id',
            'user_id',
            'id',
            'id'
        );
    }

    public function users(){
        return $this->hasMany(
            User::class,
            'province_id',
            'id'
        );
    }
}
