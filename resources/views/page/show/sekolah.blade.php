<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    @vite('resources/css/app.css')
    <title>Detail Sekolah</title>
</head>

<body class="bg-gray-100">
    @if ($sekolah)
        <div class="w-full">
            <header class="relative">
                <div class="relative w-full h-[30em]">
                    <img class="w-full h-full object-cover brightness-50"
                        src="{{ asset('storage/' . $sekolah->foto_sekolah) }}" alt="Foto Sekolah">
                    <div class="absolute top-1/2 left-10 transform -translate-y-1/2 text-white">
                        <h1 class="text-4xl font-bold font-urbant">{{ $sekolah->nama_sekolah }}</h1>
                        <p class="text-lg font-medium">NPSN: {{ $sekolah->npsn }}</p>
                        <p class="text-sm w-96 my-2">{{ $sekolah->alamat }}</p>
                        <a href="#"
                            class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 mt-4 rounded-lg shadow-md">Kunjungi
                            Website</a>
                    </div>
                </div>
            </header>

            <main class="mt-10">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 px-5">
                    <figure class="bg-white p-5 rounded-lg shadow flex items-center gap-4">
                        <i class="bx bxs-phone-call text-4xl text-blue-600"></i>
                        <div>
                            <p class="text-xl font-bold">{{ $sekolah->telepon }}</p>
                            <p class="text-sm text-gray-600">Telepon Sekolah</p>
                        </div>
                    </figure>
                    <figure class="bg-white p-5 rounded-lg shadow flex items-center gap-4">
                        <i class="bx bxs-envelope text-4xl text-blue-600"></i>
                        <div>
                            <p class="text-xl font-bold">{{ $sekolah->email ?? '-' }}</p>
                            <p class="text-sm text-gray-600">Email Sekolah</p>
                        </div>
                    </figure>
                    <figure class="bg-white p-5 rounded-lg shadow flex items-center gap-4">
                        <i class="bx bxs-map text-4xl text-blue-600"></i>
                        <div>
                            <p class="text-xl font-bold">{{ $sekolah->kecamatan->nama_kecamatan ?? '-' }}</p>
                            <p class="text-sm text-gray-600">Lokasi Sekolah</p>
                        </div>
                    </figure>
                </div>

                <div class="mt-10 bg-blue-100 p-6">
                    <h2 class="text-2xl font-bold text-gray-800 text-center mb-6">Informasi Guru & Siswa</h2>
                    <div class="grid grid-cols-2 gap-6">
                        <figure
                            class="bg-white p-6 w-full rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300 flex items-center justify-between">
                            <div class="flex items-center gap-5">
                                <div class="bg-blue-100 p-3 rounded-full">
                                    <i class="bx bxs-user text-4xl text-blue-600"></i>
                                </div>
                                <div>
                                    <p class="text-2xl font-bold text-gray-800">{{ $sekolah->jumlah_guru }}</p>
                                    <p class="text-sm font-medium text-gray-600">Total Guru</p>
                                </div>
                            </div>
                        </figure>

                        <figure
                            class="bg-white p-6 w-full rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300 flex items-center justify-between">
                            <div class="flex items-center gap-5">
                                <div class="bg-blue-100 p-3 rounded-full">
                                    <i class="bx bxs-group text-4xl text-blue-600"></i>
                                </div>
                                <div>
                                    <p class="text-2xl font-bold text-gray-800">{{ $sekolah->jumlah_siswa }}</p>
                                    <p class="text-sm font-medium text-gray-600">Total Siswa</p>
                                </div>
                            </div>
                        </figure>
                    </div>
                </div>

                @if ($sekolah->jenjang === 'SMK' && $sekolah->jurusan_smk)
                    @foreach ($sekolah->jurusan_smk as $jurusan)
                        <div class="mt-10">
                            <h2 class="text-2xl font-bold text-gray-800 text-center mb-6">Program Keahlian</h2>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <figure class="bg-white p-5 rounded-lg shadow-lg border-l-4 border-blue-600">
                                    <h3 class="text-xl font-bold text-gray-800">{{ $jurusan }}</h3>
                                </figure>
                            </div>
                        </div>
                    @endforeach
                @endif

                <div class="mt-10 text-center">
                    <a href="javascript:history.back()"
                        class="inline-block bg-gray-500 hover:bg-gray-600 text-white px-5 py-2 rounded-lg shadow-md">Kembali</a>
                </div>
            </main>
        </div>
    @else
        <div class="flex justify-center items-center h-screen">
            <h1 class="text-2xl font-bold text-gray-700">Sekolah tidak ditemukan</h1>
        </div>
    @endif
</body>

</html>
