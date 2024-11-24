<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bigindustri extends Model
{
    use HasFactory;

    protected $table = 'bigindustries';
    
    protected $fillable = [
        'nama_perusahaan',
        'sektor_industri', 
        'kabupaten_id',
        'alamat_pabrik'
    ];

    public function kabupaten(): BelongsTo
    {
        return $this->belongsTo(Kabupaten::class);
    }
}
