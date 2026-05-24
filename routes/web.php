<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AuthController;

/*Route::get('/', function () {
    return redirect()->route('appointments.index');
});

// la ruta del recurso que contiene el CRUD
Route::resource('appointments', AppointmentController::class);*/

// rutas desprotegidas
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.store');
});

// rutas protegidas o privadas (solo usuarios autenticados)
Route::middleware('auth')->group(function () {
    
    // cierre de sesion
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // CRUD completo para Citas Médicas
    Route::resource('appointments', AppointmentController::class);
    
    // etapa de comentarios sobre la cita medica, solo del Doctor
    Route::put('/appointments/{appointment}/diagnose', [AppointmentController::class, 'diagnose'])->name('appointments.diagnose');
    
    // redirección por defecto
    Route::get('/', function () {
        return redirect()->route('appointments.index');
    });
});     