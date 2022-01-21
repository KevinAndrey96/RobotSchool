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
Route::post('/changeStatusTeacher', [App\Http\Controllers\Teachers\TeachersChangeStatusController::class, 'changeStatusTeacher'])->middleware('auth');
Route::get('/teachers/edit/{id}', [App\Http\Controllers\Teachers\TeachersEditController::class, 'edit'])->middleware('auth');
Route::post('/teachers/update', [App\Http\Controllers\Teachers\TeachersUpdateController::class, 'update'])->middleware('auth');
Route::post('/teachers/delete', [App\Http\Controllers\Teachers\TeachersDeleteController::class, 'delete'])->middleware('auth');

//CLASSROOMS
Route::get('/classrooms/create', [App\Http\Controllers\Classrooms\ClassroomsCreateController::class, 'create'])->middleware('auth');
Route::post('/classrooms/store', [App\Http\Controllers\Classrooms\ClassroomsStoreController::class, 'store'])->middleware('auth');
Route::get('/classrooms', [App\Http\Controllers\Classrooms\ClassroomsIndexController::class, 'index'])->middleware('auth');
Route::get('/classrooms/edit/{id}', [App\Http\Controllers\Classrooms\ClassroomsEditController::class, 'edit'])->middleware('auth');
Route::post('/classrooms/update', [App\Http\Controllers\Classrooms\ClassroomsUpdateController::class, 'update'])->middleware('auth');
Route::post('/classrooms/delete', [App\Http\Controllers\Classrooms\ClassroomsDeleteController::class, 'delete'])->middleware('auth');

//STUDENTS
Route::get('/students/create', [App\Http\Controllers\Students\StudentsCreateController::class, 'create'])->middleware('auth');
Route::post('/students/store', [App\Http\Controllers\Students\StudentsStoreController::class, 'store'])->middleware('auth');
Route::post('/students/finalSave', [App\Http\Controllers\Students\StudentsFinalStoreController::class, 'finalStore'])->middleware('auth');
Route::get('/students/{id}', [App\Http\Controllers\Students\StudentsIndexController::class, 'index'])->middleware('auth');
Route::get('/students/edit/{id}', [App\Http\Controllers\Students\StudentsEditController::class, 'edit'])->middleware('auth');
Route::post('/students/update', [App\Http\Controllers\Students\StudentsUpdateController::class, 'update'])->middleware('auth');
Route::post('/students/delete', [App\Http\Controllers\Students\StudentsDeleteController::class, 'delete'])->middleware('auth');
Route::get('/transfers', [App\Http\Controllers\Students\StudentsTransfersIndexController::class, 'transfers'])->middleware('auth');
Route::post('/studentsClassroomUpdate', [App\Http\Controllers\Students\StudentsClassroomUpdateController::class, 'classroomUpdate'])->middleware('auth');

//HOMEWORKS
Route::get('/homeworks/create/{id}', [App\Http\Controllers\Homeworks\HomeworksCreateController::class, 'create'])->middleware('auth');
Route::post('/homeworks/store', [App\Http\Controllers\Homeworks\HomeworksStoreController::class, 'store'])->middleware('auth');
Route::get('/homeworks/{id}', [App\Http\Controllers\Homeworks\HomeworksIndexController::class, 'index'])->middleware('auth');
Route::get('/homeworks/edit/{id}/{classroom_id}', [App\Http\Controllers\Homeworks\HomeworksEditController::class, 'edit'])->middleware('auth');
Route::post('/homeworks/update', [App\Http\Controllers\Homeworks\HomeworksUpdateController::class, 'update'])->middleware('auth');
Route::post('/homeworks/delete', [App\Http\Controllers\Homeworks\HomeworksDeleteController::class, 'delete'])->middleware('auth');

//UPLOADED_HOMEWORKS
Route::get('/uploadedHomeworks/{id}', [App\Http\Controllers\UploadedHomeworks\UploadedHomeworksIndexController::class, 'index'])->middleware('auth');
Route::post('/uploadedHomeworks/changeScores', [App\Http\Controllers\UploadedHomeworks\UploadedHomeworksChangeScoresController::class, 'changeScores'])->middleware('auth');
Route::get('/myHomeworks', [App\Http\Controllers\UploadedHomeworks\MyHomeworksUploadedHomeworksController::class, 'myHomeworks'])->middleware('auth');
Route::get('/detailMyHomework/{id}', [App\Http\Controllers\UploadedHomeworks\DetailMyHomeworksUploadedHomeworksController::class, 'detailMyHomework'])->middleware('auth');
Route::post('/uploadMyHomework', [App\Http\Controllers\UploadedHomeworks\UploadMyHomeworkUploadedHomeworksController::class, 'uploadMyHomework'])->middleware('auth');

//PROJECTS
Route::get('/myCategories', [App\Http\Controllers\Projects\MyCategoriesProjectsController::class, 'myCategories'])->middleware('auth');
Route::get('/mySubcategories/{id}', [App\Http\Controllers\Projects\MySubcategoriesProjectsController::class, 'mySubcategories'])->middleware('auth');
Route::get('/project/create/{id}', [App\Http\Controllers\Projects\CreateProjectsController::class, 'create'])->middleware('auth');
Route::post('/project/store', [App\Http\Controllers\Projects\StoreProjectsController::class, 'store'])->middleware('auth');
Route::get('/projects', [App\Http\Controllers\Projects\indexProjectsController::class, 'index'])->middleware('auth');
Route::get('/detailProject/{id}', [App\Http\Controllers\Projects\DetailProjectProjectsController::class, 'detailProject'])->middleware('auth');
Route::get('/showDocument/{id}', [App\Http\Controllers\Projects\ShowDocumentProjectsController::class, 'showDocument'])->middleware('auth');
Route::post('/changeStatusProject', [App\Http\Controllers\Projects\ChangeStatusProjectsController::class, 'changeStatus'])->middleware('auth');
