<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DragDropController;
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


Route::get('/', [EmployeeController::class, 'index']);

Route::post('/store', [EmployeeController::class, 'store'])->name('store');


Route::get('/fetchall', [EmployeeController::class, 'fetchAll'])->name('fetchAll');


Route::delete('/delete', [EmployeeController::class, 'delete'])->name('delete');
Route::get('/edit', [EmployeeController::class, 'edit'])->name('edit');
Route::post('/update', [EmployeeController::class, 'update'])->name('update');







Route::get('drag_drop', [DragDropController::class, 'DragAndDrop'])->name('drag_drop');



//Route::get('Custom','App\Http\Controllers\ordersController@index');
Route::post('Custom_sortable',[DragDropController::class,'updateDrag'])->name('Custom_sortable');

//Register Employee 

Route::post('register',[EmployeeController::class, 'Register'])->name('register');








// Route::get('post','App\Http\Controllers\PostController@index');
// Route::post('post-sortable','App\Http\Controllers\PostController@update');