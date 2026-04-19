<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Kereta;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $tujuan = $request->get('tujuan');

        $jadwal = Jadwal::with('kereta')
            ->when($search, function ($query, $search) {
                return $query->where('stasiun_asal', 'like', "%{$search}%")
                             ->orWhere('stasiun_tujuan', 'like', "%{$search}%");
            })
            ->when($tujuan, function ($query, $tujuan) {
                return $query->where('stasiun_tujuan', 'like', "%{$tujuan}%");
            })
            ->withCount('pemesanan')
            ->paginate(10);

        return view('jadwal.index', compact('jadwal', 'search', 'tujuan'));
    }

    public function create()
    {
        $kereta = Kereta::all();
        return view('jadwal.create', compact('kereta'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_kereta' => 'required|exists:kereta,id_kereta',
            'stasiun_asal' => 'required|string|max:100',
            'stasiun_tujuan' => 'required|string|max:100',
            'tanggal_berangkat' => 'required|date',
            'jam_berangkat' => 'required',
        ]);

        Jadwal::create($request->all());
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil ditambahkan!');
    }

    public function show(Jadwal $jadwal)
    {
        $jadwal->load(['kereta', 'pemesanan.penumpang']);
        return view('jadwal.show', compact('jadwal'));
    }

    public function edit(Jadwal $jadwal)
    {
        $kereta = Kereta::all();
        return view('jadwal.edit', compact('jadwal', 'kereta'));
    }

    public function update(Request $request, Jadwal $jadwal)
    {
        $request->validate([
            'id_kereta' => 'required|exists:kereta,id_kereta',
            'stasiun_asal' => 'required|string|max:100',
            'stasiun_tujuan' => 'required|string|max:100',
            'tanggal_berangkat' => 'required|date',
            'jam_berangkat' => 'required',
        ]);

        $jadwal->update($request->all());
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil diperbarui!');
    }

    public function destroy(Jadwal $jadwal)
    {
        $jadwal->delete();
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil dihapus!');
    }
}
