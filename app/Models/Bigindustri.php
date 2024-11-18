<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bigindustri extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nama_perusahaan',
        'alamat_pabrik',
        'sektor_industri'
    ];
}
