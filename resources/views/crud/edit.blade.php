<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    @vite('resources/css/app.css')
    <title>Edit Data Sekolah</title>
</head>

<body class="bg-[#F4F4F4]">
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-3xl mx-auto">
            <!-- Notifikasi Error dan Success -->
            @if(session('success'))
                <div class="mb-4 p-4 rounded-lg bg-green-100 border border-green-400 text-green-700 relative" role="alert">
                    <strong class="font-bold">Berhasil!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                    <button class="absolute top-0 right-0 px-4 py-3" onclick="this.parentElement.style.display='none'">
                        <span class="text-green-700">&times;</span>
                    </button>
                </div>
            @endif

            @if(session('error'))
                <div class="mb-4 p-4 rounded-lg bg-red-100 border border-red-400 text-red-700 relative" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block sm:inline">{{ session('error') }}</span>
                    <button class="absolute top-0 right-0 px-4 py-3" onclick="this.parentElement.style.display='none'">
                        <span class="text-red-700">&times;</span>
                    </button>
                </div>
            @endif

            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="p-6">
                    <div class="border-b border-gray-200 pb-4 mb-4">
                        <h2 class="text-xl font-semibold text-gray-800">Edit Data Sekolah</h2>
                        <p class="text-sm text-gray-600 mt-1">Silakan edit data sekolah sesuai kebutuhan</p>
                    </div>

                    <form class="p-6 space-y-6" method="POST" action="{{ route('sekolah.update', $sekolah->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="space-y-4">
                            <h2 class="text-lg font-semibold text-gray-800">Informasi Dasar</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1" for="nama_sekolah">Nama Sekolah</label>
                                    <input class="w-full px-4 py-2 border @error('nama_sekolah') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        type="text" name="nama_sekolah" id="nama_sekolah" value="{{ old('nama_sekolah', $sekolah->nama_sekolah) }}" required>
                                    @error('nama_sekolah')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1" for="npsn">NPSN</label>
                                    <input class="w-full px-4 py-2 border @error('npsn') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        type="text" name="npsn" id="npsn" value="{{ old('npsn', $sekolah->npsn) }}" required>
                                    @error('npsn')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1" for="jenjang">Jenjang Sekolah</label>
                                    <select class="w-full px-4 py-2 border @error('jenjang') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        name="jenjang" id="jenjang" required>
                                        <option value="">Pilih Jenjang</option>
                                        <option value="PAUD" {{ old('jenjang', $sekolah->jenjang) == 'PAUD' ? 'selected' : '' }}>PAUD</option>
                                        <option value="TK" {{ old('jenjang', $sekolah->jenjang) == 'TK' ? 'selected' : '' }}>TK</option>
                                        <option value="SD" {{ old('jenjang', $sekolah->jenjang) == 'SD' ? 'selected' : '' }}>SD</option>
                                        <option value="SMP" {{ old('jenjang', $sekolah->jenjang) == 'SMP' ? 'selected' : '' }}>SMP</option>
                                        <option value="SMA" {{ old('jenjang', $sekolah->jenjang) == 'SMA' ? 'selected' : '' }}>SMA</option>
                                        <option value="SMK" {{ old('jenjang', $sekolah->jenjang) == 'SMK' ? 'selected' : '' }}>SMK</option>
                                    </select>
                                    @error('jenjang')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1" for="kecamatan">Kecamatan</label>
                                    <select class="w-full px-4 py-2 border @error('kecamatan_id') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        name="kecamatan_id" id="kecamatan" required>
                                        <option value="">Pilih Kecamatan</option>
                                        @foreach($kecs as $kec)
                                            <option value="{{ $kec->id }}" {{ old('kecamatan_id', $sekolah->kecamatan_id) == $kec->id ? 'selected' : '' }}>
                                                {{ $kec->kecamatan }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('kecamatan_id')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1" for="kelurahan">Kelurahan</label>
                                    <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        name="kelurahan_id" id="kelurahan" required>
                                        <option value="">Pilih Kelurahan</option>
                                    </select>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1" for="kode_pos">Kode Pos</label>
                                    <input class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        type="number" name="kode_pos" id="kode_pos" value="{{ old('kode_pos', $sekolah->kode_pos) }}" required>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1" for="alamat">Alamat</label>
                                    <textarea
                                        class="w-full px-4 py-2 border @error('alamat') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        name="alamat"
                                        id="alamat"
                                        required
                                        rows="3">{{ old('alamat', $sekolah->alamat) }}</textarea>
                                    @error('alamat')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1" for="telepon">Telepon</label>
                                    <input
                                        class="w-full px-4 py-2 border @error('telepon') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        type="text"
                                        name="telepon"
                                        id="telepon"
                                        value="{{ old('telepon', $sekolah->telepon) }}"
                                        required>
                                    @error('telepon')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1" for="email">Email</label>
                                    <input
                                        class="w-full px-4 py-2 border @error('email') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        type="email"
                                        name="email"
                                        id="email"
                                        value="{{ old('email', $sekolah->email) }}"
                                        required>
                                    @error('email')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1" for="website">Website</label>
                                    <input
                                        class="w-full px-4 py-2 border @error('website') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        type="url"
                                        name="website"
                                        id="website"
                                        value="{{ old('website', $sekolah->website) }}">
                                    @error('website')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="space-y-4">
                            <h2 class="text-lg font-semibold text-gray-800">Informasi Tambahan</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1" for="kepala_sekolah">Kepala Sekolah</label>
                                    <input class="w-full px-4 py-2 border @error('kepala_sekolah') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        type="text"
                                        name="kepala_sekolah"
                                        id="kepala_sekolah"
                                        value="{{ old('kepala_sekolah', $sekolah->kepala_sekolah) }}"
                                        required>
                                    @error('kepala_sekolah')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1" for="jumlah_siswa">Jumlah Siswa</label>
                                    <input class="w-full px-4 py-2 border @error('jumlah_siswa') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        type="number"
                                        name="jumlah_siswa"
                                        id="jumlah_siswa"
                                        value="{{ old('jumlah_siswa', $sekolah->jumlah_siswa) }}"
                                        min="0"
                                        required>
                                    @error('jumlah_siswa')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1" for="jumlah_guru">Jumlah Guru</label>
                                    <input class="w-full px-4 py-2 border @error('jumlah_guru') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        type="number"
                                        name="jumlah_guru"
                                        id="jumlah_guru"
                                        value="{{ old('jumlah_guru', $sekolah->jumlah_guru) }}"
                                        min="0"
                                        required>
                                    @error('jumlah_guru')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1" for="jurusan_smk">Jurusan SMK</label>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        @foreach($jurusanList as $jurusan)
                                            <div class="flex items-center">
                                                <input type="checkbox" name="jurusan_smk[]" value="{{ $jurusan }}"
                                                    id="jurusan_{{ Str::slug($jurusan) }}"
                                                    class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                                                    {{ in_array($jurusan, old('jurusan_smk', $sekolah->jurusan_smk ?? [])) ? 'checked' : '' }}>
                                                <label for="jurusan_{{ Str::slug($jurusan) }}" class="ml-2 text-sm text-gray-700">
                                                    {{ $jurusan }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1" for="foto_sekolah">Foto Sekolah</label>
                                    <input class="w-full px-4 py-2 border @error('foto_sekolah') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        type="file" name="foto_sekolah" id="foto_sekolah" accept="image/*">
                                    @if($sekolah->foto_sekolah)
                                        <div class="mt-2">
                                            <img src="{{ asset('storage/' . $sekolah->foto_sekolah) }}" alt="Foto Sekolah" class="w-32 h-32 object-cover rounded">
                                        </div>
                                    @endif
                                    <p class="mt-1 text-sm text-gray-500">Biarkan kosong jika tidak ingin mengubah foto</p>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1" for="foto_kepala_sekolah">Foto Kepala Sekolah</label>
                                    <input class="w-full px-4 py-2 border @error('foto_kepala_sekolah') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        type="file"
                                        name="foto_kepala_sekolah"
                                        id="foto_kepala_sekolah"
                                        accept="image/*">
                                    @if($sekolah->foto_kepala_sekolah)
                                        <div class="mt-2">
                                            <img src="{{ asset('storage/' . $sekolah->foto_kepala_sekolah) }}" alt="Foto Kepala Sekolah" class="w-32 h-32 object-cover rounded">
                                        </div>
                                    @endif
                                    <p class="mt-1 text-sm text-gray-500">Format: JPG, JPEG, PNG (Max. 2MB)</p>
                                    @error('foto_kepala_sekolah')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Tombol Submit -->
                        <div class="flex justify-end space-x-4 pt-4 border-t">
                            <a href="{{ route('sekolah.index') }}"
                               class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                                Batal
                            </a>
                            <button type="submit"
                                    class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Update Data
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        const kecamatanSelect = document.getElementById('kecamatan');
        const kelurahanSelect = document.getElementById('kelurahan');

        async function loadKelurahan(kecamatanId) {
            if (!kecamatanId) {
                kelurahanSelect.innerHTML = '<option value="">Pilih Kelurahan</option>';
                return;
            }

            try {
                kelurahanSelect.disabled = true;
                kelurahanSelect.innerHTML = '<option value="">Loading...</option>';

                const response = await fetch(`/api/kelurahan/${kecamatanId}`);
                const result = await response.json();

                if (!response.ok) throw new Error(result.message || 'Gagal memuat data');

                kelurahanSelect.innerHTML = '<option value="">Pilih Kelurahan</option>';

                if (result.status === 'success' && Array.isArray(result.data)) {
                    const currentKelurahan = "{{ old('kelurahan_id', $sekolah->kelurahan_id) }}";

                    result.data.forEach(kelurahan => {
                        const option = document.createElement('option');
                        option.value = kelurahan.id;
                        option.textContent = kelurahan.nama_kelurahan;
                        option.selected = kelurahan.id == currentKelurahan;
                        kelurahanSelect.appendChild(option);
                    });
                }
            } catch (error) {
                console.error('Error:', error);
                kelurahanSelect.innerHTML = '<option value="">Error: Gagal memuat data kelurahan</option>';
            } finally {
                kelurahanSelect.disabled = false;
            }
        }

        // Load kelurahan saat halaman dimuat
        document.addEventListener('DOMContentLoaded', function() {
            if (kecamatanSelect.value) {
                loadKelurahan(kecamatanSelect.value);
            }
        });

        // Event listener untuk perubahan kecamatan
        kecamatanSelect.addEventListener('change', function() {
            loadKelurahan(this.value);
        });

        // Tambahkan script untuk menampilkan/menyembunyikan field jurusan SMK
        document.getElementById('jenjang').addEventListener('change', function() {
            const jurusanContainer = document.getElementById('jurusan_smk_container');
            if (this.value === 'SMK') {
                jurusanContainer.style.display = 'block';
            } else {
                jurusanContainer.style.display = 'none';
            }
        });

        // Trigger event change saat halaman dimuat untuk mengatur visibility awal
        document.addEventListener('DOMContentLoaded', function() {
            const jenjangSelect = document.getElementById('jenjang');
            const jurusanContainer = document.getElementById('jurusan_smk_container');
            if (jenjangSelect.value === 'SMK') {
                jurusanContainer.style.display = 'block';
            }
        });

        // Form submission handler
        document.querySelector('form').addEventListener('submit', async function(e) {
            e.preventDefault();
            const submitButton = this.querySelector('button[type="submit"]');
            const originalText = submitButton.textContent;

            try {
                submitButton.disabled = true;
                submitButton.textContent = 'Menyimpan...';

                // Submit form
                const formData = new FormData(this);
                const response = await fetch(this.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    }
                });

                // Cek jika response adalah JSON
                const contentType = response.headers.get('content-type');
                if (contentType && contentType.includes('application/json')) {
                    const result = await response.json();

                    if (response.ok) {
                        window.location.href = "{{ route('sekolah.index') }}";
                    } else {
                        throw new Error(result.message || 'Terjadi kesalahan saat menyimpan data');
                    }
                } else {
                    // Jika bukan JSON, mungkin redirect langsung
                    if (response.ok) {
                        window.location.href = "{{ route('sekolah.index') }}";
                    } else {
                        throw new Error('Terjadi kesalahan pada server');
                    }
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Terjadi kesalahan: ' + error.message);
            } finally {
                submitButton.disabled = false;
                submitButton.textContent = originalText;
            }
        });

        // Fungsi untuk menambah jurusan baru
        function tambahJurusan() {
            const input = document.getElementById('jurusan_lain');
            const jurusanBaru = input.value.trim();

            if (!jurusanBaru) {
                alert('Silakan masukkan nama jurusan');
                return;
            }

            const container = document.querySelector('#jurusan_smk_container .grid');
            const existingCheckbox = document.querySelector(`input[value="${jurusanBaru}"]`);

            if (existingCheckbox) {
                alert('Jurusan ini sudah ada');
                return;
            }

            // Buat element baru
            const div = document.createElement('div');
            div.className = 'flex items-center';
            div.innerHTML = `
                <input type="checkbox"
                       name="jurusan_smk[]"
                       id="jurusan_${jurusanBaru.toLowerCase().replace(/\s+/g, '_')}"
                       value="${jurusanBaru}"
                       class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                       checked>
                <label for="jurusan_${jurusanBaru.toLowerCase().replace(/\s+/g, '_')}"
                       class="ml-2 text-sm text-gray-700">
                    ${jurusanBaru}
                </label>
            `;

            container.appendChild(div);
            input.value = '';
        }

        // Tambahkan script ini di bagian bawah file
        document.addEventListener('DOMContentLoaded', function() {
            const jenjangSelect = document.getElementById('jenjang');
            const jurusanContainer = document.getElementById('jurusan_smk_container');

            function toggleJurusanContainer() {
                if (jenjangSelect.value === 'SMK') {
                    jurusanContainer.style.display = 'block';
                } else {
                    jurusanContainer.style.display = 'none';
                }
            }

            // Check initial state
            toggleJurusanContainer();

            // Add event listener for changes
            jenjangSelect.addEventListener('change', toggleJurusanContainer);
        });
    </script>
</body>

</html>
