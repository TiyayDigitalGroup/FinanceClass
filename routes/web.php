<?php

use App\Http\Controllers\ArchivoController;
use App\Http\Controllers\CursoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.inicio');
})->name("inicio");

Route::prefix('cursos')->name('cursos.')->group(function () {
    Route::get('/', [CursoController::class, 'index'])->name('index');
    Route::get('/{codigo}', [CursoController::class, 'show'])->name('show');
    Route::get('/{codigo}/chat', [CursoController::class, 'chat'])->name('chat');
    Route::post('{codigo}/chat', [CursoController::class, 'responderChat'])->name('chat.responder');
    Route::get('/{codigo}/examen', [CursoController::class, 'examen'])->name('examen');
});


Route::resource('cursos.archivos', ArchivoController::class)->shallow();

Route::get('/simuladores', function () {
    return view('pages.simuladores');
})->name("simuladores");

Route::get('/planes', function () {
    return view('pages.planes');
})->name("planes");
