<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Sekolah;
use App\Models\Visitor;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
{
    try {
        // Menghitung jumlah admin dan user
        $adminCount = User::where('level', 'admin')->count();
        $userCount = User::where('level', 'user')->count();

        // Mengambil jumlah sekolah berdasarkan jenjang dalam satu query
        $totalSekolah = Sekolah::selectRaw("
            COUNT(CASE WHEN jenjang = 'TK' THEN 1 END) as totalSekolahTK,
            COUNT(CASE WHEN jenjang = 'SD' THEN 1 END) as totalSekolahSD,
            COUNT(CASE WHEN jenjang = 'SMP' THEN 1 END) as totalSekolahSMP,
            COUNT(CASE WHEN jenjang = 'SMA' THEN 1 END) as totalSekolahSMA,
            COUNT(CASE WHEN jenjang = 'SMK' THEN 1 END) as totalSekolahSMK
        ")->first();

        // Kirim data ke view
        return view('page.atmin.atmin', compact(
            'adminCount',
            'userCount',
            'totalSekolah'
        ));
    } catch (\Exception $e) {
        Log::error('Error in AdminController@index: ' . $e->getMessage());
        return redirect()->back()->with('error', 'Terjadi kesalahan saat memuat data.');
    }
}

}
