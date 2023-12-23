<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\TablerController;
use App\Http\Controllers\Admin\StudentController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth', 'role:admin'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/departments/show', [AdminController::class, 'showDepartments'])->name('showDepartments');
    Route::get('/departments/create', [AdminController::class, 'createDepartment'])->name('createDepartment');

    Route::get('/courses/show', [AdminController::class, 'showCourses'])->name('showCourses');
    Route::get('/courses/create', [AdminController::class, 'createCourse'])->name('createCourse');

    Route::get('/units/show', [AdminController::class, 'showUnits'])->name('showUnits');
    Route::get('/units/create', [AdminController::class, 'createUnit'])->name('createUnit');

    Route::get('lecturers/show', [AdminController::class, 'showLecturers'])->name('showLecturers');
    Route::get('lecturers/create', [AdminController::class, 'createLecturer'])->name('createLecturer');



});


Route::middleware(['auth', 'role:tabler'])->name('tabler.')->prefix('tabler')->group(function () {
    Route::get('/dashboard', [TablerController::class, 'dashboard'])->name('dashboard');

    Route::get('/classrooms/show', [TablerController::class, 'showClassrooms'])->name('showClassrooms');
    Route::get('/classrooms/create', [TablerController::class, 'createClassroom'])->name('createClassroom');

    Route::get('/days/show', [TablerController::class, 'showDays'])->name('showDays');
    Route::get('/days/create', [TablerController::class, 'createDay'])->name('createDay');


    Route::get('/timeslots/show', [TablerController::class, 'showTimeslots'])->name('showTimeslots');
    Route::get('/timeslots/create', [TablerController::class, 'createTimeslot'])->name('createTimeslot');


    Route::get('/timetables/show', [TablerController::class, 'showTimetables'])->name('showTimetables');
    Route::get('/timetables/create', [TablerController::class, 'createTimetable'])->name('createTimetable');
});


Route::middleware(['auth', 'role:student'])->name('student.')->prefix('student')->group(function () {
    Route::get('/dashboard', [StudentController::class, 'dashboard'])->name('dashboard');
});
