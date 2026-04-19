<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Penumpang;
use Illuminate\Http\Request;

class AdminPenumpangController extends Controller {
    public function index(Request $request) {
        $search = $request->get('search');
        $penumpang = Penumpang::when($search, fn($q) => $q->where('nama_penumpang','like',"%$search%")->orWhere('nik','like',"%$search%")->orWhere('no_hp','like',"%$search%"))
            ->withCount('pemesanan')
            ->with(['pemesanan' => fn($q) => $q->with('user')->limit(1)])
            ->paginate(10);
        return view('admin.penumpang.index', compact('penumpang','search'));
    }
    public function show(Penumpang $penumpang) {
        $penumpang->load(['pemesanan.jadwal.kereta', 'pemesanan.user']);
        return view('admin.penumpang.show', compact('penumpang'));
    }
    public function destroy(Penumpang $penumpang) {
        $penumpang->delete();
        return redirect()->route('admin.penumpang.index')->with('success','Data penumpang dihapus.');
    }
}
