<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
Route::get('user', [AuthController::class, 'getUser'])->middleware('auth:api');


// Routes accessible by both admin and user
Route::middleware(['auth:api'])->group(function () 
{
    Route::get('get_books_list', [CustomerController::class, 'booksList']);
    // Add other common routes here if needed
});
// Admin Routes
Route::middleware(['auth:api', 'admin'])->group(function () 
{
    Route::post('add_book',[CustomerController::class, 'addBook']);
    Route::post('update_books',[CustomerController::class, 'updateBooks']);
    Route::post('delete_book/{book_id}',[CustomerController::class, 'deleteBook']);
    // Add more admin routes here

});



//User Routes here...
Route::middleware(['auth:api', 'user'])->group(function () 
{
    Route::post('borrow_book', [CustomerController::class, 'borrowBook']);
    Route::post('return_book', [CustomerController::class, 'returnBook']);
});