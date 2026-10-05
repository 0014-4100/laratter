<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\TweetController;
use App\Http\Controllers\DiaryController;



Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
Route::resource('tweets', TweetController::class);
Route::get('diaries', [DiaryController::class, 'index'])
    ->middleware('auth')
    ->name('diaries.index');
Route::get('diaries/create', [DiaryController::class, 'create'])->middleware('auth');
Route::get('diaries/{diary}', [DiaryController::class, 'show'])
    ->middleware('auth')
    ->name('diaries.show');
Route::post('diaries', [DiaryController::class, 'store'])->middleware('auth')->name('diaries.store');
