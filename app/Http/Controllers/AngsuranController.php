<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AngsuranController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function calculate(Request $request)
    {
        // Validasi input
        $request->validate([
            'harga_mobil' => 'required|numeric',
            'dp' => 'required|numeric',
            'tenor' => 'required|numeric'
        ]);

        // Ambil nilai dari form
        $harga_mobil = $request->input('harga_mobil');
        $dp_percent = $request->input('dp');
        $tenor = $request->input('tenor');

        // Hitung DP dalam rupiah
        $dp = ($dp_percent / 100) * $harga_mobil;

        // Hitung bunga 20%
        $bunga = (20 / 100) * $harga_mobil;

        // Total harga setelah bunga
        $total_harga = $harga_mobil + $bunga;

        // Jumlah bulan tenor
        $jumlah_bulan = $tenor * 12;

        // Angsuran per bulan
        $angsuran_per_bulan = ($total_harga - $dp) / $jumlah_bulan;

        return view('index', [
            'harga_mobil' => $harga_mobil,
            'dp_percent' => $dp_percent,
            'dp' => $dp,
            'tenor' => $tenor,
            'jumlah_bulan' => $jumlah_bulan,
            'bunga' => $bunga,
            'angsuran_per_bulan' => $angsuran_per_bulan
        ]);
    }
}
