<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\DetailTransaksiController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\PaketController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard/dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/users', [UsersController::class, 'index'])->name("users.index");
Route::get('/users/create',[UsersController::class, 'create'])->name("users.create");
Route::post('/users',[UsersController::class, 'store'])->name("users.store");
Route::get('users/{id}/edit', [UsersController::class, 'edit'])->name("users.edit");
Route::post("/users/{id}/update", [UsersController::class, "update"])->name("users.update");
Route::post("/users/{id}", [UsersController::class, "destroy"])->name("users.destroy");

Route::get('/member', [MemberController::class, 'index'])->name("member.index");
Route::get('/member/create',[MemberController::class, 'create'])->name("member.create");
Route::post('/member',[MemberController::class, 'store'])->name("member.store");
Route::get('member/{id}/edit', [MemberController::class, 'edit'])->name("member.edit");
Route::post("/member/{id}/update", [MemberController::class, "update"])->name("member.update");
Route::post("/member/{id}", [MemberController::class, "destroy"])->name("member.destroy");

Route::get('/outlet', [OutletController::class, 'index'])->name("outlet.index");
Route::get('/outlet/create', [OutletController::class, 'create'])->name("outlet.create");
Route::post('/outlet', [OutletController::class, 'store'])->name("outlet.store");
Route::get('outlet/{id}/edit', [OutletController::class, 'edit'])->name("outlet.edit");
Route::post("/outlet/{id}/update", [OutletController::class, "update"])->name("outlet.update");
Route::post("/outlet/{id}", [OutletController::class, "destroy"])->name("outlet.destroy");


Route::get('/voucher', [VoucherController::class, 'index'])->name("voucher.index");
Route::get('/voucher/create', [VoucherController::class, 'create'])->name("voucher.create");
Route::post('/voucher', [VoucherController::class, 'store'])->name("voucher.store");
Route::get('voucher/{id}/edit', [VoucherController::class, 'edit'])->name("voucher.edit");
Route::post("/voucher/{id}/update", [VoucherController::class, "update"])->name("voucher.update");
Route::post("/voucher/{id}", [VoucherController::class, "destroy"])->name("voucher.destroy");

Route::get('/paket', [PaketController::class, 'index'])->name("paket.index");
Route::get('/paket/create', [PaketController::class, 'create'])->name("paket.create");
Route::post('/paket', [PaketController::class, 'store'])->name("paket.store");
Route::get('paket/{id}/edit', [PaketController::class, 'edit'])->name("paket.edit");
Route::post("/paket/{id}/update", [PaketController::class, "update"])->name("paket.update");
Route::post("/paket/{id}", [PaketController::class, "destroy"])->name("paket.destroy");

Route::get('/transaksi', [TransaksiController::class, 'index'])->name("transaksi.index");
Route::get('/transaksi/create', [TransaksiController::class, 'create'])->name("transaksi.create");
Route::post('/transaksi', [TransaksiController::class, 'store'])->name("transaksi.store");
Route::get('transaksi/{id}/edit', [TransaksiController::class, 'detail'])->name("transaksi.edit");
Route::post("/transaksi/{id}/update", [TransaksiController::class, "update"])->name("transaksi.update");
Route::post("/transaksi/{id}/delete", [TransaksiController::class, "destroy"])->name("transaksi.destroy");

Route::get('/transaksi', [DetailTransaksiController::class, 'index'])->name("transaksi.index");

require __DIR__.'/auth.php';
