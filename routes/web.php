<?php

use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [NewsController::class,'dashboard'])->middleware(['auth'])->name('dashboard');

Route::get('/edit', function () {
    return view('edit');
})->name('edit');


Route::get('/create', [NewsController::class,'create'])->name('create');



Route::post('/create', [NewsController::class,'add'])->name('add');

Route::delete('/dashboard/{new}', [NewsController::class,'delete'])->name('erase');

Route::put('/dashboard/{news}', [NewsController::class,'update'])->name('update');

Route::get('/edit/{news}', [NewsController::class,'edit'])->name('edit');


require __DIR__.'/auth.php';
