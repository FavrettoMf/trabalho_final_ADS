<?php
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\VeiculosController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServicosController;
use App\Http\Controllers\Tipo_servicosController;
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
    return view('login');
});



Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::get('/dashboardGer', function () {
    return view('dashboardGer');
});


Route::get('/clientes', [ClientesController::class, 'index']);
Route::get('/clientes/novo', [ClientesController::class, 'create']);
Route::post('/clientes/novo', [ClientesController::class, 'store']);

Route::get('/clientes/editar/{id}', [ClientesController::class, 'edit']);
Route::post('/clientes/editar/', [ClientesController::class, 'update']);
Route::get('/clientes/delete/{id}', [ClientesController::class, 'destroy']);

Route::get('/veiculos', [VeiculosController::class, 'index']);
Route::get('/veiculos/novo', [VeiculosController::class, 'create']);
Route::post('/veiculos/novo', [VeiculosController::class, 'store']);


Route::get('/veiculos/editar/{id}', [VeiculosController::class, 'edit']);
Route::post('/veiculos/editar/', [VeiculosController::class, 'update']);
Route::get('/veiculos/delete/{id}', [VeiculosController::class, 'destroy']);

Route::get('/tipo_servicos', [Tipo_servicosController::class, 'index']);
Route::get('/tipo_servicos/novo', [Tipo_servicosController::class, 'create']);
Route::post('/tipo_servicos/novo', [Tipo_servicosController::class, 'store']);

Route::get('/tipo_servicos/editar/{id}', [Tipo_servicosController::class, 'edit']);
Route::post('/tipo_servicos/editar/', [Tipo_servicosController::class, 'update']);
Route::get('/tipo_servicos/delete/{id}', [Tipo_servicosController::class, 'destroy']);


Route::get('/servicos', [ServicosController::class, 'index']);
Route::get('/servicos/novo', [ServicosController::class, 'create']);
Route::post('/servicos/novo', [ServicosController::class, 'store']);
Route::get('/api/veiculos/{id_cliente}', [ClientesController::class, 'getVeiculos']);


Route::get('/servicos/editar/{id}', [ServicosController::class, 'edit']);
Route::put('servicos/update/{id}', [ServicosController::class, 'update'])->name('servicos.edit');
Route::get('/clientes/{id}/veiculos', [ClientesController::class, 'getVeiculos']);


Route::post('/servicos/editar/', [ServicosController::class, 'update']);
Route::get('/servicos/delete/{id}', [ServicosController::class, 'destroy']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
