<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DhikrController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/locale/{locale}', [LocaleController::class, 'switchLanguage'])->name('locale.switch');
Route::get('/theme/{theme}', [ThemeController::class, 'switchTheme'])->name('theme.switch');

Route::get('/dhikrs/create', [DhikrController::class, 'create'])->name('dhikrs.create');
Route::get('/dhikrs/{dhikr}/edit', [DhikrController::class, 'edit'])->name('dhikrs.edit');
Route::patch('/dhikrs/{dhikr}', [DhikrController::class, 'update'])->name('dhikrs.update');
Route::get('/dhikrs', [DhikrController::class, 'index'])->name('dhikrs.index');
Route::post('/dhikrs', [DhikrController::class, 'store'])->name('dhikrs.store');

require __DIR__ . '/auth.php';
