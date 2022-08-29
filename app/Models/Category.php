<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'meta_title',
        'meta_description',
        'meta_keyword',
        'navbar_status',
        'status',
        'created_by'
    ];

    //supprier les posts liés à la table categories
    // petit bug à corrigé plus tard
    // public function posts()
    // {
    //     return $this->hasMany(Post::class, 'category_id', 'id');
    // }
}
