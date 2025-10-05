<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    protected $fillable = [
        'category',
        'description', 
        'image'
    ];

    protected $casts = [
        'category' => 'string'
    ];

    public const CATEGORIES = [
        'visi-misi',
        'profil', 
        'tugas-pokok-fungsi'
    ];
}
