<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConsoleController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\TypesController;

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

$NUMERICS = '[0-9]+';

Route::get('/', function () {
    return view('welcome');
});

// Dashboard and authentication
Route::get('/console/dashboard', [ConsoleController::class, 'dashboard'])->middleware('auth');
Route::get('/console/login', [ConsoleController::class, 'loginForm'])->middleware('guest')->name('login');
Route::post('/console/login', [ConsoleController::class, 'login'])->middleware('guest');
Route::get('/console/logout', [ConsoleController::class, 'logout'])->middleware('auth');

// Types
Route::get('/console/types/list', [TypesController::class, 'list'])->middleware('auth');
Route::get('/console/types/delete/{type:id}', [TypesController::class, 'delete'])->
    where('type', $NUMERICS)->middleware('auth');
Route::get('/console/types/create', [TypesController::class, 'create'])->middleware('auth');
Route::post('/console/types/create', [TypesController::class, 'store'])->middleware('auth');
Route::get('/console/types/edit/{type:id}', [TypesController::class, 'edit'])->
    where('type', $NUMERICS)->middleware('auth');
Route::post('/console/types/edit/{type:id}', [TypesController::class, 'update'])->
    where('type', $NUMERICS)->middleware('auth');

// Projects
// Fields:
//     title
//     type_id
//     url
//     slug
//     image
//     content
//     user_id
Route::get('/console/projects/list', [ProjectsController::class, 'list'])->middleware('auth');
Route::get('/console/projects/delete/{project:id}', [ProjectsController::class, 'delete'])->
    where('project', $NUMERICS)->middleware('auth');
Route::get('/console/projects/create', [ProjectsController::class, 'create'])->middleware('auth');
Route::post('/console/projects/create', [ProjectsController::class, 'store'])->middleware('auth');
Route::get('/console/projects/edit/{project:id}', [ProjectsController::class, 'edit'])->
    where('project', $NUMERICS)->middleware('auth');
Route::put('/console/projects/edit/{project:id}', [ProjectsController::class, 'update'])->
    where([
        'title' => 'required|min:3|max:255',
        'type_id' => 'required|exists:types,id',
        'url' => 'required|url',
        'slug' => 'required|min:3|max:255|unique:projects,slug',
        'image' => 'url',
        'content' => 'required|min:3|max:65535',
        'user_id' => 'required|exists:users,id'
    ])->middleware('auth');
