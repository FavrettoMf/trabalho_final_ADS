<?php

use App\Http\Controllers\AlunosController;
use App\Http\Controllers\DiciplinasController;
use App\Http\Controllers\LoginController;
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

/*

*/

Route::get('/', function () {
    return view('login');
});

Route::get('/welcome', function () {
    return view('welcome');
})->middleware('auth.basic');

Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);


Route::get('/alunos', [AlunosController::class, 'index'])->middleware('auth.basic');
Route::get('/alunos/novo', [AlunosController::class, 'create'])->middleware('auth.basic');
Route::post('/alunos/novo', [AlunosController::class, 'store'])->middleware('auth.basic');

Route::get('/alunos/editar/{id}', [AlunosController::class, 'edit'])->middleware('auth.basic');
Route::post('/alunos/editar/', [AlunosController::class, 'update'])->middleware('auth.basic');
Route::get('/alunos/delete/{id}', [AlunosController::class, 'destroy'])->middleware('auth.basic');

Route::get('/diciplinas', [DiciplinasController::class, 'index'])->middleware('auth.basic');
Route::get('/diciplinas/novo', [DiciplinasController::class, 'create'])->middleware('auth.basic');
Route::post('/diciplinas/novo', [DiciplinasController::class, 'store'])->middleware('auth.basic');

Route::get('/diciplinas/editar/{id}', [DiciplinasController::class, 'edit'])->middleware('auth.basic');
Route::post('/diciplinas/editar/', [DiciplinasController::class, 'update'])->middleware('auth.basic');
Route::get('/diciplinas/delete/{id}', [DiciplinasController::class, 'destroy'])->middleware('auth.basic');


