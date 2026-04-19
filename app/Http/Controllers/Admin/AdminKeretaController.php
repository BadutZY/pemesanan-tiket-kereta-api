<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Kereta;
use Illuminate\Http\Request;

class AdminKeretaController extends Controller {
    public function index(Request $request) {
        $search = $request->get('search');
        $kereta = Kereta::when($search, fn($q) => $q->where('nama_kereta','like',"%$search%")->orWhere('kelas','like',"%$search%"))->withCount('jadwal')->paginate(10);
        return view('admin.kereta.index', compact('kereta','search'));
    }
    public function create() { return view('admin.kereta.create'); }
    public function store(Request $request) {
        $request->validate(['nama_kereta'=>'required|string|max:100','kelas'=>'required|in:Ekonomi,Bisnis,Eksekutif']);
        Kereta::create($request->all());
        return redirect()->route('admin.kereta.index')->with('success','Kereta berhasil ditambahkan.');
    }
    public function show(Kereta $kereta) { $kereta->load('jadwal.pemesanan'); return view('admin.kereta.show', compact('kereta')); }
    public function edit(Kereta $kereta) { return view('admin.kereta.edit', compact('kereta')); }
    public function update(Request $request, Kereta $kereta) {
        $request->validate(['nama_kereta'=>'required|string|max:100','kelas'=>'required|in:Ekonomi,Bisnis,Eksekutif']);
        $kereta->update($request->all());
        return redirect()->route('admin.kereta.index')->with('success','Kereta berhasil diperbarui.');
    }
    public function destroy(Kereta $kereta) { $kereta->delete(); return redirect()->route('admin.kereta.index')->with('success','Kereta dihapus.'); }
}
