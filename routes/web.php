<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\User\{UserDashboardController,UserJadwalController,UserPemesananController,UserProfileController};
use App\Http\Controllers\Admin\{AdminDashboardController,AdminPenumpangController,AdminKeretaController,AdminJadwalController,AdminPemesananController,AdminUserController};

// Root redirect
Route::get('/', fn() => redirect()->route('login'));

// AUTH (guest only)
Route::middleware('guest.kai')->group(function () {
    Route::get('/login',    [AuthController::class,'showLogin'])->name('login');
    Route::post('/login',   [AuthController::class,'login'])->name('login.post');
    Route::get('/register', [AuthController::class,'showRegister'])->name('register');
    Route::post('/register',[AuthController::class,'register'])->name('register.post');
    Route::post('/forgot/verify', [ForgotPasswordController::class,'verify'])->name('forgot.verify');
    Route::post('/forgot/reset',  [ForgotPasswordController::class,'reset'])->name('forgot.reset');
});

Route::post('/logout', [AuthController::class,'logout'])->name('logout')->middleware('auth');

// USER routes
Route::prefix('user')->name('user.')->middleware(['kai.user'])->group(function () {
    Route::get('/dashboard',            [UserDashboardController::class,'index'])->name('dashboard');
    Route::get('/jadwal',               [UserJadwalController::class,'index'])->name('jadwal');
    Route::get('/pesan',                [UserPemesananController::class,'create'])->name('pesan');
    Route::post('/pesan',               [UserPemesananController::class,'store'])->name('pesan.store');
    Route::get('/tiket',                [UserPemesananController::class,'index'])->name('tiket');
    Route::get('/tiket/{id}',           [UserPemesananController::class,'show'])->name('tiket.show');
    Route::post('/tiket/{id}/cancel',   [UserPemesananController::class,'cancel'])->name('tiket.cancel');
    Route::get('/profil',               [UserProfileController::class,'edit'])->name('profil');
    Route::post('/profil',              [UserProfileController::class,'update'])->name('profil.update');
    Route::post('/profil/password',     [UserProfileController::class,'updatePassword'])->name('profil.password');
    Route::post('/profil/remove-photo', [UserProfileController::class,'removePhoto'])->name('profil.remove-photo');
});

// ADMIN routes
Route::prefix('admin')->name('admin.')->middleware(['admin'])->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class,'index'])->name('dashboard');

    // Penumpang (view only - read from users purchasing)
    Route::get('/penumpang',         [AdminPenumpangController::class,'index'])->name('penumpang.index');
    Route::get('/penumpang/{penumpang}', [AdminPenumpangController::class,'show'])->name('penumpang.show');
    Route::delete('/penumpang/{penumpang}', [AdminPenumpangController::class,'destroy'])->name('penumpang.destroy');

    // Kereta CRUD
    Route::resource('kereta', AdminKeretaController::class)->names('kereta')->parameters(['kereta' => 'kereta']);

    // Jadwal CRUD
    Route::resource('jadwal', AdminJadwalController::class)->names('jadwal')->parameters(['jadwal' => 'jadwal']);

    // Pemesanan
    Route::get('/pemesanan',           [AdminPemesananController::class,'index'])->name('pemesanan.index');
    Route::get('/pemesanan/{id}',      [AdminPemesananController::class,'show'])->name('pemesanan.show');
    Route::delete('/pemesanan/{id}',   [AdminPemesananController::class,'destroy'])->name('pemesanan.destroy');
    Route::get('/laporan',             [AdminPemesananController::class,'laporan'])->name('laporan');

    // Users (view only, no password/email edit)
    Route::get('/users',               [AdminUserController::class,'index'])->name('users.index');
    Route::get('/users/{user}',        [AdminUserController::class,'show'])->name('users.show');
});
