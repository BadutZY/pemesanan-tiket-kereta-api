<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserProfileController extends Controller {
    public function edit() { return view('user.profile', ['user' => Auth::user()]); }

    public function update(Request $request) {
        $user = Auth::user();
        $request->validate([
            'name'          => 'required|string|max:100',
            'no_hp'         => 'required|string|max:15',
            'nik'           => 'nullable|string|size:16',
            'photo_profile' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ], [
            'photo_profile.image'    => 'File harus berupa gambar.',
            'photo_profile.mimes'    => 'Format foto: jpg, jpeg, png, webp.',
            'photo_profile.max'      => 'Ukuran foto maksimal 2MB.',
        ]);

        $data = $request->only('name', 'no_hp', 'nik');

        if ($request->hasFile('photo_profile')) {
            if ($user->photo_profile) {
                Storage::disk('public')->delete($user->photo_profile);
            }
            $path = $request->file('photo_profile')->store('profile_photos', 'public');
            $data['photo_profile'] = $path;
        }

        $user->update($data);
        return back()->with('success', 'Profil berhasil diperbarui.');
    }

    public function updatePassword(Request $request) {
        $request->validate([
            'current_password' => 'required',
            'password'         => 'required|min:8|confirmed',
        ], [
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
            'password.min'       => 'Password minimal 8 karakter.',
        ]);
        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return back()->withErrors(['current_password' => 'Password saat ini salah.']);
        }
        Auth::user()->update(['password' => Hash::make($request->password)]);
        return back()->with('success', 'Password berhasil diubah.');
    }

    public function removePhoto() {
        $user = Auth::user();
        if ($user->photo_profile) {
            Storage::disk('public')->delete($user->photo_profile);
            $user->update(['photo_profile' => null]);
        }
        return back()->with('success', 'Foto profil berhasil dihapus.');
    }
}
