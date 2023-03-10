<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\OutletController;
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
// Route::resource('member', MemberController::class);
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

require __DIR__.'/auth.php';
