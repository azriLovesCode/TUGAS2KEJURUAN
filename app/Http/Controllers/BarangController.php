<?php 
 
namespace App\Http\Controllers; 
 
use Illuminate\Http\Request; 
 
class BarangController extends Controller 
{ 
    public function index() 
    { 
        $daftarBarang = [ 
            ['nama' => 'Laptop Lab RPL', 'kategori' => 'Elektronik', 'status' => 'Tersedia', 'Disumbangkan oleh' => 'Azri'],
            ['nama' => 'Topi', 'kategori' => 'Aksesoris', 'status' => 'Dipinjam', 'Disumbangkan oleh' => 'Wirangga'],
            ['nama' => 'Charger Laptop', 'kategori' => 'Elektronik', 'status' => 'Tersedia', 'Disumbangkan oleh' => 'Dewo'],
            ['nama' => 'Tumbler', 'kategori' => 'Peralatan', 'status' => 'Tersedia', 'Disumbangkan oleh' => 'Putra'] 
        ]; 

        return view('daftar_barang', compact('daftarBarang'));
    } 
} 
