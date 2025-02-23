<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class kecamatan extends Model
{
    /** @use HasFactory<\Database\Factories\KecamatanFactory> */
    use HasFactory;

    protected $table = 'kecamatans';

    protected $fillable = [
        'kode',
        'kecamatan'
    ];

    /**
     * Get all of the sekolah for the kecamatan
     */
    public function sekolah(): HasMany
    {
        return $this->hasMany(sekolah::class, 'kecamatan_id');
    }

    /**
     * Get all of the kelurahan for the kecamatan
     */
    public function kelurahan(): HasMany
    {
        return $this->hasMany(kelurahan::class, 'kecamatan_id');
    }

    public function getNamaKecamatanAttribute()
    {
        return $this->kecamatan;
    }
}
