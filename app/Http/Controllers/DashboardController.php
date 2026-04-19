<?php

namespace App\Http\Controllers;

use App\Models\Penumpang;
use App\Models\Kereta;
use App\Models\Jadwal;
use App\Models\Pemesanan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPenumpang = Penumpang::count();
        $totalKereta = Kereta::count();
        $totalJadwal = Jadwal::count();
        $totalPemesanan = Pemesanan::count();
        $totalTiket = Pemesanan::sum('jumlah_tiket');

        // Pemesanan dengan jumlah tiket > 2
        $pemesananLebihDari2 = Pemesanan::with(['penumpang', 'jadwal.kereta'])
            ->where('jumlah_tiket', '>', 2)
            ->get();

        // Jadwal tujuan Bandung
        $jadwalBandung = Jadwal::with('kereta')
            ->where('stasiun_tujuan', 'like', '%Bandung%')
            ->get();

        // Recent pemesanan
        $recentPemesanan = Pemesanan::with(['penumpang', 'jadwal.kereta'])
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalPenumpang', 'totalKereta', 'totalJadwal',
            'totalPemesanan', 'totalTiket',
            'pemesananLebihDari2', 'jadwalBandung', 'recentPemesanan'
        ));
    }
}
