<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ForgotPasswordController extends Controller {

    // Verifikasi email, simpan ke session jika ada
    public function verify(Request $request) {
        $request->validate(['email' => 'required|email'], [
            'email.required' => 'Email wajib diisi.',
            'email.email'    => 'Format email tidak valid.',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return redirect()->route('login', ['tab' => 'forgot'])
                ->withErrors(['email' => 'Email tidak ditemukan dalam sistem.'])
                ->withInput(['forgot_email' => $request->email]);
        }

        // Simpan email ke session agar form reset muncul
        session(['reset_email' => $user->email]);
        return redirect()->route('login', ['tab' => 'forgot']);
    }

    // Simpan password baru
    public function reset(Request $request) {
        $request->validate([
            'email'    => 'required|email|exists:users,email',
            'password' => 'required|min:8|confirmed',
        ], [
            'password.min'       => 'Password minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        User::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);

        // Hapus session reset
        session()->forget('reset_email');

        return redirect()->route('login')
            ->with('success', 'Password berhasil diubah. Silakan masuk dengan password baru.');
    }
}
