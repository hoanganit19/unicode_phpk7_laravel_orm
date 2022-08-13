<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Phone;
use App\Models\Group;
use App\Models\Post;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $with = ['group']; //Thiết lập Eager Loading mặc định

    public function phone(){
        return $this->hasOne(
            Phone::class,
            'user_id',
            'id'
        )->withDefault(function ($phone){
            $phone->phone = 'no number';
            $phone->created_at = date('Y-m-d H:i:s');
        });
    }

    public function group(){
        return $this->belongsTo(
            Group::class,
            'group_id',
            'id'
        );
    }

    public function posts(){
        return $this->hasMany(
            Post::class,
            'user_id',
            'id'
        );
    }
}
