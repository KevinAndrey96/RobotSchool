<?php

use Illuminate\Support\Facades\Auth;
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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//ADMINISTRATORS
Route::get('/schools/create', [App\Http\Controllers\Schools\SchoolCreateController::class, 'create'])->middleware('auth');
Route::post('/schools/store', [App\Http\Controllers\Schools\SchoolStoreController::class, 'store'])->middleware('auth');
Route::get('/schools', [App\Http\Controllers\Schools\SchoolIndexController::class, 'index'])->middleware('auth');
Route::post('/changeStatusSchool', [App\Http\Controllers\Schools\SchoolChangeStatusController::class, 'changeStatusSchool'])->middleware('auth');
Route::get('/schools/edit/{id}', [App\Http\Controllers\Schools\SchoolEditController::class, 'edit'])->middleware('auth');
Route::post('/schools/update', [App\Http\Controllers\Schools\SchoolUpdateController::class, 'update'])->middleware('auth');
Route::post('/schools/delete', [App\Http\Controllers\Schools\SchoolDeleteController::class, 'delete'])->middleware('auth');

//COORDINATORS
Route::get('/coordinators/create', [App\Http\Controllers\Coordinators\CoordinatorsCreateController::class, 'create'])->middleware('auth');
Route::post('/coordinators/store', [App\Http\Controllers\Coordinators\CoordinatorsStoreController::class, 'store'])->middleware('auth');
Route::get('/coordinators', [App\Http\Controllers\Coordinators\CoordinatorsIndexController::class, 'index'])->middleware('auth');
Route::post('/changeStatusCoordinator', [App\Http\Controllers\Coordinators\CoordinatorsChangeStatusController::class, 'changeStatusCoordinator'])->middleware('auth');
Route::get('/coordinators/edit/{id}', [App\Http\Controllers\Coordinators\CoordinatorsEditController::class, 'edit'])->middleware('auth');
Route::post('/coordinators/update', [App\Http\Controllers\Coordinators\CoordinatorsUpdateController::class, 'update'])->middleware('auth');
Route::post('/coordinators/delete', [App\Http\Controllers\Coordinators\CoordinatorsDeleteController::class, 'delete'])->middleware('auth');


//CATEGORIES
Route::get('/categories/create', [App\Http\Controllers\Categories\CategoriesCreateController::class, 'create'])->middleware('auth');
Route::post('/categories/store', [App\Http\Controllers\Categories\CategoriesStoreController::class, 'store'])->middleware('auth');
Route::get('/categories', [App\Http\Controllers\Categories\CategoriesIndexController::class, 'index'])->middleware('auth');
Route::get('/categories/edit/{id}', [App\Http\Controllers\Categories\CategoriesEditController::class, 'edit'])->middleware('auth');
Route::post('/categories/update', [App\Http\Controllers\Categories\CategoriesUpdateController::class, 'update'])->middleware('auth');
Route::post('/categories/delete', [App\Http\Controllers\Categories\CategoriesDeleteController::class, 'delete'])->middleware('auth');


//SUBCATEGORIES
Route::get('/subcategories/create/{id}', [App\Http\Controllers\Subcategories\SubcategoriesCreateController::class, 'create'])->middleware('auth');
Route::post('/subcategories/store', [App\Http\Controllers\Subcategories\SubcategoriesStoreController::class, 'store'])->middleware('auth');
Route::get('/subcategories/{id}', [App\Http\Controllers\Subcategories\SubcategoriesIndexController::class, 'index'])->middleware('auth');
Route::get('/subcategories/edit/{id}', [App\Http\Controllers\Subcategories\SubcategoriesEditController::class, 'edit'])->middleware('auth');
Route::post('/subcategories/update', [App\Http\Controllers\Subcategories\SubcategoriesUpdateController::class, 'update'])->middleware('auth');
Route::post('/subcategories/delete', [App\Http\Controllers\Subcategories\SubcategoriesDeleteController::class, 'delete'])->middleware('auth');

//TEACHERS
Route::get('/teachers/create', [App\Http\Controllers\Teachers\TeachersCreateController::class, 'create'])->middleware('auth');
Route::post('/teachers/store', [App\Http\Controllers\Teachers\TeachersStoreController::class, 'store'])->middleware('auth');
Route::get('/teachers', [App\Http\Controllers\Teachers\TeachersIndexController::class, 'index'])->middleware('auth');

