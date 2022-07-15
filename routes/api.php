<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\BookController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);    
});

// Authors Api
Route::get('Authors', [AuthorController::class, 'index']);
Route::get('Authors/{id}', [AuthorController::class, 'show']);
Route::post('Authors', [AuthorController::class, 'store']);
Route::put('Authors/{id}', [AuthorController::class, 'update']);
Route::delete('Authors/{id}', [AuthorController::class, 'delete']);

// categories Api
Route::get('categories', [CategoriesController::class, 'index']);
Route::get('categories/{id}', [CategoriesController::class, 'show']);
Route::post('categories', [CategoriesController::class, 'store']);
Route::put('categories/{id}', [CategoriesController::class, 'update']);
Route::delete('categories/{id}', [CategoriesController::class, 'delete']);

// Book Api
Route::get('Book', [BookController::class, 'index']);
Route::get('Book/{id}', [BookController::class, 'show']);
Route::post('Book', [BookController::class, 'store']);
Route::put('Book/{id}', [BookController::class, 'update']);
Route::delete('Book/{id}', [BookController::class, 'delete']);

//Relationship
Route::get('/Authors1/{id}/Books', [AuthorController::class, 'show1']);
Route::get('/Books1/{id}/Authors', [BookController::class, 'show1']);

Route::get('/category1/{id}/Books', [CategoriesController::class, 'show1']);
Route::get('/Books1/{id}/category', [BookController::class, 'show2']);

