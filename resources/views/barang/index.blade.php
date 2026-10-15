<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Barang SIMLAB-RPL</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-6xl mx-auto bg-white p-6 rounded shadow">
        <div class="flex justify-between items-center mb-4">
            <div>
                <h1 class="text-xl font-bold">Daftar Inventaris Lab RPL</h1>
                <a href="{{ route('dashboard') }}" class="text-blue-600 text-sm underline">&larr; Kembali ke Dashboard</a>
            </div>
            <a href="{{ route('barang.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded font-semibold">+ Tambah Barang</a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4">{{ session('success') }}</div>
        @endif

        <div class="overflow-x-auto">
            <table class="w-full border-collapse border border-gray-200 text-left text-sm">
                <thead>
                    <tr class="bg-gray-50">
                        <th class="border p-2">Kode</th>
                        <th class="border p-2">Nama Barang</th>
                        <th class="border p-2">Kategori</th>
                        <th class="border p-2">Stok</th>
                        <th class="border p-2">Kondisi</th>
                        <th class="border p-2">Status</th>
                        <th class="border p-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($barangs as $item)
                    <tr>
                        <td class="border p-2 font-mono">{{ $item->kode_barang }}</td>
                        <td class="border p-2 font-semibold">{{ $item->nama_barang }}</td>
                        <td class="border p-2">{{ $item->kategori->nama_kategori }}</td>
                        <td class="border p-2">{{ $item->stok }}</td>
                        <td class="border p-2">{{ $item->kondisi }}</td>
                        <td class="border p-2">
                            @if($item->status == 'Tersedia')
                                <span class="bg-emerald-100 text-emerald-800 px-2 py-1 rounded text-xs font-bold">Tersedia</span>
                            @elseif($item->status == 'Dipinjam')
                                <span class="bg-rose-100 text-rose-800 px-2 py-1 rounded text-xs font-bold">Dipinjam</span>
                            @else
                                <span class="bg-amber-100 text-amber-800 px-2 py-1 rounded text-xs font-bold">Maintenance</span>
                            @endif
                        </td>
                        <td class="border p-2">
                            <a href="{{ route('barang.edit', $item->id) }}" class="text-blue-600 font-semibold mr-2">Edit</a>
                            <form action="{{ route('barang.destroy', $item->id) }}" method="POST" class="inline">
                                @csrf 
                                @method('DELETE')
                                <button type="submit" class="text-red-600 font-semibold" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center p-4 text-gray-500">Belum ada data barang inventaris.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>