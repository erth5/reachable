<?php

use App\Http\Controllers\KernelController;
use App\Models\Address;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $addresses = Address::all();
    return view('index', compact('addresses'));
})->name('main');

Route::get('/kernel', [KernelController::class, 'run'])->name('kernel');
// Automatisieren
// Route::post('/', function(){
// });
