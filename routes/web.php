<?php

use App\Http\Controllers\CiudadController;

Route::get('/', [CiudadController::class, 'index']);
Route::post('/clima-y-cambio', [CiudadController::class, 'getClimaYCambio']);

