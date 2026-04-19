<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\{Penumpang,Kereta,Jadwal,Pemesanan,User};
use Illuminate\Http\Request;

class AdminDashboardController extends Controller {
    public function index() {
        $totalPenumpang = Penumpang::count();
        $totalKereta    = Kereta::count();
        $totalJadwal    = Jadwal::count();
        $totalTiket     = Pemesanan::sum('jumlah_tiket');
        $totalUsers     = User::where('role','user')->count();
        $pemesananLebihDari2 = Pemesanan::with(['penumpang','jadwal.kereta'])->where('jumlah_tiket','>',2)->get();
        $jadwalBandung       = Jadwal::with('kereta')->where('stasiun_tujuan','like','%Bandung%')->get();
        $recentPemesanan     = Pemesanan::with(['penumpang','jadwal.kereta','user'])->latest()->take(5)->get();
        return view('admin.dashboard', compact(
            'totalPenumpang','totalKereta','totalJadwal','totalTiket','totalUsers',
            'pemesananLebihDari2','jadwalBandung','recentPemesanan'
        ));
    }
}
