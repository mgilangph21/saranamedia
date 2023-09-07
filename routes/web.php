<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    if (Auth::check()) {
        return view('admin.index');
        //return view('portal.index');
    } else {
        // return view('auth.login');
        return view('landing');
    }
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/billboard', [App\Http\Controllers\BillboardController::class, 'index'])->name('billboard');
Route::get('/billboard/detil/{id}', [App\Http\Controllers\BillboardController::class, 'edit'])->name('editBillboard');
Route::post('/billboard/store', [App\Http\Controllers\BillboardController::class, 'store'])->name('addBillboard');
Route::post('/billboard/update', [App\Http\Controllers\BillboardController::class, 'update'])->name('updateBillboard');
Route::post('/billboard/delete', [App\Http\Controllers\BillboardController::class, 'destroy'])->name('deleteBillboard');

Route::get('/jpo', [App\Http\Controllers\JpoController::class, 'index'])->name('jpo');
Route::get('/jpo/detil/{id}', [App\Http\Controllers\JpoController::class, 'edit'])->name('editJpo');
Route::post('/jpo/store', [App\Http\Controllers\JpoController::class, 'store'])->name('addJpo');
Route::post('/jpo/update', [App\Http\Controllers\JpoController::class, 'update'])->name('updateJpo');
Route::post('/jpo/delete', [App\Http\Controllers\JpoController::class, 'destroy'])->name('deleteJpo');

Route::get('/led', [App\Http\Controllers\LedController::class, 'index'])->name('led');
Route::get('/led/detil/{id}', [App\Http\Controllers\LedController::class, 'edit'])->name('editLed');
Route::post('/led/store', [App\Http\Controllers\LedController::class, 'store'])->name('addLed');
Route::post('/led/update', [App\Http\Controllers\LedController::class, 'update'])->name('updateLed');
Route::post('/led/delete', [App\Http\Controllers\LedController::class, 'destroy'])->name('deleteLed');

Route::post('/logout', [App\Http\Controllers\UserController::class, 'logout'])->name('logout');
