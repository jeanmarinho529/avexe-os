<?php

use App\Livewire\Clients\{Client, Index};
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

Route::prefix('clientes')->group(function () {
    Route::get('/', Index::class)->name("clients.index");
    Route::get('/cadastar', Client::class)->name("clients.create");
    Route::get('/{client}/editar', Client::class)->name("clients.edit");
});
