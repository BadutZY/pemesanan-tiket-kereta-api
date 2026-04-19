<?php

namespace App\Http\Controllers;

use App\Models\Penumpang;
use Illuminate\Http\Request;

class PenumpangController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $penumpang = Penumpang::when($search, function ($query, $search) {
            return $query->where('nama_penumpang', 'like', "%{$search}%")
                         ->orWhere('nik', 'like', "%{$search}%")
                         ->orWhere('no_hp', 'like', "%{$search}%");
        })->withCount('pemesanan')->paginate(10);

        return view('penumpang.index', compact('penumpang', 'search'));
    }

    public function create()
    {
        return view('penumpang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_penumpang' => 'required|string|max:100',
            'nik' => 'required|string|size:16|unique:penumpang,nik',
            'no_hp' => 'required|string|max:15',
        ], [
            'nama_penumpang.required' => 'Nama penumpang wajib diisi.',
            'nik.required' => 'NIK wajib diisi.',
            'nik.size' => 'NIK harus 16 digit.',
            'nik.unique' => 'NIK sudah terdaftar.',
            'no_hp.required' => 'Nomor HP wajib diisi.',
        ]);

        Penumpang::create($request->all());
        return redirect()->route('penumpang.index')->with('success', 'Data penumpang berhasil ditambahkan!');
    }

    public function show(Penumpang $penumpang)
    {
        $penumpang->load(['pemesanan.jadwal.kereta']);
        return view('penumpang.show', compact('penumpang'));
    }

    public function edit(Penumpang $penumpang)
    {
        return view('penumpang.edit', compact('penumpang'));
    }

    public function update(Request $request, Penumpang $penumpang)
    {
        $request->validate([
            'nama_penumpang' => 'required|string|max:100',
            'nik' => 'required|string|size:16|unique:penumpang,nik,' . $penumpang->id_penumpang . ',id_penumpang',
            'no_hp' => 'required|string|max:15',
        ]);

        $penumpang->update($request->all());
        return redirect()->route('penumpang.index')->with('success', 'Data penumpang berhasil diperbarui!');
    }

    public function destroy(Penumpang $penumpang)
    {
        $penumpang->delete();
        return redirect()->route('penumpang.index')->with('success', 'Data penumpang berhasil dihapus!');
    }
}
