<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller {

    public function showLogin() { return view('auth.login'); }

    public function login(Request $request) {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ], [
            'email.required'    => 'Email wajib diisi.',
            'password.required' => 'Password wajib diisi.',
        ]);

        $credentials = $request->only('email','password');
        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return Auth::user()->isAdmin()
                ? redirect()->route('admin.dashboard')
                : redirect()->route('user.dashboard');
        }

        return back()->withErrors(['email' => 'Email atau password salah.'])->withInput();
    }

    public function showRegister() { return view('auth.register'); }

    public function register(Request $request) {
        $request->validate([
            'name'                  => 'required|string|max:100',
            'email'                 => 'required|email|unique:users,email',
            'no_hp'                 => 'required|string|max:15',
            'nik'                   => 'required|string|size:16',
            'password'              => 'required|min:8|confirmed',
        ], [
            'name.required'         => 'Nama lengkap wajib diisi.',
            'email.unique'          => 'Email sudah terdaftar.',
            'no_hp.required'        => 'Nomor HP wajib diisi.',
            'nik.size'              => 'NIK harus 16 digit.',
            'password.min'          => 'Password minimal 8 karakter.',
            'password.confirmed'    => 'Konfirmasi password tidak cocok.',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'no_hp'    => $request->no_hp,
            'nik'      => $request->nik,
            'password' => Hash::make($request->password),
            'role'     => 'user',
        ]);

        Auth::login($user);
        return redirect()->route('user.dashboard')->with('success', 'Selamat datang, '.$user->name.'!');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
