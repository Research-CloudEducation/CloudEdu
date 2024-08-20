<?php

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AgentController;
use App\Http\Controllers\Admin\ClassLevelController;
use App\Http\Controllers\Admin\SchoolController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\AgentController as ControllersAgentController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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
require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('welcome');
});

// routes/web.php



Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ //...
        Route::get('agent/login' , [ControllersAgentController::class , 'createSession'] )->name('agent.createSession');
        Route::post('agent/login' , [ControllersAgentController::class , 'login'] )->name('agent.login');
        Route::middleware('auth' , 'admin')->name('admin.')->prefix('admin')->group(function () {
            Route::get('/' , [AdminController::class , 'index'])->name('index');
            Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


            // manage schools routes
            Route::resource('/schools' , SchoolController::class)->except('destroy');
            // Route::get('school/', [SchoolController::class , 'index'])->name('school.index');
            // Route::get('school/create', [SchoolController::class , 'create'])->name('school.create');
            // Route::post('school/store', [SchoolController::class , 'store'])->name('school.store');
            // Route::get('school/edit/{id}', [SchoolController::class , 'edit'])->name('school.edit');
            // Route::patch('school/update/{id}', [SchoolController::class , 'update'])->name('school.update');
            Route::get('school/destroy-school/{id}', [SchoolController::class , 'destroy'])->name('schools.destroy');
            // manage Agents route 

            Route::resource('agents', AgentController::class)->except('destroy');
            Route::get('agents/{id}/destroy' , [AgentController::class , 'destroy'])->name('agents.destroy');            
            // manage teachers routes 
            Route::resource('/teachers' , TeacherController::class)->except('destroy');
            Route::get('teachers/destroy-teacher/{id}' , [TeacherController::class , 'destroy'])->name('teachers.destroy');

            // manage class level routes

            Route::resource('/class-level' , ClassLevelController::class)->except('destroy');

            Route::get('class-level/{id}/destroy' , [ClassLevelController::class , 'destroy'])->name('class-level.destroy');

            // manage students routes 

            Route::resource('/students' , StudentController::class)->except('destroy');

            Route::get('students/{id}/destroy' , [StudentController::class , 'destroy'])->name('students.destroy');
        });

    });
/** OTHER PAGES THAT SHOULD NOT BE LOCALIZED **/

// Route::get('/dashboard', function () {
//     return view('admin.index');
// })->middleware(['auth', 'verified' ])->name('dashboard');

// Route::middleware('auth' , 'admin')->name('admin.')->prefix('admin')->group(function () {
//     Route::get('/' , [AdminController::class , 'index'])->name('index');
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

