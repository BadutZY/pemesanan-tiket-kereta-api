<?php

namespace App\Http\Controllers;

use App\Models\Kereta;
use Illuminate\Http\Request;

class KeretaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $kereta = Kereta::when($search, function ($query, $search) {
            return $query->where('nama_kereta', 'like', "%{$search}%")
                         ->orWhere('kelas', 'like', "%{$search}%");
        })->withCount('jadwal')->paginate(10);

        return view('kereta.index', compact('kereta', 'search'));
    }

    public function create()
    {
        return view('kereta.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kereta' => 'required|string|max:100',
            'kelas' => 'required|in:Ekonomi,Bisnis,Eksekutif',
        ]);

        Kereta::create($request->all());
        return redirect()->route('kereta.index')->with('success', 'Data kereta berhasil ditambahkan!');
    }

    public function show(Kereta $kereta)
    {
        $kereta->load('jadwal.pemesanan');
        return view('kereta.show', compact('kereta'));
    }

    public function edit(Kereta $kereta)
    {
        return view('kereta.edit', compact('kereta'));
    }

    public function update(Request $request, Kereta $kereta)
    {
        $request->validate([
            'nama_kereta' => 'required|string|max:100',
            'kelas' => 'required|in:Ekonomi,Bisnis,Eksekutif',
        ]);

        $kereta->update($request->all());
        return redirect()->route('kereta.index')->with('success', 'Data kereta berhasil diperbarui!');
    }

    public function destroy(Kereta $kereta)
    {
        $kereta->delete();
        return redirect()->route('kereta.index')->with('success', 'Data kereta berhasil dihapus!');
    }
}
