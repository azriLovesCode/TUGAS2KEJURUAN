<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard SIMLAB-RPL</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-2xl font-bold mb-2">Dashboard Inventaris Lab RPL</h1>
        <p class="text-gray-600 mb-4">Sistem Manajemen Aset & Peralatan Praktik</p>
        <a href="{{ route('barang.index') }}" class="bg-blue-600 text-white px-4 py-2 rounded inline-block mb-6">Kelola Data Barang &rarr;</a>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-white p-4 rounded shadow">
                <h3 class="text-gray-500">Total Aset</h3>
                <p class="text-3xl font-bold text-gray-800">{{ $totalAset }}</p>
            </div>
            <div class="bg-white p-4 rounded shadow">
                <h3 class="text-gray-500">Unit Tersedia</h3>
                <p class="text-3xl font-bold text-emerald-600">{{ $tersedia }}</p>
            </div>
            <div class="bg-white p-4 rounded shadow">
                <h3 class="text-gray-500">Dipinjam / Maintenance</h3>
                <p class="text-3xl font-bold text-rose-600">{{ $dipinjamMaintenance }}</p>
            </div>
        </div>
    </div>
</body>
</html>