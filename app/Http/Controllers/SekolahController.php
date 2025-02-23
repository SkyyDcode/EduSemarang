<?php

namespace App\Http\Controllers;

use App\Models\sekolah;
use App\Models\kecamatan;
use App\Models\kelurahan;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoresekolahRequest;
use App\Http\Requests\UpdatesekolahRequest;

class SekolahController extends Controller
{
    // Definisikan daftar jurusan sebagai property
    private $jurusanList = [
        'Teknik Komputer dan Jaringan',
        'Rekayasa Perangkat Lunak',
        'Multimedia',
        'Teknik Elektronika Industri',
        'Teknik Mekatronika',
        'Teknik Otomasi Industri',
        'Akuntansi',
        'Administrasi Perkantoran',
        'Pemasaran',
        'Tata Boga',
        'Tata Busana',
        'Perhotelan'
    ];

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        try {
            // Ambil data sekolah dengan relasi kecamatan dan kelurahan
            $sekolah = sekolah::with(['kecamatan', 'kelurahan'])
                              ->latest()
                              ->paginate(10);

            // Kirim semua data ke view
            return view('page.atmin.atmin', compact('sekolah'));

        } catch (\Exception $e) {
            \Log::error('Error padsa halaman index: ' . $e->getMessage());

            // Return view dengan data kosong jika terjadi error
            return view('page.atmin.atmin', [
                'sekolah' => collect([]),
                'adminCount' => 0,
                'userCount' => 0,
                'tkCount' => 0,
                'sdCount' => 0,
                'smpCount' => 0,
                'smaCount' => 0
            ])->with('error', 'Terjadi kesalahan saat memuat data');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kecs = kecamatan::orderBy('kecamatan', 'asc')->get();
        return view('crud.create', [
            'kecs' => $kecs,
            'jurusanList' => $this->jurusanList
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validasi input
            $validated = $request->validate([
                'nama_sekolah' => 'required|string|max:255',
                'npsn' => 'required|string|max:20',
                'jenjang' => 'required|string|in:PAUD,TK,SD,SMP,SMA,SMK',
                'alamat' => 'required|string',
                'kecamatan_id' => 'required|exists:kecamatans,id',
                'kelurahan_id' => 'required|exists:kelurahans,kode',
                'kode_pos' => 'required|string|max:10',
                'telepon' => 'required|string|max:20',
                'email' => 'required|email|max:255',
                'website' => 'nullable|url|max:255',
                'kepala_sekolah' => 'required|string|max:255',
                'jumlah_siswa' => 'required|integer|min:0',
                'jumlah_guru' => 'required|integer|min:0',
                'foto_sekolah' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'foto_kepala_sekolah' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'jurusan_smk' => 'nullable|array|required_if:jenjang,SMK',
                'jurusan_smk.*' => 'string|max:255'
            ]);

            // Cek apakah kelurahan sudah ada di kecamatan yang dipilih
            $kelurahanExists = kelurahan::where('kelurahan', $request->kelurahan_id)
                ->where('kecamatan_id', $validated['kecamatan_id'])
                ->exists();

            if ($kelurahanExists) {
                return redirect()->back()->withErrors(['kelurahan_id' => 'Kelurahan sudah ada di kecamatan ini.']);
            }

            // Handle upload foto sekolah
            if ($request->hasFile('foto_sekolah')) {
                $fotoSekolahPath = $request->file('foto_sekolah')->store('sekolah-photos', 'public');
            }

            // Handle upload foto kepala sekolah
            if ($request->hasFile('foto_kepala_sekolah')) {
                $fotoKepalaSekolahPath = $request->file('foto_kepala_sekolah')->store('kepala-sekolah-photos', 'public');
            }

            // Ambil id kelurahan berdasarkan kode
            $kelurahan = Kelurahan::where('kode', $validated['kelurahan_id'])->first();
            if (!$kelurahan) {
                throw new \Exception('Kelurahan tidak ditemukan');
            }

            // Buat record sekolah baru
            sekolah::create([
                'nama_sekolah' => $validated['nama_sekolah'],
                'npsn' => $validated['npsn'],
                'jenjang' => $validated['jenjang'],
                'alamat' => $validated['alamat'],
                'kecamatan_id' => $validated['kecamatan_id'],
                'kelurahan_id' => $kelurahan->id,
                'kode_pos' => $validated['kode_pos'],
                'telepon' => $validated['telepon'],
                'email' => $validated['email'],
                'website' => $validated['website'],
                'kepala_sekolah' => $validated['kepala_sekolah'],
                'jumlah_siswa' => $validated['jumlah_siswa'],
                'jumlah_guru' => $validated['jumlah_guru'],
                'foto_sekolah' => $fotoSekolahPath ?? null,
                'foto_kepala_sekolah' => $fotoKepalaSekolahPath ?? null,
                'jurusan_smk' => $request->jenjang === 'SMK' ? $request->jurusan_smk : null
            ]);

            return redirect()->route('sekolah.index')
                ->with('success', 'Data sekolah berhasil ditambahkan')
                ->with('showSekolahContent', true);

        } catch (\Exception $e) {
            // Hapus foto yang sudah diupload jika ada error
            if (isset($fotoSekolahPath) && Storage::disk('public')->exists($fotoSekolahPath)) {
                Storage::disk('public')->delete($fotoSekolahPath);
            }
            if (isset($fotoKepalaSekolahPath) && Storage::disk('public')->exists($fotoKepalaSekolahPath)) {
                Storage::disk('public')->delete($fotoKepalaSekolahPath);
            }

            return redirect()->back()
                ->withInput()
                ->withErrors($e->getMessage())
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(sekolah $sekolah): View
    {
        return view('page.show.sekolah', compact('sekolah'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(sekolah $sekolah): View
    {
        $kecs = kecamatan::orderBy('kecamatan', 'asc')->get();
        return view('crud.edit', [
            'sekolah' => $sekolah,
            'kecs' => $kecs,
            'jurusanList' => $this->jurusanList
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, sekolah $sekolah)
    {
        try {
            $validated = $request->validate([
                'nama_sekolah' => 'required|string|max:255',
                'npsn' => 'required|string|max:20',
                'jenjang' => 'required|string|in:PAUD,TK,SD,SMP,SMA,SMK',
                'alamat' => 'required|string',
                'kecamatan_id' => 'required|exists:kecamatans,id',
                'kelurahan_id' => 'required|exists:kelurahans,kode',
                'kode_pos' => 'required|string|max:10',
                'telepon' => 'required|string|max:20',
                'email' => 'required|email|max:255',
                'website' => 'nullable|url|max:255',
                'kepala_sekolah' => 'required|string|max:255',
                'jumlah_siswa' => 'required|integer|min:0',
                'jumlah_guru' => 'required|integer|min:0',
                'foto_sekolah' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'foto_kepala_sekolah' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'jurusan_smk' => 'nullable|array|required_if:jenjang,SMK',
                'jurusan_smk.*' => 'string|max:255'
            ]);

            // Handle foto sekolah
            if ($request->hasFile('foto_sekolah')) {
                if ($sekolah->foto_sekolah) {
                    Storage::disk('public')->delete($sekolah->foto_sekolah);
                }
                $fotoSekolahPath = $request->file('foto_sekolah')->store('sekolah-photos', 'public');
            }

            // Handle foto kepala sekolah
            if ($request->hasFile('foto_kepala_sekolah')) {
                if ($sekolah->foto_kepala_sekolah) {
                    Storage::disk('public')->delete($sekolah->foto_kepala_sekolah);
                }
                $fotoKepalaSekolahPath = $request->file('foto_kepala_sekolah')->store('kepala-sekolah-photos', 'public');
            }

            // Ambil kelurahan berdasarkan kode
            $kelurahan = kelurahan::where('kode', $validated['kelurahan_id'])->first();
            if (!$kelurahan) {
                throw new \Exception('Kelurahan tidak ditemukan');
            }

            // Update data sekolah
            $sekolah->update([
                'nama_sekolah' => $validated['nama_sekolah'],
                'npsn' => $validated['npsn'],
                'jenjang' => $validated['jenjang'],
                'alamat' => $validated['alamat'],
                'kecamatan_id' => $validated['kecamatan_id'],
                'kelurahan_id' => $kelurahan->id,
                'kode_pos' => $validated['kode_pos'],
                'telepon' => $validated['telepon'],
                'email' => $validated['email'],
                'website' => $validated['website'],
                'kepala_sekolah' => $validated['kepala_sekolah'],
                'jumlah_siswa' => $validated['jumlah_siswa'],
                'jumlah_guru' => $validated['jumlah_guru'],
                'foto_sekolah' => $fotoSekolahPath ?? $sekolah->foto_sekolah,
                'foto_kepala_sekolah' => $fotoKepalaSekolahPath ?? $sekolah->foto_kepala_sekolah,
                'jurusan_smk' => $request->jenjang === 'SMK' ? $request->jurusan_smk : null
            ]);

            // Cek apakah request meminta JSON
            if ($request->expectsJson()) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Data sekolah berhasil diperbarui'
                ]);
            }

            return redirect()
                ->route('sekolah.index')
                ->with('success', 'Data sekolah berhasil diperbarui')
                ->with('showSekolahContent', true);

        } catch (\Exception $e) {
            \Log::error('Error updating sekolah: ' . $e->getMessage());

            if (isset($fotoSekolahPath) && Storage::disk('public')->exists($fotoSekolahPath)) {
                Storage::disk('public')->delete($fotoSekolahPath);
            }
            if (isset($fotoKepalaSekolahPath) && Storage::disk('public')->exists($fotoKepalaSekolahPath)) {
                Storage::disk('public')->delete($fotoKepalaSekolahPath);
            }

            if ($request->expectsJson()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Terjadi kesalahan: ' . $e->getMessage()
                ], 422);
            }

            return back()
                ->withInput()
                ->withErrors($e->getMessage())
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(sekolah $sekolah)
    {
        // Hapus foto sekolah jika ada
        if ($sekolah->foto_sekolah) {
            Storage::disk('public')->delete($sekolah->foto_sekolah);
        }

        // Hapus data sekolah
        $sekolah->delete();

        return redirect()->route('sekolah.index')
            ->with('success', 'Data sekolah berhasil dihapus.');
    }

    public function getKelurahan($kecamatan_id)
    {
        try {
            \Log::info('Mencari kelurahan untuk kecamatan_id: ' . $kecamatan_id);

            // Pastikan kecamatan ada
            $kecamatan = kecamatan::find($kecamatan_id);
            if (!$kecamatan) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Kecamatan tidak ditemukan'
                ], 404);
            }

            // Query kelurahan
            $kelurahans = kelurahan::where('kecamatan_id', $kecamatan_id)
                ->select('kode', 'kelurahan')
                ->orderBy('kelurahan', 'asc')
                ->get()
                ->map(function($item) {
                    return [
                        'id' => $item->kode,
                        'nama_kelurahan' => $item->kelurahan
                    ];
                });

            if ($kelurahans->isEmpty()) {
                \Log::warning('Tidak ada kelurahan untuk kecamatan_id: ' . $kecamatan_id);
                return response()->json([
                    'status' => 'success',
                    'data' => [],
                    'message' => 'Tidak ada kelurahan untuk kecamatan ini'
                ]);
            }

            return response()->json([
                'status' => 'success',
                'data' => $kelurahans
            ]);

        } catch (\Exception $e) {
            \Log::error('Error saat mengambil data kelurahan: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal mengambil data kelurahan'
            ], 500);
        }
    }

    public function getKecamatanByKelurahan($kelurahan_id)
    {
        try {
            $kelurahan = kelurahan::with('kecamatan')
                                ->where('kode', $kelurahan_id)
                                ->first();

            if ($kelurahan && $kelurahan->kecamatan) {
                return response()->json([
                    'status' => 'success',
                    'data' => [
                        'kecamatan_id' => $kelurahan->kecamatan_id,
                        'kelurahan_id' => $kelurahan->kode
                    ]
                ]);
            }

            return response()->json([
                'status' => 'error',
                'message' => 'Data tidak ditemukan'
            ], 404);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal mengambil data kecamatan'
            ], 500);
        }
    }

    public function filter(Request $request)
    {
        $query = sekolah::with(['kecamatan', 'kelurahan']);

        // Filter berdasarkan jenjang
        if ($request->has('jenjang') && $request->jenjang != '') {
            $query->where('jenjang', $request->jenjang);
        }

        // Filter berdasarkan daerah
        if ($request->has('kecamatan_id') && $request->kecamatan_id != '') {
            $query->where('kecamatan_id', $request->kecamatan_id);
        }

        // Filter berdasarkan pencarian
        if ($request->has('search') && $request->search != '') {
            $query->where('nama_sekolah', 'like', '%' . $request->search . '%');
        }

        $sekolah = $query->latest()->paginate(10);

        return response()->json($sekolah);
    }
}
