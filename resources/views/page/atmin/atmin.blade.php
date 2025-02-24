<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    @vite('resources/css/app.css')
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body class="bg-[#F4F4F4] w-full">
    <div class="container ">
        <div class="flex w-full">
            <aside class="bg-[#4A90E2] h-screen w-64 p-6 fixed top-0 left-0 z-10 shadow-lg">
                <div>
                    {{-- Logo dan Brand --}}
                    <div class="heading-text mb-8">
                        <h1 class="font-worksans text-3xl text-white font-bold">Edu</h1>
                        <h1 class="font-worksans text-3xl text-white font-bold">Semarang</h1>
                    </div>

                    {{-- Menu Sidebar --}}
                    <div class="menu-side space-y-8">
                        {{-- Menu Admin Session --}}
                        <div>
                            <p class="text-white/60 text-xs font-medium uppercase tracking-wider mb-4">Admin Session</p>
                            <div id="menu-dashboard" onclick="showDashboardContent()"
                                class="flex items-center p-3 rounded-lg hover:bg-white/20 transition-all duration-300 cursor-pointer group">
                                <i
                                    class="bx bx-line-chart text-xl text-white group-hover:scale-110 transition-transform"></i>
                                <span
                                    class="ml-3 font-medium text-white group-hover:translate-x-1 transition-transform">Dashboard</span>
                            </div>
                        </div>
                        {{-- Manajemen Sekolah dan Berita --}}
                        <div>
                            <p class="text-white/60 text-xs font-medium uppercase tracking-wider mb-4">Sekolah 
                            </p>
                            <div class="space-y-2">
                                <div id="menu-sekolah" onclick="showSekolahContent()"
                                    class="flex items-center p-3 rounded-lg hover:bg-white/20 transition-all duration-300 cursor-pointer group">
                                    <i
                                        class="bx bxs-graduation text-xl text-white group-hover:scale-110 transition-transform"></i>
                                    <span
                                        class="ml-3 font-medium text-white group-hover:translate-x-1 transition-transform">Manajemen
                                        Sekolah</span>
                                </div>
                            </div>
                        </div>
                        {{-- Website --}}
                        <div>
                            <p class="text-white/60 text-xs font-medium uppercase tracking-wider mb-4">Website</p>
                            <div class="space-y-2">
                                <a href="{{ route('index') }}">
                                    <div id="menu-website" class="flex items-center p-3 rounded-lg hover:bg-white/20 transition-all duration-300 cursor-pointer group">
                                        <i class="bx bx-globe text-xl text-white group-hover:scale-110 transition-transform"></i>
                                        <span class="ml-3 font-medium text-white group-hover:translate-x-1 transition-transform">Website</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    {{-- Logout Button --}}
                    <div class="absolute bottom-6 left-6 right-6">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="w-full p-3 rounded-lg bg-white/10 hover:bg-white/20 transition-all duration-300 flex items-center justify-center group">
                                <i
                                    class="bx bx-log-out text-xl text-white group-hover:scale-110 transition-transform"></i>
                                <span
                                    class="ml-3 font-medium text-white group-hover:translate-x-1 transition-transform">Logout</span>
                            </button>
                        </form>
                    </div>
                </div>
            </aside>
            <div class="ml-64 bg-transparent w-full h-screen">
                <nav class="bg-white h-16 w-full px-6 sticky top-0 z-50 shadow-md transition-all duration-300">
                    <div class="nav-container h-full max-w-7xl mx-auto flex items-center justify-between">
                        <div class="flex items-center">
                            <h1 class="font-urbant text-xl font-semibold text-gray-800">Dashboard</h1>
                        </div>
                        <div class="flex items-center space-x-6">
                            <div class="text-right">
                                <p class="font-urbant text-base font-semibold text-gray-800 mb-0.5">
                                    {{ Auth::user()?->username ?? 'Guest' }}
                                </p>
                                <p class="text-sm font-urbant text-gray-500 leading-tight">
                                    {{ Auth::user()?->email ?? '-' }}
                                </p>
                            </div>
                            <div class="h-11 w-11 rounded-full overflow-hidden ring-2 ring-blue-500/40 shadow-sm">
                                <img class="w-full h-full object-cover hover:scale-110 transition-transform duration-300"
                                    src="/image/profil-picture.jpeg" alt="Profile Picture">
                            </div>
                        </div>
                    </div>
                </nav>
                {{-- dashboard content --}}
<div id="dashboard-content" class="main-content p-5">
    <div class="w-full h-full">

        {{-- Statistik Utama --}}
        <div class="grid grid-cols-2 gap-6 mb-6">
            <div class="bg-gradient-to-br from-blue-500 to-blue-600 p-6 rounded-xl shadow-lg">
                <div class="flex justify-between items-center text-white">
                    <div>
                        <p class="text-lg font-semibold opacity-90">Total Admin</p>
                        <p class="text-4xl font-bold mt-2">0</p>
                    </div>
                    <div class="bg-white/20 p-4 rounded-lg">
                        <i class='bx bx-shield-quarter text-3xl'></i>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-br from-emerald-500 to-emerald-600 p-6 rounded-xl shadow-lg">
                <div class="flex justify-between items-center text-white">
                    <div>
                        <p class="text-lg font-semibold opacity-90">Total Users</p>
                        <p class="text-4xl font-bold mt-2">0</p>
                    </div>
                    <div class="bg-white/20 p-4 rounded-lg">
                        <i class='bx bx-user text-3xl'></i>
                    </div>
                </div>
            </div>
        </div>

        {{-- Total Sekolah per Jenjang --}}
        <div class="grid grid-cols-5 gap-4 mb-6">
            <div class="bg-blue-50 p-4 rounded-xl">
                <div class="flex items-center justify-between">
                    <span class="text-blue-600 bg-blue-100 p-2 rounded-lg">
                        <i class='bx bxs-graduation text-xl'></i>
                    </span>
                    <span class="text-xs font-medium text-blue-600 bg-blue-100 px-2 py-1 rounded-full">TK</span>
                </div>
                <h4 class="text-2xl font-bold text-gray-700 mt-2">0</h4>
                <p class="text-sm text-gray-600">Total Sekolah TK</p>
            </div>

            <div class="bg-green-50 p-4 rounded-xl">
                <div class="flex items-center justify-between">
                    <span class="text-green-600 bg-green-100 p-2 rounded-lg">
                        <i class='bx bxs-school text-xl'></i>
                    </span>
                    <span class="text-xs font-medium text-green-600 bg-green-100 px-2 py-1 rounded-full">SD</span>
                </div>
                <h4 class="text-2xl font-bold text-gray-700 mt-2">0</h4>
                <p class="text-sm text-gray-600">Total Sekolah SD</p>
            </div>

            <div class="bg-yellow-50 p-4 rounded-xl">
                <div class="flex items-center justify-between">
                    <span class="text-yellow-600 bg-yellow-100 p-2 rounded-lg">
                        <i class='bx bxs-school text-xl'></i>
                    </span>
                    <span class="text-xs font-medium text-yellow-600 bg-yellow-100 px-2 py-1 rounded-full">SMP</span>
                </div>
                <h4 class="text-2xl font-bold text-gray-700 mt-2">0</h4>
                <p class="text-sm text-gray-600">Total Sekolah SMP</p>
            </div>

            <div class="bg-purple-50 p-4 rounded-xl">
                <div class="flex items-center justify-between">
                    <span class="text-purple-600 bg-purple-100 p-2 rounded-lg">
                        <i class='bx bxs-school text-xl'></i>
                    </span>
                    <span class="text-xs font-medium text-purple-600 bg-purple-100 px-2 py-1 rounded-full">SMA</span>
                </div>
                <h4 class="text-2xl font-bold text-gray-700 mt-2">0</h4>
                <p class="text-sm text-gray-600">Total Sekolah SMA</p>
            </div>

            <div class="bg-red-50 p-4 rounded-xl">
                <div class="flex items-center justify-between">
                    <span class="text-red-600 bg-red-100 p-2 rounded-lg">
                        <i class='bx bxs-school text-xl'></i>
                    </span>
                    <span class="text-xs font-medium text-red-600 bg-red-100 px-2 py-1 rounded-full">SMK</span>
                </div>
                <h4 class="text-2xl font-bold text-gray-700 mt-2">0</h4>
                <p class="text-sm text-gray-600">Total Sekolah SMK</p>
            </div>
        </div>

        {{-- Grafik Analisis --}}
        <div class="grid grid-cols-1 gap-6 mb-6">
            <div class="bg-white p-6 rounded-xl shadow-lg">
                <h2 class="text-xl font-bold text-gray-800 mb-6">Distribusi Pengguna</h2>
                <div class="h-64">
                    <canvas id="userChart" class="w-full"></canvas>
                </div>
                <div class="mt-6 pt-6 border-t grid grid-cols-2 gap-4">
                    <div class="text-center">
                        <p class="text-sm text-gray-600">Total Admin</p>
                        <p class="text-2xl font-bold text-blue-600 mt-1">0</p>
                    </div>
                    <div class="text-center">
                        <p class="text-sm text-gray-600">Total User</p>
                        <p class="text-2xl font-bold text-green-600 mt-1">0</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


                {{-- sekolah content --}}
                <div id="sekolah-content" class="main-content p-5 hidden">
                    <div class="bg-white rounded-lg p-5">
                        {{-- Header Section --}}
                        <div class="border-b pb-4">
                            <h1 class="text-2xl font-bold text-gray-800">Manajemen Sekolah</h1>
                            <p class="font-urbant text-gray-600 mt-1">Kelola dan pantau informasi sekolah dalam satu
                                dashboard</p>
                        </div>

                        {{-- Stats Overview --}}
                        <div class="grid grid-cols-4 gap-4 my-6">
                            <div class="bg-blue-50 p-4 rounded-xl">
                                <div class="flex items-center justify-between">
                                    <span class="text-blue-600 bg-blue-100 p-2 rounded-lg">
                                        <i class='bx bxs-graduation text-xl'></i>
                                    </span>
                                    <span
                                        class="text-xs font-medium text-blue-600 bg-blue-100 px-2 py-1 rounded-full">TK</span>
                                </div>
                                <h4 class="text-2xl font-bold text-gray-700 mt-2">24</h4>
                                <p class="text-sm text-gray-600">Total Sekolah TK</p>
                            </div>

                            <div class="bg-green-50 p-4 rounded-xl">
                                <div class="flex items-center justify-between">
                                    <span class="text-green-600 bg-green-100 p-2 rounded-lg">
                                        <i class='bx bxs-school text-xl'></i>
                                    </span>
                                    <span
                                        class="text-xs font-medium text-green-600 bg-green-100 px-2 py-1 rounded-full">SD</span>
                                </div>
                                <h4 class="text-2xl font-bold text-gray-700 mt-2">36</h4>
                                <p class="text-sm text-gray-600">Total Sekolah SD</p>
                            </div>

                            <div class="bg-yellow-50 p-4 rounded-xl">
                                <div class="flex items-center justify-between">
                                    <span class="text-yellow-600 bg-yellow-100 p-2 rounded-lg">
                                        <i class='bx bxs-school text-xl'></i>
                                    </span>
                                    <span
                                        class="text-xs font-medium text-yellow-600 bg-yellow-100 px-2 py-1 rounded-full">SMP</span>
                                </div>
                                <h4 class="text-2xl font-bold text-gray-700 mt-2">18</h4>
                                <p class="text-sm text-gray-600">Total Sekolah SMP</p>
                            </div>

                            <div class="bg-purple-50 p-4 rounded-xl">
                                <div class="flex items-center justify-between">
                                    <span class="text-purple-600 bg-purple-100 p-2 rounded-lg">
                                        <i class='bx bxs-school text-xl'></i>
                                    </span>
                                    <span
                                        class="text-xs font-medium text-purple-600 bg-purple-100 px-2 py-1 rounded-full">SMA/SMK</span>
                                </div>
                                <h4 class="text-2xl font-bold text-gray-700 mt-2">12</h4>
                                <p class="text-sm text-gray-600">Total Sekolah SMA/SMK</p>
                            </div>
                        </div>

                        {{-- Action Buttons --}}
                        <div class="flex justify-between items-center mb-6">
                            <div class="flex gap-2">
                                <a href="{{ route('sekolah.create') }}">
                                    <button
                                        class="flex items-center gap-2 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-all">
                                        <i class='bx bx-plus'></i>
                                        Tambah Sekolah
                                    </button>
                                </a>
                                <button
                                    class="flex items-center gap-2 bg-gray-100 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-200 transition-all">
                                    <i class='bx bx-filter'></i>
                                    Filter
                                </button>
                            </div>
                            <div class="relative">
                                <input type="text" placeholder="Cari sekolah..."
                                    class="pl-10 pr-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <i class='bx bx-search absolute left-3 top-2.5 text-gray-400'></i>
                            </div>
                        </div>

                        {{-- School Cards Grid --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            {{-- School Card --}}
                            @forelse ($sekolah as $item)
                                <div class="bg-white rounded-xl border hover:shadow-lg transition-all duration-300">
                                    <div class="relative">
                                        <img class="w-full h-48 object-cover rounded-t-xl"
                                            src="{{ asset('storage/' . $item->foto_sekolah) }}" alt="Foto Sekolah">
                                        <div class="absolute top-3 right-3 flex gap-2">
                                            <span
                                                class="bg-blue-500 text-white px-3 py-1 rounded-full text-sm font-medium">{{ $item->jenjang }}</span>
                                            <span
                                                class="bg-green-500 text-white px-3 py-1 rounded-full text-sm font-medium">Aktif</span>
                                        </div>
                                    </div>
                                    <div class="p-4">
                                        <h5 class="font-semibold text-lg text-gray-800 mb-2">{{ $item->nama_sekolah }}
                                        </h5>
                                        <div class="space-y-2 text-gray-600">
                                            <div class="flex items-center gap-2">
                                                <i class='bx bx-map-pin'></i>
                                                <p class="text-sm w-auto line-clamp-2">{{ $item->alamat }}</p>
                                            </div>
                                            <div class="flex items-center gap-2">
                                                <i class='bx bx-phone'></i>
                                                <p class="text-sm">{{ $item->telepon }}</p>
                                            </div>
                                            <div class="flex items-center gap-2">
                                                <i class='bx bx-user'></i>
                                                <p class="text-sm">{{ $item->jumlah_siswa }} Siswa</p>
                                            </div>
                                        </div>
                                        <div class="flex justify-between items-center mt-4 pt-4 border-t">
                                            <div class="flex gap-2">
                                                <form action="{{ route('sekolah.edit', $item->id) }}">
                                                    <button
                                                        class="p-2 text-yellow-600 hover:bg-yellow-50 rounded-lg transition-all">
                                                        <i class='bx bx-edit-alt'></i>
                                                    </button>
                                                </form>
                                                <form action="{{ route('sekolah.destroy', $item->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button
                                                        class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition-all">
                                                        <i class='bx bx-trash'></i>
                                                    </button>
                                                </form>
                                            </div>
                                            <a href="{{ route('sekolah.show', $item->id) }}">
                                                <button
                                                    class="flex items-center gap-2 text-blue-600 hover:bg-blue-50 px-4 py-2 rounded-lg transition-all">
                                                    <span>Detail</span>
                                                    <i class='bx bx-right-arrow-alt'></i>
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="flex justify-center items-center h-full">
                                    <p class="text-gray-600">Tidak ada data sekolah</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>

                <script>
                    function showDashboardContent() {
                        // Tampilkan konten dashboard
                        document.getElementById('dashboard-content').classList.remove('hidden');
                        // Sembunyikan konten sekolah
                        document.getElementById('sekolah-content').classList.add('hidden');

                        // Hapus background aktif dari menu sekolah
                        document.getElementById('menu-sekolah').classList.remove('bg-white/20');
                        // Tambah background aktif pada menu dashboard
                        document.getElementById('menu-dashboard').classList.add('bg-white/20');

                        // Update judul nav
                        document.querySelector('.nav-container h1').textContent = 'Dashboard';
                    }

                    function showSekolahContent() {
                        // Sembunyikan konten dashboard
                        document.getElementById('dashboard-content').classList.add('hidden');
                        // Tampilkan konten sekolah
                        document.getElementById('sekolah-content').classList.remove('hidden');

                        // Hapus background aktif dari menu dashboard
                        document.getElementById('menu-dashboard').classList.remove('bg-white/20');
                        // Tambah background aktif pada menu sekolah
                        document.getElementById('menu-sekolah').classList.add('bg-white/20');

                        // Update judul nav
                        document.querySelector('.nav-container h1').textContent = 'Manajemen Sekolah';
                    }

                    // Tambahkan event listener saat halaman dimuat
                    document.addEventListener('DOMContentLoaded', function() {
                        // Secara default tampilkan dashboard
                        showDashboardContent();

                        // Cek URL untuk menentukan konten mana yang ditampilkan
                        if (window.location.hash === '#sekolah') {
                            showSekolahContent();
                        }
                    });
                </script>
            </div>
        </div>
    </div>

    <script>
        // Chart untuk distribusi user
        const userDistributionCtx = document.getElementById('userChart');
        if (userDistributionCtx) {
            const userData = {
                labels: ['Admin', 'User Biasa'],
                datasets: [{
                    data: [{{ $adminCount ?? 0 }}, {{ $userCount ?? 0 }}],
                    backgroundColor: [
                        '#4A90E2', // Warna untuk Admin
                        '#82C3EC' // Warna untuk User Biasa
                    ],
                    borderWidth: 1,
                    borderColor: '#ffffff'
                }]
            };

            new Chart(userDistributionCtx, {
                type: 'pie',
                data: userData,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                padding: 20,
                                font: {
                                    size: 12
                                }
                            }
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    const label = context.label || '';
                                    const value = context.raw || 0;
                                    const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                    const percentage = Math.round((value / total) * 100);
                                    return `${label}: ${value} (${percentage}%)`;
                                }
                            }
                        }
                    }
                }
            });
        }
    </script>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <script>
        $(document).ready(function() {
            $('#filterButton').click(function() {
                let search = $('#search').val();
                let jenjang = $('#jenjang').val();
                let kecamatan_id = $('#kecamatan').val();

                $.ajax({
                    url: '{{ route('sekolah.filter') }}',
                    method: 'GET',
                    data: {
                        search: search,
                        jenjang: jenjang,
                        kecamatan_id: kecamatan_id
                    },
                    success: function(data) {
                        $('#sekolahTable').html(data);
                    },
                    error: function(xhr) {
                        console.error(xhr);
                    }
                });
            });

            // Optional: Trigger filter on enter key
            $('#search').on('keypress', function(e) {
                if (e.which === 13) {
                    $('#filterButton').click();
                }
            });
        });
    </script>
</body>

</html>
