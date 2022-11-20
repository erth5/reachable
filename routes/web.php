<?php

use App\Models\Address;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $addresses = Address::all();
    return view('index', compact('addresses'));
})->name('main');

// Automatisieren
// Route::post('/', function(){
// });
