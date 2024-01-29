<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Login;
use App\Livewire\Register;
use App\Livewire\Welcome;
use App\Livewire\Logout;
use App\Livewire\UserMessages;
use App\Http\Controllers\HomeController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', [HomeController::class, 'index'])->middleware('auth')->name('dashboard');

Route::get('/', Welcome::class)->name('welcome');
Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', Login::class)->name('login')->middleware('guest');
    Route::get('/register', Register::class)->name('register');
});


// Route::post('/logout', Register::class)->name('logout');
