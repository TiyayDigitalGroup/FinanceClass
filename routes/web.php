<?php

use App\Http\Controllers\ArchivoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\OptionController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\UserController;
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
    Route::post('/{codigo}/examen', [CursoController::class, 'enviarExamen'])->name('examen.enviar');
});

Route::resource('cursos.archivos', ArchivoController::class)->shallow();

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'admin'])->prefix('dashboard')->group(function () {
    Route::get('/', fn() => view('pages.dashboard.index'))->name('dashboard');
    Route::get('/usuarios', [UserController::class, 'index'])->name('dashboard.usuarios');
    Route::post('/usuarios', [UserController::class, 'store'])->name('dashboard.usuarios.store');
    Route::delete('/usuarios/{user}', [UserController::class, 'destroy'])->name('dashboard.usuarios.destroy');
    Route::get('/cursos', [CursoController::class, 'adminIndex'])->name('dashboard.cursos');
    Route::post('/cursos', [CursoController::class, 'store'])->name('dashboard.cursos.store');
    Route::delete('/cursos/{course}', [CursoController::class, 'destroy'])->name('dashboard.cursos.destroy');
    Route::post('/cursos/{course}/archivos', [ArchivoController::class, 'store'])->name('cursos.archivos.store');
    Route::delete('/archivos/{archivo}', [ArchivoController::class, 'destroy'])->name('archivos.destroy');
    Route::get('/examenes', [ExamController::class, 'index'])->name('dashboard.examenes');
    Route::post('/examenes', [ExamController::class, 'store'])->name('examenes.store');
    Route::delete('/examenes/{exam}', [ExamController::class, 'destroy'])->name('examenes.destroy');
    Route::get('/examenes/{curso}', [ExamController::class, 'show'])->name('dashboard.examenes.show');
    Route::post('/examenes/{curso}/preguntas', [QuestionController::class, 'store'])
        ->name('dashboard.examenes.preguntas.store');
    Route::delete('/preguntas/{pregunta}', [QuestionController::class, 'destroy'])
        ->name('dashboard.examenes.preguntas.destroy');
    Route::post('/preguntas/{pregunta}/opciones', [OptionController::class, 'store'])
        ->name('dashboard.examenes.opciones.store');
    Route::delete('/opciones/{opcion}', [OptionController::class, 'destroy'])
        ->name('dashboard.examenes.opciones.destroy');
});

Route::get('/simuladores', function () {
    return view('pages.simuladores');
})->name("simuladores");

Route::get('/planes', function () {
    return view('pages.planes');
})->name("planes");
