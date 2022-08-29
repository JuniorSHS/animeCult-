<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paremetres extends Model
{
    use HasFactory;
    protected $table = 'settings';

    protected $fillable = [
        'nom_site',
        'logo_site',
        'favicon_site',
        'description',
        'meta_title',
        'meta_description',
        'meta_keyword',
    ];
    
}
