<?php

use App\Models\Billboard;
use App\Models\Jpo;
use App\Models\Led;
use App\Models\Proyek;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    // if (Auth::check()) {
    //     return view('admin.index');
    // } else {

    // }

    $bill = Billboard::all();
    $jpo = Jpo::all();
    $led = Led::all();
    $pro = Proyek::cursorPaginate(9);
    $data = [
        'bill' => $bill,
        'jpo' => $jpo,
        'led' => $led,
        'proyek' => $pro
    ];

    return view('landing', compact('data'));
});

Route::get('/detil/{type}/{id}', function ($type, $id) {
    switch ($type) {
        case 'jpo':
            $d = Jpo::findOrFail($id);
            break;
        case 'led':
            $d = Led::findOrFail($id);
            break;
        case 'billboard':
            $d = Billboard::findOrFail($id);
            break;
    }
    return view('detil', compact('d'));
})->name('detil');
Route::post('/kirim/email', [App\Http\Controllers\publicController::class, 'sendEmail'])->name('sendEmail');


// Auth::routes();
Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);
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

Route::get('/proyek', [App\Http\Controllers\ProyekController::class, 'index'])->name('proyek');
Route::post('/proyek/store', [App\Http\Controllers\ProyekController::class, 'store'])->name('addProyek');
Route::post('/proyek/update', [App\Http\Controllers\ProyekController::class, 'update'])->name('updateProyek');
Route::post('/proyek/delete', [App\Http\Controllers\ProyekController::class, 'destroy'])->name('deleteProyek');

Route::post('/logout', [App\Http\Controllers\UserController::class, 'logout'])->name('logout');
