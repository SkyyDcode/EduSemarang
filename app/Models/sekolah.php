<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class sekolah extends Model
{
    /** @use HasFactory<\Database\Factories\SekolahFactory> */
    use HasFactory;
    protected $fillable = [
        'nama_sekolah',
        'npsn',
        'jenjang',
        'alamat',
        'kecamatan_id',
        'kelurahan_id',
        'kode_pos',
        'telepon',
        'email',
        'website',
        'kepala_sekolah',
        'foto_sekolah',
        'foto_kepala_sekolah',
        'jumlah_siswa',
        'jumlah_guru',
        'jurusan_smk'
    ];

    protected $casts = [
        'jurusan_smk' => 'array'
    ];

    /**
     * Get the kecamatan that owns the sekolah
     */
    public function kecamatan(): BelongsTo
    {
        return $this->belongsTo(kecamatan::class, 'kecamatan_id');
    }

    /**
     * Get the kelurahan that owns the sekolah
     */
    public function kelurahan(): BelongsTo
    {
        return $this->belongsTo(kelurahan::class, 'kelurahan_id');
    }
}
