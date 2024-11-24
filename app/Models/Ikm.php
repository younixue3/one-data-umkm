<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Ikm extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function kelurahan(): BelongsTo
    {
        return $this->belongsTo(Kelurahan::class);
    }

    public function kecamatan(): BelongsTo
    {
        return $this->belongsTo(Kecamatan::class);
    }

    public function kabupaten(): BelongsTo
    {
        return $this->belongsTo(Kabupaten::class);
    }

    public function provinsi(): BelongsTo
    {
        return $this->belongsTo(Provinsi::class);
    }

    public function typeindustries(): BelongsToMany
    {
        return $this->belongsToMany(Typeindustrie::class, 'ikm_typeindustrie', 'ikm_id', 'typeindustrie_id');
    }

    public function typeproducts(): BelongsToMany
    {
        return $this->belongsToMany(Typeproduct::class, 'ikm_typeproduct', 'ikm_id', 'typeproduct_id');
    }
}
