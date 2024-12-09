<?php

namespace App\Http\Controllers;

use App\Models\Item;

class DashboardController extends Controller
{
    public function index()
    {
        // Menghitung total barang
        $totalItems = Item::count();

        // Menghitung total kuantitas barang
        $totalQuantity = Item::sum('quantity');

        // Mengambil barang dengan stok rendah (misalnya di bawah 10)
        $lowStockItems = Item::where('quantity', '<', 10)->count();

        // Mengambil barang terbaru (misalnya 5 item terakhir)
        $latestItems = Item::orderBy('updated_at', 'desc')->take(5)->get();

        // Kirim data ke view
        return view('dashboard', compact('totalItems', 'totalQuantity', 'lowStockItems', 'latestItems'));
    }
}
