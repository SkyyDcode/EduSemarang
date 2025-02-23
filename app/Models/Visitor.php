<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Visitor extends Model
{
    use HasFactory;

    protected $fillable = [
        'ip_address',
        'user_agent',
        'page_visited',
        'device_type'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    /**
     * Scope untuk mendapatkan data pengunjung 7 hari terakhir
     */
    public function scopeLast7Days(Builder $query)
    {
        return $query->select(
            DB::raw('DATE(created_at) as visit_date'),
            DB::raw('COUNT(*) as total_visitors')
        )
        ->whereDate('created_at', '>=', Carbon::now()->subDays(7))
        ->groupBy('visit_date')
        ->orderBy('visit_date');
    }

    /**
     * Scope untuk mendapatkan data pengunjung hari ini
     */
    public function scopeToday(Builder $query)
    {
        return $query->whereDate('created_at', Carbon::today());
    }

    /**
     * Scope untuk mendapatkan statistik perangkat
     */
    public function scopeDeviceStatistics(Builder $query)
    {
        return $query->select('device_type', DB::raw('COUNT(*) as total'))
            ->whereNotNull('device_type')
            ->groupBy('device_type');
    }

    /**
     * Scope untuk mendapatkan data berdasarkan tanggal
     */
    public function scopeByDate(Builder $query, $date)
    {
        return $query->whereDate('created_at', $date);
    }
}
