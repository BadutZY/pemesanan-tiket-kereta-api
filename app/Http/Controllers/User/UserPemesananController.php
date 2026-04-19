<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\Pemesanan;
use App\Models\Penumpang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserPemesananController extends Controller {

    public function create(Request $request) {
        $jadwal = Jadwal::with('kereta')->findOrFail($request->get('jadwal_id'));
        return view('user.pesan', compact('jadwal'));
    }

    public function store(Request $request) {
        $request->validate([
            'id_jadwal'    => 'required|exists:jadwal,id_jadwal',
            'nama_penumpang'=> 'required|string|max:100',
            'nik'          => 'required|string|size:16',
            'no_hp'        => 'required|string|max:15',
            'jumlah_tiket' => 'required|integer|min:1|max:10',
        ], [
            'nik.size'         => 'NIK harus 16 digit.',
            'jumlah_tiket.min' => 'Minimal 1 tiket.',
            'jumlah_tiket.max' => 'Maksimal 10 tiket per pemesanan.',
        ]);

        // Create or find penumpang
        $penumpang = Penumpang::firstOrCreate(
            ['nik' => $request->nik],
            ['nama_penumpang' => $request->nama_penumpang, 'no_hp' => $request->no_hp]
        );

        $pemesanan = Pemesanan::create([
            'user_id'      => Auth::id(),
            'id_penumpang' => $penumpang->id_penumpang,
            'id_jadwal'    => $request->id_jadwal,
            'tanggal_pesan'=> now()->toDateString(),
            'jumlah_tiket' => $request->jumlah_tiket,
            'status'       => 'confirmed',
        ]);

        return redirect()->route('user.tiket.show', $pemesanan->id_pemesanan)
            ->with('success', 'Pemesanan berhasil! Tiket Anda sudah dikonfirmasi.');
    }

    public function index() {
        $pesanan = Pemesanan::with(['jadwal.kereta'])
            ->where('user_id', Auth::id())
            ->latest()->paginate(10);
        return view('user.tiket', compact('pesanan'));
    }

    public function show($id) {
        $pemesanan = Pemesanan::with(['jadwal.kereta','penumpang'])
            ->where('user_id', Auth::id())
            ->findOrFail($id);
        return view('user.tiket-detail', compact('pemesanan'));
    }

    public function cancel($id) {
        $pemesanan = Pemesanan::where('user_id', Auth::id())->findOrFail($id);
        $pemesanan->update(['status' => 'cancelled']);
        return back()->with('success', 'Pemesanan berhasil dibatalkan.');
    }
}
