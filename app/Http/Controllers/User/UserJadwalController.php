<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\Kereta;
use Illuminate\Http\Request;

class UserJadwalController extends Controller {
    public function index(Request $request) {
        $asal    = $request->get('asal');
        $tujuan  = $request->get('tujuan');
        $tanggal = $request->get('tanggal');
        $kelas   = $request->get('kelas');

        $jadwal = Jadwal::with('kereta')
            ->when($asal,    fn($q) => $q->where('stasiun_asal',   'like', "%$asal%"))
            ->when($tujuan,  fn($q) => $q->where('stasiun_tujuan', 'like', "%$tujuan%"))
            ->when($tanggal, fn($q) => $q->whereDate('tanggal_berangkat', $tanggal))
            ->when($kelas,   fn($q) => $q->whereHas('kereta', fn($k) => $k->where('kelas', $kelas)))
            ->orderBy('tanggal_berangkat')->orderBy('jam_berangkat')
            ->paginate(10);

        return view('user.jadwal', compact('jadwal','asal','tujuan','tanggal','kelas'));
    }
}
