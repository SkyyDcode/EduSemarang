<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    @vite('resources/css/app.css')
    <title>Tambah Data Sekolah</title>
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

            @if($errors->any())
                <div class="mb-4 p-4 rounded-lg bg-red-100 border border-red-400 text-red-700 relative" role="alert">
                    <strong class="font-bold">Terjadi kesalahan:</strong>
                    <ul class="mt-2 list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button class="absolute top-0 right-0 px-4 py-3" onclick="this.parentElement.style.display='none'">
                        <span class="text-red-700">&times;</span>
                    </button>
                </div>
            @endif

            <div class="bg-white rounded-xl shadow-lg">
                <!-- Header -->
                <div class="bg-blue-600 px-6 py-4">
                    <h1 class="text-2xl text-white font-bold font-worksans">Tambah Data Sekolah</h1>
                    <p class="text-blue-100 font-medium font-worksans mt-1">Silahkan lengkapi data sekolah dengan benar</p>
                </div>

                <!-- Form -->
                <form class="p-6 space-y-6" method="POST" action="{{ route('sekolah.store') }}" enctype="multipart/form-data">
                    @csrf

                    <!-- Informasi Dasar -->
                    <div class="space-y-4">
                        <h2 class="text-lg font-semibold text-gray-800">Informasi Dasar</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1" for="nama_sekolah">Nama Sekolah</label>
                                <input class="w-full px-4 py-2 border @error('nama_sekolah') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    type="text" name="nama_sekolah" id="nama_sekolah" value="{{ old('nama_sekolah') }}" required>
                                @error('nama_sekolah')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1" for="npsn">NPSN</label>
                                <input class="w-full px-4 py-2 border @error('npsn') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    type="text" name="npsn" id="npsn" value="{{ old('npsn') }}" required>
                                @error('npsn')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1" for="jenjang">Jenjang Sekolah</label>
                                <select class="w-full px-4 py-2 border @error('jenjang') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    name="jenjang"
                                    id="jenjang"
                                    required>
                                    <option value="">Pilih Jenjang</option>
                                    <option value="PAUD" {{ old('jenjang') == 'PAUD' ? 'selected' : '' }}>PAUD</option>
                                    <option value="TK" {{ old('jenjang') == 'TK' ? 'selected' : '' }}>TK</option>
                                    <option value="SD" {{ old('jenjang') == 'SD' ? 'selected' : '' }}>SD/MI</option>
                                    <option value="SMP" {{ old('jenjang') == 'SMP' ? 'selected' : '' }}>SMP/MTs</option>
                                    <option value="SMA" {{ old('jenjang') == 'SMA' ? 'selected' : '' }}>SMA/MA</option>
                                    <option value="SMK" {{ old('jenjang') == 'SMK' ? 'selected' : '' }}>SMK</option>
                                </select>
                                @error('jenjang')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Lokasi -->
                    <div class="space-y-4">
                        <h2 class="text-lg font-semibold text-gray-800">Lokasi</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-1" for="alamat">Alamat Lengkap</label>
                                <textarea class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    name="alamat" id="alamat" rows="3" required></textarea>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1" for="kecamatan">Kecamatan</label>
                                <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    name="kecamatan_id" id="kecamatan" required>
                                    <option value="">Pilih Kecamatan</option>
                                    @foreach ($kecs as $kecamatan)
                                        <option value="{{ $kecamatan->id }}">
                                            {{ $kecamatan->kecamatan }}
                                        </option>
                                    @endforeach
                                </select>
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
                                    type="number" name="kode_pos" id="kode_pos" required>
                            </div>
                        </div>
                    </div>

                    <!-- Kontak -->
                    <div class="space-y-4">
                        <h2 class="text-lg font-semibold text-gray-800">Informasi Kontak</h2>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1" for="telepon">Telepon</label>
                                <input class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    type="tel" name="telepon" id="telepon" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1" for="email">Email</label>
                                <input class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    type="email" name="email" id="email" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1" for="website">Website</label>
                                <input class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    type="url" name="website" id="website">
                            </div>
                        </div>
                    </div>

                    <!-- Informasi Tambahan -->
                    <div class="space-y-4">
                        <h2 class="text-lg font-semibold text-gray-800">Informasi Tambahan</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1" for="kepala_sekolah">Kepala Sekolah</label>
                                <input class="w-full px-4 py-2 border @error('kepala_sekolah') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    type="text"
                                    name="kepala_sekolah"
                                    id="kepala_sekolah"
                                    value="{{ old('kepala_sekolah') }}"
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
                                    value="{{ old('jumlah_siswa', 0) }}"
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
                                    value="{{ old('jumlah_guru', 0) }}"
                                    min="0"
                                    required>
                                @error('jumlah_guru')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1" for="foto_sekolah">Foto Sekolah</label>
                                <input class="w-full px-4 py-2 border @error('foto_sekolah') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    type="file"
                                    name="foto_sekolah"
                                    id="foto_sekolah"
                                    accept="image/*"
                                    required>
                                @error('foto_sekolah')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                                <p class="mt-1 text-sm text-gray-500">Format: JPG, JPEG, PNG (Max. 2MB)</p>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1" for="foto_kepala_sekolah">Foto Kepala Sekolah</label>
                                <input class="w-full px-4 py-2 border @error('foto_kepala_sekolah') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    type="file"
                                    name="foto_kepala_sekolah"
                                    id="foto_kepala_sekolah"
                                    accept="image/*">
                                @error('foto_kepala_sekolah')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                                <p class="mt-1 text-sm text-gray-500">Format: JPG, JPEG, PNG (Max. 2MB)</p>
                            </div>
                        </div>
                        <div class="jurusan_smk_container">
                            <label class="block text-sm font-medium text-gray-700 mb-2" for="jurusan_smk">Jurusan SMK</label>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                @foreach($jurusanList as $jurusan)
                                <div class="flex items-center">
                                    <input type="checkbox" name="jurusan_smk[]" value="{{ $jurusan }}" id="jurusan_{{ Str::slug($jurusan) }}" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                    <label for="jurusan_{{ Str::slug($jurusan) }}" class="ml-2 text-sm text-gray-700">{{ $jurusan }}</label>
                                </div>
                                @endforeach
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
                            Simpan Data
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Optional: Script untuk auto-hide notifikasi -->
    <script>
        // Auto hide notifications after 5 seconds
        setTimeout(function() {
            const notifications = document.querySelectorAll('[role="alert"]');
            notifications.forEach(function(notification) {
                notification.style.display = 'none';
            });
        }, 5000);

        // Script untuk mengambil data kelurahan
        const kecamatanSelect = document.getElementById('kecamatan');
        const kelurahanSelect = document.getElementById('kelurahan');

        // Fungsi untuk memuat data kelurahan
        async function loadKelurahan(kecamatanId) {
            if (!kecamatanId) {
                kelurahanSelect.innerHTML = '<option value="">Pilih Kelurahan</option>';
                return;
            }

            try {
                // Tampilkan loading state
                kelurahanSelect.disabled = true;
                kelurahanSelect.innerHTML = '<option value="">Loading...</option>';

                // Tambahkan CSRF token ke header
                const response = await fetch(`/get-kelurahan/${kecamatanId}`, {
                    method: 'GET',
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });

                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }

                const result = await response.json();
                console.log('Response:', result); // Untuk debugging

                // Reset dan isi dengan data baru
                kelurahanSelect.innerHTML = '<option value="">Pilih Kelurahan</option>';

                if (result.status === 'success' && result.data && result.data.length > 0) {
                    result.data.forEach(kelurahan => {
                        const option = document.createElement('option');
                        option.value = kelurahan.id; // Pastikan ini sesuai dengan response
                        option.textContent = kelurahan.nama_kelurahan;
                        kelurahanSelect.appendChild(option);
                    });
                } else {
                    kelurahanSelect.innerHTML = '<option value="">Tidak ada kelurahan tersedia</option>';
                }
            } catch (error) {
                console.error('Error:', error);
                kelurahanSelect.innerHTML = '<option value="">Error: Gagal memuat data kelurahan</option>';
            } finally {
                kelurahanSelect.disabled = false;
            }
        }

        // Event listener untuk perubahan kecamatan
        kecamatanSelect.addEventListener('change', function() {
            console.log('Kecamatan changed:', this.value); // Untuk debugging
            loadKelurahan(this.value);
        });

        // Form submission handler
        document.querySelector('form').addEventListener('submit', function(e) {
            const submitButton = this.querySelector('button[type="submit"]');
            const originalText = submitButton.textContent;

            try {
                // Disable submit button
                submitButton.disabled = true;
                submitButton.textContent = 'Menyimpan...';

                // Form akan di-submit secara normal
                return true;
            } catch (error) {
                console.error('Error:', error);
                submitButton.disabled = false;
                submitButton.textContent = originalText;
                return false;
            }
        });

        // Inisialisasi awal
        if (kecamatanSelect.value) {
            loadKelurahan(kecamatanSelect.value);
        }
        // Fungsi untuk toggle container jurusan
    document.addEventListener('DOMContentLoaded', function() {
        const jenjangSelect = document.getElementById('jenjang');
        const jurusanContainer = document.getElementById('jurusan_smk_container');

        function toggleJurusanContainer() {
            console.log('Jenjang value:', jenjangSelect.value); // Debug
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
