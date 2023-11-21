<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SupportController;

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

Route::get('/supports/create', [SupportController::class, 'create'])->name('supports.create');
Route::get('/supports', [SupportController::class, 'index'])->name('supports.index');
Route::get('/supports/detail/{id}', [SupportController::class, 'detail'])->name('supports.detail');
Route::get('/supports/show/update/{id}', [SupportController::class, 'showUpdate'])->name('supports.showUpdate');

Route::put('/supports/update/{id}', [SupportController::class, 'update'])->name('supports.update');

Route::post('/supports', [SupportController::class, 'store'])->name('supports.store');

Route::delete('/supports/{id}', [SupportController::class, 'delete'])->name('supports.delete');

Route::get('/', function () {
    return view('welcome');
});
