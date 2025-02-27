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
        'visi_misi',
        'profil', 
        'tugas_pokok_fungsi'
    ];
}
