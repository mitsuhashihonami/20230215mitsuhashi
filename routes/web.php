<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

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

Route::get('/home', [TodoController::class, 'index'])->name('todo.index');
Route::post('/create', [TodoController::class, 'create'])->name('todo.create');
Route::get('/find', [TodoController::class, 'find'])->name('todo.find');
Route::post('/find', [TodoController::class, 'search'])->name('todo.search');
Route::post('/update/{id}', [TodoController::class, 'update'])->name('todo.update');
Route::post('/delete/{id}', [TodoController::class, 'delete'])->name('todo.delete');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return redirect('/home');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
