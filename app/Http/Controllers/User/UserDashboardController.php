<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller {
    public function index() {
        $user = Auth::user();
        $totalPesanan = Pemesanan::where('user_id', $user->id)->count();
        $totalTiket   = Pemesanan::where('user_id', $user->id)->sum('jumlah_tiket');
        $jadwalTerbaru = Jadwal::with('kereta')->orderBy('tanggal_berangkat')->take(4)->get();
        $pesananTerbaru = Pemesanan::with(['jadwal.kereta'])
            ->where('user_id', $user->id)->latest()->take(3)->get();
        return view('user.dashboard', compact('totalPesanan','totalTiket','jadwalTerbaru','pesananTerbaru'));
    }
}
