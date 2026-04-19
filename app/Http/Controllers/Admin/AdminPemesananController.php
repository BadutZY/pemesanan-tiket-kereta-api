<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Pemesanan;
use Illuminate\Http\Request;

class AdminPemesananController extends Controller {
    public function index(Request $request) {
        $search = $request->get('search');
        $filterTiket = $request->get('filter_tiket');
        $pemesanan = Pemesanan::with(['penumpang','jadwal.kereta','user'])
            ->when($search, fn($q) => $q->whereHas('penumpang', fn($p)=>$p->where('nama_penumpang','like',"%$search%")))
            ->when($filterTiket==='lebih2', fn($q) => $q->where('jumlah_tiket','>',2))
            ->paginate(10);
        $totalTiket = Pemesanan::sum('jumlah_tiket');
        return view('admin.pemesanan.index', compact('pemesanan','search','filterTiket','totalTiket'));
    }
    public function show($id) {
        $pemesanan = Pemesanan::with(['penumpang','jadwal.kereta','user'])->findOrFail($id);
        return view('admin.pemesanan.show', compact('pemesanan'));
    }
    public function laporan() {
        $pemesananLebihDari2    = Pemesanan::with(['penumpang','jadwal.kereta','user'])->where('jumlah_tiket','>',2)->get();
        $jadwalBandung          = \App\Models\Jadwal::with('kereta')->where('stasiun_tujuan','like','%Bandung%')->get();
        $totalTiketPerPenumpang = \App\Models\Penumpang::withSum('pemesanan','jumlah_tiket')
            ->with(['pemesanan' => fn($q) => $q->with('user')->limit(1)])
            ->having('pemesanan_sum_jumlah_tiket','>',0)->get();
        $grandTotalTiket = Pemesanan::sum('jumlah_tiket');
        return view('admin.pemesanan.laporan', compact('pemesananLebihDari2','jadwalBandung','totalTiketPerPenumpang','grandTotalTiket'));
    }
    public function destroy($id) {
        Pemesanan::findOrFail($id)->delete();
        return redirect()->route('admin.pemesanan.index')->with('success','Pemesanan dihapus.');
    }
}
