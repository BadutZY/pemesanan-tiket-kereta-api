<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\Penumpang;
use App\Models\Jadwal;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $filterTiket = $request->get('filter_tiket');

        $pemesanan = Pemesanan::with(['penumpang', 'jadwal.kereta'])
            ->when($search, function ($query, $search) {
                return $query->whereHas('penumpang', function ($q) use ($search) {
                    $q->where('nama_penumpang', 'like', "%{$search}%");
                })->orWhereHas('jadwal', function ($q) use ($search) {
                    $q->where('stasiun_tujuan', 'like', "%{$search}%")
                      ->orWhere('stasiun_asal', 'like', "%{$search}%");
                });
            })
            ->when($filterTiket === 'lebih2', function ($query) {
                return $query->where('jumlah_tiket', '>', 2);
            })
            ->paginate(10);

        $totalTiket = Pemesanan::sum('jumlah_tiket');

        return view('pemesanan.index', compact('pemesanan', 'search', 'filterTiket', 'totalTiket'));
    }

    public function create()
    {
        $penumpang = Penumpang::all();
        $jadwal = Jadwal::with('kereta')->get();
        return view('pemesanan.create', compact('penumpang', 'jadwal'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_penumpang' => 'required|exists:penumpang,id_penumpang',
            'id_jadwal' => 'required|exists:jadwal,id_jadwal',
            'tanggal_pesan' => 'required|date',
            'jumlah_tiket' => 'required|integer|min:1|max:10',
        ]);

        Pemesanan::create($request->all());
        return redirect()->route('pemesanan.index')->with('success', 'Pemesanan berhasil ditambahkan!');
    }

    public function show(Pemesanan $pemesanan)
    {
        $pemesanan->load(['penumpang', 'jadwal.kereta']);
        return view('pemesanan.show', compact('pemesanan'));
    }

    public function edit(Pemesanan $pemesanan)
    {
        $penumpang = Penumpang::all();
        $jadwal = Jadwal::with('kereta')->get();
        return view('pemesanan.edit', compact('pemesanan', 'penumpang', 'jadwal'));
    }

    public function update(Request $request, Pemesanan $pemesanan)
    {
        $request->validate([
            'id_penumpang' => 'required|exists:penumpang,id_penumpang',
            'id_jadwal' => 'required|exists:jadwal,id_jadwal',
            'tanggal_pesan' => 'required|date',
            'jumlah_tiket' => 'required|integer|min:1|max:10',
        ]);

        $pemesanan->update($request->all());
        return redirect()->route('pemesanan.index')->with('success', 'Pemesanan berhasil diperbarui!');
    }

    public function destroy(Pemesanan $pemesanan)
    {
        $pemesanan->delete();
        return redirect()->route('pemesanan.index')->with('success', 'Pemesanan berhasil dihapus!');
    }

    public function laporan()
    {
        // 1. Pemesanan dengan jumlah tiket > 2
        $pemesananLebihDari2 = Pemesanan::with(['penumpang', 'jadwal.kereta'])
            ->where('jumlah_tiket', '>', 2)
            ->get();

        // 2. Jadwal dengan tujuan Bandung
        $jadwalBandung = Jadwal::with('kereta')
            ->where('stasiun_tujuan', 'like', '%Bandung%')
            ->get();

        // 3. Total tiket semua penumpang
        $totalTiketPerPenumpang = Penumpang::withSum('pemesanan', 'jumlah_tiket')
            ->having('pemesanan_sum_jumlah_tiket', '>', 0)
            ->get();

        $grandTotalTiket = Pemesanan::sum('jumlah_tiket');

        return view('pemesanan.laporan', compact(
            'pemesananLebihDari2',
            'jadwalBandung',
            'totalTiketPerPenumpang',
            'grandTotalTiket'
        ));
    }
}
