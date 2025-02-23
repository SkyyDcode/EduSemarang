<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>EduSemarang</title>
    @vite('resources/css/app.css')
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f9fafb;
        }

        .nav-container {
            background-color: #ffffff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .header-container {
            background: linear-gradient(to right, #4DA8DA, #76C893);
            color: white;
        }

        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .article-title h3 {
            transition: color 0.3s ease;
        }

        .article-title:hover h3 {
            color: #3b82f6;
        }

        .footer {
            background-color: #ffffff;
            box-shadow: 0 -2px 4px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <div class="container mx-auto">
        <!-- Navbar -->
        <nav class="nav-container py-4">
            <div class="flex justify-between items-center px-6">
                <div>
                    <h1 class="text-2xl font-semibold text-slate-800"><span class="text-blue-500">Edu</span>Semarang</h1>
                </div>
                @auth
                    <div class="flex items-center gap-4">
                        <div class="relative">
                            <button type="button" onclick="toggleDropdown('profile')" class="flex items-center gap-1 p-2 rounded-lg hover:bg-gray-100 transition-all duration-300">
                                <div class="text-right">
                                    <h4 class="text-sm font-medium">{{ Auth::user()->username }}</h4>
                                </div>
                                <i id="profile-icon" class="bx bx-chevron-down text-xl text-gray-600 transition-transform duration-300"></i>
                            </button>
                            <div id="profile-dropdown" class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 transition-all duration-300 ease-in-out transform origin-top hidden opacity-0 scale-95">
                                <a href="/profile" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-t-lg transition-colors duration-200">
                                    <i class="bx bx-user mr-2"></i>Profile
                                </a>
                                <a href="/settings" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-colors duration-200">
                                    <i class="bx bx-cog mr-2"></i>Settings
                                </a>
                                @if (Auth::user()->level === 'admin')
                                    <a href="/admin" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-colors duration-200">
                                        <i class="bx bx-grid-alt mr-2"></i>Dashboard
                                    </a>
                                @endif
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50 rounded-b-lg transition-colors duration-200">
                                        <i class="bx bx-log-out mr-2"></i>Keluar
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="inline-flex items-center py-2 px-5 bg-blue-500 hover:bg-blue-700 hover:scale-110 transition-all duration-300 text-white font-bold rounded-full">
                        <span class="font-medium">Login</span>
                        <i class="bx bx-log-in ml-2"></i>
                    </a>
                @endauth
            </div>
        </nav>

        <!-- Header -->
        <header class="header-container p-6">
            <div class="rounded-2xl p-8">
                <div class="flex justify-between items-center">
                    <div>
                        <h1 class="text-4xl font-semibold">EduSemarang</h1>
                        <p class="text-lg mt-2">Akurat dan terpercaya</p>
                        <p class="mt-4 max-w-md">Jelajahi website EduSemarang sebagai pilihan informasi tentang sekolah di kota Semarang.</p>
                        <button class="mt-6 bg-[#FFA726] py-2 px-7 text-white rounded-full">Mulai Cari</button>
                    </div>
                    <div>
                        <img class="w-64 h-64 object-cover rounded-xl" src="/image/sd.jpeg" alt="">
                    </div>
                </div>
            </div>
        </header>

        <!-- Statistics Section -->
        <section class="mt-10 px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white border border-gray-200 rounded-lg p-4">
                    <div class="flex items-center">
                        <div class="bg-sky-200 p-2 rounded-md">
                            <i class="bx bx-school text-blue-700 text-2xl"></i>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-xl font-semibold">699</h3>
                            <p class="text-gray-600">TK di Semarang</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white border border-gray-200 rounded-lg p-4">
                    <div class="flex items-center">
                        <div class="bg-sky-200 p-2 rounded-md">
                            <i class="bx bx-book text-blue-700 text-2xl"></i>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-xl font-semibold">509</h3>
                            <p class="text-gray-600">SD di Semarang</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white border border-gray-200 rounded-lg p-4">
                    <div class="flex items-center">
                        <div class="bg-sky-200 p-2 rounded-md">
                            <i class="bx bx-library text-blue-700 text-2xl"></i>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-xl font-semibold">191</h3>
                            <p class="text-gray-600">SMP di Semarang</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white border border-gray-200 rounded-lg p-4">
                    <div class="flex items-center">
                        <div class="bg-sky-200 p-2 rounded-md">
                            <i class="bx bx-graduation text-blue-700 text-2xl"></i>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-xl font-semibold">98</h3>
                            <p class="text-gray-600">SMA/SMK di Semarang</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main Content -->
        <main class="my-11 px-6">
            <div class="bg-white p-6 rounded-lg shadow-sm">
                <div class="search-bar">
                    <input type="text" class="w-full py-2 px-4 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Cari sekolah">
                </div>
                <div class="input-wrap my-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <!-- Input Kecamatan -->
                        <div class="relative">
                            <input id="kecamatan" type="text" placeholder="-- Pilih Kecamatan --" class="w-full border border-gray-300 rounded-lg shadow-sm py-2.5 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500" onclick="toggleDropdown('kecamatan')" readonly />
                            <i id="kecamatan-icon" class="bx bx-chevron-down absolute top-1/2 -translate-y-1/2 right-4 text-gray-500 text-xl transition-transform duration-300"></i>
                            <div id="kecamatan-dropdown" class="absolute z-10 w-full bg-white border border-gray-300 rounded-lg shadow-lg mt-1 hidden opacity-0 transform scale-95 transition-all duration-300">
                                <input type="text" placeholder="Cari Kecamatan..." class="w-full border-b border-gray-300 py-2.5 px-4 focus:outline-none focus:ring-1 focus:ring-blue-500 rounded-t-lg" oninput="filterDropdown('kecamatan')" />
                                <ul class="max-h-48 overflow-y-auto" id="kecamatan-list">
                                    @foreach($kecamatans as $kecamatan)
                                        <li class="px-4 py-2.5 hover:bg-gray-100 cursor-pointer transition-colors" onclick="selectOption('kecamatan', '{{ $kecamatan->kecamatan }}', {{ $kecamatan->id }})">{{ $kecamatan->kecamatan }}</li>
                                    @endforeach
                                    <li class="px-4 py-2.5 bg-red-50 text-red-600 font-medium hover:bg-red-100 cursor-pointer transition-colors" onclick="clearOption('kecamatan')">Batalkan Pilihan</li>
                                </ul>
                            </div>
                        </div>

                        <!-- Input Kelurahan -->
                        <div class="relative">
                            <input id="kelurahan" type="text" placeholder="-- Pilih Kelurahan --" class="w-full border border-gray-300 rounded-lg shadow-sm py-2.5 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500" onclick="toggleDropdown('kelurahan')" readonly />
                            <i id="kelurahan-icon" class="bx bx-chevron-down absolute top-1/2 -translate-y-1/2 right-4 text-gray-500 text-xl transition-transform duration-300"></i>
                            <div id="kelurahan-dropdown" class="absolute z-10 w-full bg-white border border-gray-300 rounded-lg shadow-lg mt-1 hidden opacity-0 transform scale-95 transition-all duration-300">
                                <ul class="max-h-48 overflow-y-auto" id="kelurahan-list">
                                    <li class="px-4 py-2.5 text-gray-500">Pilih kecamatan terlebih dahulu</li>
                                </ul>
                            </div>
                        </div>

                        <!-- Input Jenjang Pendidikan -->
                        <div class="relative">
                            <input id="jenjang" type="text" placeholder="-- Pilih Jenjang Pendidikan --" class="w-full border border-gray-300 rounded-lg shadow-sm py-2.5 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500" onclick="toggleDropdown('jenjang')" readonly />
                            <i id="jenjang-icon" class="bx bx-chevron-down absolute top-1/2 -translate-y-1/2 right-4 text-gray-500 text-xl transition-transform duration-300"></i>
                            <div id="jenjang-dropdown" class="absolute z-10 w-full bg-white border border-gray-300 rounded-lg shadow-lg mt-1 hidden opacity-0 transform scale-95 transition-all duration-300">
                                <ul class="max-h-48 overflow-y-auto" id="jenjang-list">
                                    <li class="px-4 py-2.5 hover:bg-gray-100 cursor-pointer transition-colors" onclick="selectOption('jenjang', 'SD')">SD</li>
                                    <li class="px-4 py-2.5 hover:bg-gray-100 cursor-pointer transition-colors" onclick="selectOption('jenjang', 'SMP')">SMP</li>
                                    <li class="px-4 py-2.5 hover:bg-gray-100 cursor-pointer transition-colors" onclick="selectOption('jenjang', 'SMA')">SMA</li>
                                    <li class="px-4 py-2.5 bg-red-50 text-red-600 font-medium hover:bg-red-100 cursor-pointer transition-colors" onclick="clearOption('jenjang')">Batalkan Pilihan</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="mt-6">
                        <button class="bg-blue-500 hover:bg-blue-600 text-white py-2.5 px-6 rounded-full flex items-center transition-colors">
                            <span class="text-base">Cari sekarang</span>
                            <i class="bx bx-search-alt-2 text-xl ml-2"></i>
                        </button>
                    </div>
                </div>

                <!-- Result Content -->
                <div class="card-content mt-8">
                    <h1 class="text-xl font-semibold mb-4">Hasil sekolah yang dicari</h1>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div class="card bg-white border border-gray-200 rounded-lg p-4">
                            <img class="w-full h-48 object-cover rounded-lg" src="/image/sma8.jpeg" alt="">
                            <div class="mt-4">
                                <h3 class="text-lg font-semibold">SMAN 8 Semarang</h3>
                                <p class="text-sm text-gray-700 mt-2 line-clamp-2">Jalan Raya Tugu, Tambakaji, Kec. Ngaliyan, Kota Semarang, Jawa Tengah 50185</p>
                                <a href="#" class="flex items-center mt-3 text-blue-800 text-sm font-semibold">
                                    <span>Lihat selengkapnya</span>
                                    <i class="bx bx-chevron-right ml-1"></i>
                                </a>
                            </div>
                        </div>
                        <!-- Repeat the card structure for other schools -->
                    </div>
                </div>

                <!-- Pagination -->
                <div class="flex items-center justify-between border-t border-gray-200 py-3 mt-8">
                    <div class="flex-1 flex justify-between sm:hidden">
                        <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">Previous</a>
                        <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">Next</a>
                    </div>
                    <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                        <div>
                            <p class="text-sm text-gray-700">
                                Showing <span class="font-medium">1</span> to <span class="font-medium">10</span> of <span class="font-medium">97</span> results
                            </p>
                        </div>
                        <div>
                            <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                                <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                    <span class="sr-only">Previous</span>
                                    <i class="bx bx-chevron-left"></i>
                                </a>
                                <a href="#" aria-current="page" class="z-10 bg-blue-50 border-blue-500 text-blue-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium">1</a>
                                <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">2</a>
                                <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">3</a>
                                <span class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700">...</span>
                                <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">8</a>
                                <a href="#" class="relative inline-flex items-center px-4 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                    <span class="sr-only">Next</span>
                                    <i class="bx bx-chevron-right"></i>
                                </a>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="footer py-8">
            <div class="text-center">
                <h1 class="text-2xl font-semibold text-slate-800"><span class="text-sky-500">Edu</span>Semarang</h1>
                <p class="text-gray-600 mt-2 max-w-md mx-auto">Jelajahi sekolah favorit mu dan dapatkan info seputar sekolah dari website</p>
                <div class="flex items-center justify-center border-t border-sky-600 py-2 mt-4">
                    <i class="bx bx-copyright text-sm text-slate-700"></i>
                    <h3 class="ml-1 text-sm text-slate-700">2024 EduSemarang, All Rights Reserved</h3>
                </div>
            </div>
        </footer>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        const dropdownStates = {};

        function toggleDropdown(id) {
            closeAllDropdowns();
            const dropdown = document.getElementById(`${id}-dropdown`);
            const icon = document.getElementById(`${id}-icon`);

            const isVisible = dropdownStates[id];
            dropdownStates[id] = !isVisible;

            if (!isVisible) {
                dropdown.classList.remove("hidden", "opacity-0", "scale-95");
                dropdown.classList.add("opacity-100", "scale-100");
                icon.classList.add("rotate-180");
            } else {
                dropdown.classList.add("opacity-0", "scale-95");
                dropdown.classList.remove("opacity-100", "scale-100");
                icon.classList.remove("rotate-180");
            }
        }

        function closeAllDropdowns() {
            const dropdowns = document.querySelectorAll('[id$="-dropdown"]');
            const icons = document.querySelectorAll('[id$="-icon"]');

            dropdowns.forEach(dropdown => {
                dropdown.classList.add("hidden", "opacity-0", "scale-95");
                dropdown.classList.remove("opacity-100", "scale-100");
            });

            icons.forEach(icon => {
                icon.classList.remove("rotate-180");
            });

            Object.keys(dropdownStates).forEach(key => {
                dropdownStates[key] = false;
            });
        }

        function selectOption(id, value, dataId = null) {
            document.getElementById(id).value = value;
            
            if (id === 'kecamatan' && dataId) {
                // Ambil data kelurahan berdasarkan kecamatan yang dipilih
                $.ajax({
                    url: '/get-kelurahan/' + dataId,
                    type: 'GET',
                    success: function(response) {
                        let kelurahans = response;
                        let kelurahanList = document.getElementById('kelurahan-list');
                        kelurahanList.innerHTML = '';
                        
                        kelurahans.forEach(function(kelurahan) {
                            kelurahanList.innerHTML += `
                                <li class="px-4 py-2.5 hover:bg-gray-100 cursor-pointer transition-colors" 
                                    onclick="selectOption('kelurahan', '${kelurahan.kelurahan}')">${kelurahan.kelurahan}</li>
                            `;
                        });
                        
                        kelurahanList.innerHTML += `
                            <li class="px-4 py-2.5 bg-red-50 text-red-600 font-medium hover:bg-red-100 cursor-pointer transition-colors" 
                                onclick="clearOption('kelurahan')">Batalkan Pilihan</li>
                        `;
                        
                        // Reset input kelurahan
                        document.getElementById('kelurahan').value = '';
                    },
                    error: function(xhr) {
                        console.error('Error:', xhr);
                    }
                });
            }
            
            closeAllDropdowns();
        }

        function filterDropdown(id) {
            const input = document.getElementById(`${id}-dropdown`).querySelector("input");
            const filter = input ? input.value.toLowerCase() : "";
            const listItems = document.getElementById(`${id}-list`).children;

            Array.from(listItems).forEach(item => {
                item.style.display = item.innerText.toLowerCase().includes(filter) ? "block" : "none";
            });
        }

        function clearOption(id) {
            document.getElementById(id).value = "";
            closeAllDropdowns();
        }

        document.addEventListener("click", (event) => {
            if (!event.target.closest(".relative")) {
                closeAllDropdowns();
            }
        });

        $(document).ready(function() {
            // Handler untuk tombol cari
            $('.search-bar input').keyup(function(e) {
                if (e.which === 13) {
                    filterSekolah();
                }
            });

            $('button:contains("Cari sekarang")').click(function() {
                filterSekolah();
            });

            function filterSekolah() {
                let search = $('.search-bar input').val();
                let kecamatan = $('#kecamatan').val();
                let kelurahan = $('#kelurahan').val();
                let jenjang = $('#jenjang').val();

                $.ajax({
                    url: '/filter-sekolah',
                    type: 'GET',
                    data: {
                        search: search,
                        kecamatan: kecamatan,
                        kelurahan: kelurahan,
                        jenjang: jenjang
                    },
                    success: function(response) {
                        $('.card-content .grid').html(response);
                    },
                    error: function(xhr) {
                        console.error('Error:', xhr);
                    }
                });
            }
        });
    </script>
</body>

</html>
