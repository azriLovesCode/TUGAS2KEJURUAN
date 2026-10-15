<?php 
 
namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BarangController extends Controller
{
    public function dashboard()
    {
        $totalAset = Barang::sum('stok');
        $tersedia = Barang::where('status', 'Tersedia')->sum('stok');
        $dipinjamMaintenance = Barang::whereIn('status', ['Dipinjam', 'Maintenance'])->sum('stok');

        return view('barang.dashboard', compact('totalAset', 'tersedia', 'dipinjamMaintenance'));
    }

    public function index()
    {
        $barangs = Barang::with('kategori')->get();
        return view('barang.index', compact('barangs'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        return view('barang.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required|string|max:20|unique:barangs,kode_barang',
            'nama_barang' => 'required|string|min:3|max:150',
            'kategori_id' => 'required|exists:kategoris,id',
            'stok' => 'required|integer|min:0',
            'kondisi' => 'required|in:Baik,Rusak Ringan,Rusak Berat',
            'status' => 'required|in:Tersedia,Dipinjam,Maintenance',
        ]);

        Barang::create($request->all());

        return redirect()->route('barang.index')->with('success', 'Data barang berhasil ditambahkan!');
    }

    public function edit(Barang $barang)
    {
        $kategoris = Kategori::all();
        return view('barang.edit', compact('barang', 'kategoris'));
    }

    public function update(Request $request, Barang $barang)
    {
        $request->validate([
            'kode_barang' => ['required', 'string', 'max:20', Rule::unique('barangs')->ignore($barang->id)],
            'nama_barang' => 'required|string|min:3|max:150',
            'kategori_id' => 'required|exists:kategoris,id',
            'stok' => 'required|integer|min:0',
            'kondisi' => 'required|in:Baik,Rusak Ringan,Rusak Berat',
            'status' => 'required|in:Tersedia,Dipinjam,Maintenance',
        ]);

        $barang->update($request->all());

        return redirect()->route('barang.index')->with('success', 'Data barang berhasil diperbarui!');
    }

    public function destroy(Barang $barang)
    {
        $barang->delete();
        return redirect()->route('barang.index')->with('success', 'Data barang berhasil dihapus!');
    }
}