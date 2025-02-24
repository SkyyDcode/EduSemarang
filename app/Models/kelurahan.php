<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kelurahan extends Model
{
    use HasFactory;

    protected $table = 'kelurahans';

    protected $fillable = [
        'kode',
        'kelurahan',
        'kecamatan_id'
    ];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'kecamatan_id');
    }

    // Accessor jika diperlukan
    public function getNamaKelurahanAttribute()
    {
        return $this->kelurahan;
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($kelurahan) {
            if (self::where('kelurahan', $kelurahan->kelurahan)
                ->where('kecamatan_id', $kelurahan->kecamatan_id)
                ->exists()) {
                throw new \Exception('Kelurahan sudah ada di kecamatan ini.');
            }
        });
    }
}