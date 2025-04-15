<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use App\http\Controllers\form_mahasiswa_aktifController;
use App\Http\Controllers\laporan_hasil_studiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route Registration - Log In
Route::get('/register', [AuthController::class, 'showRegister'])->name('show.register');
Route::get('/login', [AuthController::class, 'showLogin'])->name('show.login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Route form_mahasiswa_aktif
Route::get('/form_mahasiswa_aktif',[form_mahasiswa_aktifController::class,'index'])->name('form_mahasiswa_aktif-list');
Route::get('/form_mahasiswa_aktif/create',[form_mahasiswa_aktifController::class,'index'])->name('form_mahasiswa_aktif-create');
Route::post('/form_mahasiswa_aktif/create',[form_mahasiswa_aktifController::class,'index'])->name('form_mahasiswa_aktif-store');
Route::get('/form_mahasiswa_aktif/edit/{id}', [form_mahasiswa_aktifController::class, 'edit'])->name('form_mahasiswa_aktif-edit');
Route::put('/form_mahasiswa_aktif/edit/{id}', [form_mahasiswa_aktifController::class, 'update'])->name('form_mahasiswa_aktif-update');
Route::delete('/form_mahasiswa_aktif/delete/{id}', [form_mahasiswa_aktifController::class, 'destroy'])->name('form_mahasiswa_aktif-delete');

// Route Laporan Hasil Studi

Route::get('/laporan-studi/create', [laporan_hasil_studiController::class, 'create'])->name('laporan_hasil_studi.create');
Route::post('/laporan-studi/create', [laporan_hasil_studiController::class, 'store'])->name('laporan_hasil_studi.store');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
