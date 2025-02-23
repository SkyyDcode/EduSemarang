<table class="min-w-full bg-white">
    <thead>
        <tr>
            <th class="py-2">Nama Sekolah</th>
            <th class="py-2">Jenjang</th>
            <th class="py-2">Kecamatan</th>
            <th class="py-2">Kelurahan</th>
            <th class="py-2">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($sekolah as $item)
            <tr>
                <td class="py-2">{{ $item->nama_sekolah }}</td>
                <td class="py-2">{{ $item->jenjang }}</td>
                <td class="py-2">{{ $item->kecamatan->kecamatan }}</td>
                <td class="py-2">{{ $item->kelurahan->kelurahan }}</td>
                <td class="py-2">
                    <a href="{{ route('sekolah.edit', $item->id) }}" class="text-blue-500">Edit</a>
                    <form action="{{ route('sekolah.destroy', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $sekolah->links() }} <!-- Pagination links --> 