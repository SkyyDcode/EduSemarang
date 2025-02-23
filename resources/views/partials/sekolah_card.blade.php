<div class="card bg-white border border-gray-200 rounded-lg p-4">
    <img class="w-full h-48 object-cover rounded-lg" src="{{ asset('storage/' . $item->foto_sekolah) }}" alt="">
    <div class="mt-4">
        <h3 class="text-lg font-semibold">{{ $item->nama_sekolah }}</h3>
        <p class="text-sm text-gray-700 mt-2 line-clamp-2">{{ $item->alamat }}</p>
        <a href="{{ route('sekolah.show', $item->id) }}" class="flex items-center mt-3 text-blue-800 text-sm font-semibold">
            <span>Lihat selengkapnya</span>
            <i class="bx bx-chevron-right ml-1"></i>
        </a>
    </div>
</div> 