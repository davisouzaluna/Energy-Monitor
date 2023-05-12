<?php

use App\Http\Controllers\DeviceController;
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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/',function() {
    return view('index');
})->name('principal.index');

Route::get('/sensor10', [SensorController::class, 'ultimosDez'])->name('sensor.ultimos-dez');
Route::get('/atualiza-dados',[SensorController::class, 'atualizaDados']);


Route::delete('/device/{id}',[DeviceController::class,'destroy'])->name('device.destroy');
Route::get('/device', [DeviceController::class, 'index'])->name('device.index');
Route::get('/criar/dispositivo', [DeviceController::class, 'create'])->name('device.create');
Route::post('/device/salvar', [DeviceController::class, 'store'])->name('device.store');
Route::put('/device/editar', [DeviceController::class, 'store'])->name('device.store');
Route::get('/device/{id}/edit',[DeviceController::class,'edit'])->name('device.edit');
Route::put('/device/{id}', [DeviceController::class,'update'])->name('device.update');




