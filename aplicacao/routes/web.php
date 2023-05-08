<?php

use App\Http\Controllers\SensorController;
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


Route::get('/sensor10', [SensorController::class, 'ultimosDez'])->name('sensor.ultimos-dez');
Route::get('/atualiza-dados',[SensorController::class, 'atualizaDados']);