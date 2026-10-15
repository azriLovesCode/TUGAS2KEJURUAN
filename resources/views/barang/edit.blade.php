<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Barang</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-xl font-bold mb-4">Edit Data Barang</h1>

        <form action="{{ route('barang.update', $barang->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-1">Kode Barang</label>
                <input type="text" name="kode_barang" value="{{ old('kode_barang', $barang->kode_barang) }}" class="w-full border p-2 rounded">
                @error('kode_barang') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-1">Nama Barang</label>
                <input type="text" name="nama_barang" value="{{ old('nama_barang', $barang->nama_barang) }}" class="w-full border p-2 rounded">
                @error('nama_barang') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-1">Kategori</label>
                <select name="kategori_id" class="w-full border p-2 rounded">
                    @foreach($kategoris as $kat)
                        <option value="{{ $kat->id }}" {{ old('kategori_id', $barang->kategori_id) == $kat->id ? 'selected' : '' }}>{{ $kat->nama_kategori }}</option>
                    @endforeach
                </select>
                @error('kategori_id') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-1">Stok</label>
                <input type="number" name="stok" value="{{ old('stok', $barang->stok) }}" class="w-full border p-2 rounded">
                @error('stok') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-1">Kondisi</label>
                <select name="kondisi" class="w-full border p-2 rounded">
                    <option value="Baik" {{ $barang->kondisi == 'Baik' ? 'selected' : '' }}>Baik</option>
                    <option value="Rusak Ringan" {{ $barang->kondisi == 'Rusak Ringan' ? 'selected' : '' }}>Rusak Ringan</option>
                    <option value="Rusak Berat" {{ $barang->kondisi == 'Rusak Berat' ? 'selected' : '' }}>Rusak Berat</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-1">Status</label>
                <select name="status" class="w-full border p-2 rounded">
                    <option value="Tersedia" {{ $barang->status == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                    <option value="Dipinjam" {{ $barang->status == 'Dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                    <option value="Maintenance" {{ $barang->status == 'Maintenance' ? 'selected' : '' }}>Maintenance</option>
                </select>
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded font-semibold">Perbarui Data</button>
            <a href="{{ route('barang.index') }}" class="ml-2 text-gray-600 underline">Batal</a>
        </form>
    </div>
</body>
</html>