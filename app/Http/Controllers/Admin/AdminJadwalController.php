<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\{Jadwal,Kereta};
use Illuminate\Http\Request;

class AdminJadwalController extends Controller {
    public function index(Request $request) {
        $search = $request->get('search'); $tujuan = $request->get('tujuan');
        $jadwal = Jadwal::with('kereta')
            ->when($search, fn($q) => $q->where('stasiun_asal','like',"%$search%")->orWhere('stasiun_tujuan','like',"%$search%"))
            ->when($tujuan, fn($q) => $q->where('stasiun_tujuan','like',"%$tujuan%"))
            ->withCount('pemesanan')->paginate(10);
        return view('admin.jadwal.index', compact('jadwal','search','tujuan'));
    }
    public function create() { $kereta = Kereta::all(); return view('admin.jadwal.create', compact('kereta')); }
    public function store(Request $request) {
        $request->validate(['id_kereta'=>'required|exists:kereta,id_kereta','stasiun_asal'=>'required','stasiun_tujuan'=>'required','tanggal_berangkat'=>'required|date','jam_berangkat'=>'required']);
        Jadwal::create($request->all());
        return redirect()->route('admin.jadwal.index')->with('success','Jadwal ditambahkan.');
    }
    public function show(Jadwal $jadwal) { $jadwal->load(['kereta','pemesanan.penumpang']); return view('admin.jadwal.show', compact('jadwal')); }
    public function edit(Jadwal $jadwal) { $kereta = Kereta::all(); return view('admin.jadwal.edit', compact('jadwal','kereta')); }
    public function update(Request $request, Jadwal $jadwal) {
        $request->validate(['id_kereta'=>'required','stasiun_asal'=>'required','stasiun_tujuan'=>'required','tanggal_berangkat'=>'required|date','jam_berangkat'=>'required']);
        $jadwal->update($request->all()); return redirect()->route('admin.jadwal.index')->with('success','Jadwal diperbarui.');
    }
    public function destroy(Jadwal $jadwal) { $jadwal->delete(); return redirect()->route('admin.jadwal.index')->with('success','Jadwal dihapus.'); }
}
