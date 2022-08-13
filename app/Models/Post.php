<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = ['title', 'status'];

    protected $attributes = [
        'status' => 1
    ];

    public $timestamps = false;

    public function categories(){
        return $this->belongsToMany(
            Category::class,
            'posts_categories',
            'post_id',
            'category_id'
        );
    }
}
