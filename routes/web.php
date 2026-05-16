<?php

use App\Http\Controllers\PortofolioController;
use Illuminate\Support\Facades\Route;

// Pastikan rute utama '/' mengarah ke PortofolioController, bukan ke fungsi Closure kosong
Route::get('/', [PortofolioController::class, 'index']);
