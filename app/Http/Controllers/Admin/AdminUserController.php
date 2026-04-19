<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller {
    public function index(Request $request) {
        $search = $request->get('search');
        $users = User::where('role','user')
            ->when($search, fn($q) => $q->where('name','like',"%$search%")->orWhere('email','like',"%$search%"))
            ->withCount('pemesanan')->paginate(15);
        return view('admin.users.index', compact('users','search'));
    }
    public function show(User $user) {
        $user->load(['pemesanan.jadwal.kereta']);
        return view('admin.users.show', compact('user'));
    }
    // Admin can only view users, NOT edit their password/email
}
