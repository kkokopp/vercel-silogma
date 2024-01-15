<?php

use App\Mail\SendEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LandController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\AlutsistaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [LandController::class, 'index']);

Route::get('/home', [HomeController::class, 'home'])->middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function () {

    Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

        
        Route::prefix('senjata')->group(function () {
            Route::get('/', [AlutsistaController::class, 'index'])->name('admin.senjata');
            Route::get('/tambah', [AlutsistaController::class, 'create'])->name('admin.senjata.tambah');
            Route::post('/tambah', [AlutsistaController::class, 'store'])->name('admin.senjata.store');
            Route::get('/{alutsista:kode_senjata}/edit', [AlutsistaController::class, 'edit'])->name('admin.senjata.edit');
            Route::patch('/{alutsista:kode_senjata}/edit', [AlutsistaController::class, 'update'])->name('admin.senjata.update');
            Route::delete('/{alutsista:kode_senjata}/delete', [AlutsistaController::class, 'destroy'])->name('admin.senjata.destroy');
        });
        Route::prefix('pengguna')->group(function () {
            Route::get('/', [PenggunaController::class, 'index'])->name('admin.pengguna');
            Route::get('/tambah', [PenggunaController::class, 'create'])->name('admin.pengguna.tambah');
            Route::post('/tambah', [PenggunaController::class, 'store'])->name('admin.pengguna.store');
            Route::get('/{user:kode_user}/edit', [PenggunaController::class, 'edit'])->name('admin.pengguna.edit');
            Route::patch('/{user:kode_user}/edit', [PenggunaController::class, 'update'])->name('admin.pengguna.update');
            Route::delete('/{user:kode_user}/delete', [PenggunaController::class, 'destroy'])->name('admin.pengguna.destroy');

        });
    });
    
    Route::prefix('user')->middleware(['auth', 'role:user'])->group(function () {
        Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('alutsista')->group(function () {
        // Route::get('/', [LandController::class, 'index'])->name('alutsista.index');
        Route::get('/post', [LandController::class, 'semua'])->name('alutsista.semua');
        Route::get('/post/{alutsista:kode_senjata}', [LandController::class, 'show'])->name('alutsista.show');
        // Route::get('/semua', [LandController::class, 'jenis'])->name('alutsista.jenis');
    });
});
// Route::prefix('alutsista')->group(function () {
    Route::get('alutsista/', [LandController::class, 'index'])->name('alutsista.index');
    // Route::get('alutsista/post', [LandController::class, 'semua'])->name('alutsista.semua');
    // Route::get('/post/{alutsista:kode_senjata}', [LandController::class, 'show'])->name('alutsista.show');
    // Route::get('/semua', [LandController::class, 'jenis'])->name('alutsista.jenis');
// });
// Route::get('/alutsista/{kode_senjata}',[LandController::class, 'show'])->name('alutsista.show');

Route::post('send-email', [LandController::class, 'sendEmail'])->name('send.email');
// Route::get('/alutsista/')

// Route::get('/admin/dashboard', function () {
//     return view('admin.dashboard');
// })->middleware(['auth', 'verified', 'role:admin'])->name('admin.dashboard');

// Route::get('/user/dashboard', function () {
//     return view('user.dashboard');
// })->middleware(['auth', 'verified', 'role:user'])->name('user.dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
