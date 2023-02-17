<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewTradeController;
use App\Http\Controllers\Controller;

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

Route::get('/', [Controller::class, 'index'])->name('index');

Route::post('/new-trade', [NewTradeController::class, 'create'])->name('new-trade');
