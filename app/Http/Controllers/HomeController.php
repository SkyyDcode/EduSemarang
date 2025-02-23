<?php

namespace App\Http\Controllers;

use App\Models\Sekolah;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $kecamatans = Kecamatan::all();
        return view('page.index', compact('kecamatans'));
    }

    public function filter(Request $request)
    {
        $query = Sekolah::query();

        if ($request->search) {
            $query->where('nama_sekolah', 'like', '%' . $request->search . '%');
        }

        if ($request->kecamatan) {
            $query->whereHas('kecamatan', function($q) use ($request) {
                $q->where('kecamatan', $request->kecamatan);
            });
        }

        if ($request->desa) {
            $query->whereHas('kelurahan', function($q) use ($request) {
                $q->where('kelurahan', $request->desa);
            });
        }

        if ($request->jenjang) {
            $query->where('jenjang', $request->jenjang);
        }

        $sekolah = $query->get();

        $html = '';
        foreach ($sekolah as $item) {
            $html .= view('partials.sekolah_card', compact('item'))->render();
        }

        return $html;
    }
}
