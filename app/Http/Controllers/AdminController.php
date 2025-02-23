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

            // Debug untuk memeriksa nilai
            // dd($adminCount, User::where('level', 'admin')->get());

            // Hitung total sekolah berdasarkan jenjang
            $totalSekolahTK = Sekolah::where('jenjang', 'TK')->count();
            $totalSekolahSD = Sekolah::where('jenjang', 'SD')->count();
            $totalSekolahSMP = Sekolah::where('jenjang', 'SMP')->count();
            $totalSekolahSMA = Sekolah::where('jenjang', 'SMA')->count();
            $totalSekolahSMK = Sekolah::where('jenjang', 'SMK')->count();

            // Mengirim data ke view
            return view('page.atmin.atmin', compact(
                'adminCount',
                'userCount',
                'totalSekolahTK',
                'totalSekolahSD',
                'totalSekolahSMP',
                'totalSekolahSMA',
                'totalSekolahSMK'
            ));
        } catch (\Exception $e) {
            Log::error('Error in AdminController@index: ' . $e->getMessage());
            return view('page.atmin.atmin')->with('error', 'Terjadi kesalahan saat memuat data.');
        }
    }
}
