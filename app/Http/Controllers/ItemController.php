<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    // ini buat ngambil semua data item yang ada di database
    // terus kita kirim ke view buat ditampilkan di halaman admin
    public function index()
    {
        $items = Item::all(); // Ambil semua data item
        return view('admin.items.index', compact('items')); // Tampil ke view 'admin.items.index'
    }

    // kalo kita mau nambahin data item baru, kita bakal masukin form kosong
    // jadi bikin objek baru Item dan kirim ke view form buat diisi user
    public function create()
    {
        $item = new Item(); // Bikin objek item baru
        return view('admin.items.form', compact('item')); // Kirim ke form buat diisi
    }

    // kalo mau edit item, ambil item berdasarkan ID-nya, 
    // terus kirim ke form yang sama kaya buat create, cuma kali ini isinya data item yang mau diedit
    public function edit($id)
    {
        $item = Item::findOrFail($id); // Cari item berdasarkan ID, kalo gak ada bakal error
        return view('admin.items.form', compact('item')); // Kirim ke form edit
    }

    // ini buat hapus item dari database, pertama cari item berdasarkan ID
    // terus hapus, abis itu redirect ke halaman daftar item
    public function destroy($id)
    {
        $item = Item::findOrFail($id); // Cari item berdasarkan ID
        $item->delete(); // Hapus item

        // Setelah hapus, redirect ke halaman index dan kasih pesan sukses
        return redirect()->route('items.index')->with('success', 'Item deleted successfully!');
    }

    // buat nambahin item baru ke database, pertama validate input dari user
    // kalo valid, langsung bikin item baru pake data yang udah di-validate
    public function store(Request $request)
    {
        $validated = $request->validate([ // Validasi input
            'name' => 'required|string|max:255', // Name harus ada dan string
            'description' => 'nullable|string', // Description boleh kosong
            'quantity' => 'required|integer|min:1', // Quantity harus angka dan minimal 1
        ]);

        Item::create($validated); // Simpan item baru ke database

        // Redirect ke index dengan pesan sukses
        return redirect()->route('items.index')->with('success', 'Item added successfully!');
    }

    // ini buat update data item yang udah ada, pertama validate lagi datanya
    // setelah itu update item berdasarkan ID, simpen perubahan, dan redirect ke index
    public function update(Request $request, $id)
    {
        $validated = $request->validate([ // Validasi input
            'name' => 'required|string|max:255', // Name harus ada dan string
            'description' => 'nullable|string', // Description boleh kosong
            'quantity' => 'required|integer|min:1', // Quantity harus angka dan minimal 1
        ]);

        $item = Item::findOrFail($id); // Cari item berdasarkan ID
        $item->update($validated); // Update item dengan data yang baru

        // Redirect ke index dengan pesan sukses
        return redirect()->route('items.index')->with('success', 'Item updated successfully!');
    }
}
