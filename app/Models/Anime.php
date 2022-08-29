<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Anime extends Model
{
    use HasFactory;
    protected $table ='animes';

    protected $fillable = [
        'name', 
        'category_id',
        'description',
        'image',
        'nb_episode',
        'date_release',
        'studio',
        'tags',
        'yt_iframe',
        'meta_title',
        'meta_description',
        'meta_keyword',
        'navbar_status',
        'status',
        'created_by'
    ];


    /**

 * Un modele A appartient à un modele B (ou "est associé à" ou "a").

 */


public function category()
{
    return $this->belongsTo(Category::class, 'category_id', 'id');
}


}

