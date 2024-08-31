<?php

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AgentController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SchoolController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\ClassLevelController;
use App\Http\Controllers\Admin\ContentControllrt;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\AgentController as ControllersAgentController;
use App\Http\Controllers\CategoryController as ControllersCategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\GetContentController;
use App\Http\Controllers\GetTeacherController;
use App\Http\Controllers\StudentController as ControllersStudentController;
use App\Http\Controllers\TeacherController as ControllersTeacherController;

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
        // home routes 
        Route::get('/', function () {
            return view('home.index');
        });
        // sessions
        Route::view('sessions/signIn', 'sessions.signIn')->name('signIn');
        Route::view('sessions/signIn-teacher', 'sessions.signIn-teacher')->name('signInTeacher');
        Route::view('sessions/signUp', 'sessions.signUp')->name('signUp-student');
        Route::view('sessions/signUp-teacher', 'sessions.signUp-teacher')->name('signUp');
        Route::view('sessions/forgot', 'sessions.forgot')->name('forgot');
        // profile page  route 
        Route::view('sessions/user-profile', 'sessions.user-profile')->name('userProfile');
        Route::view('sessions/teacher-profile', 'sessions.teacher-profile')->name('teacherProfile');
        Route::view('sessions/student-profile', 'sessions.student-profile')->name('studentProfile');

        // manage student side homepage routes
        Route::resource('/students' , ControllersStudentController::class);
        Route::post('/SignIn-student', [ControllersStudentController::class,'signIn'])->name('students.signIn');
        Route::get('/student/profile', [ControllersStudentController::class,'profile'])->name('students.profile');
        Route::get('/students', [ControllersStudentController::class , 'logout'])->name('students.signOut');
        // manage teacher side homepage route
        Route::resource('/teachers' , ControllersTeacherController::class);
        Route::resource('/teachers-index' , GetTeacherController::class);
        Route::post('/SignIn', [ControllersTeacherController::class,'signIn'])->name('teacherSignIn');
        Route::get('/teacher/profile', [ControllersTeacherController::class,'profile'])->name('teacher.profile');
        // Route::get('/teachers/login' , [ControllersTeacherController::class , 'signIn'])->name('teachers.signIn');
        Route::get('/teachers' , [ControllersTeacherController::class , 'logout'])->name('teachers.signOut');

        // manage category routes 
        Route::resource('/categories', ControllersCategoryController::class);

        Route::resource('/get-contents' , GetContentController::class);
        Route::get('/get-contents/content/{id}' , [GetContentController::class , 'getContent'])->name('get-content');

        // comments routes 
        Route::resource('/comments' , CommentController::class);
        Route::get('/chat' , function(){
            return view('home.chat');
        })->name('chat.student');

        Route::middleware(['auth'])->name('admin.')->prefix('admin')->group(function () {
            Route::resource('users', profileController::class);
            Route::resource('roles', RoleController::class);
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

            // manage subjects routes 
            Route::resource('/categories' , CategoryController::class)->except('destroy');
            Route::get('categories/{id}/destroy' , [CategoryController::class , 'destroy'])->name('categories.destroy');
            // manage content routes 
            Route::resource('/contents', ContentControllrt::class)->except('destroy');
            Route::get('/contents/{id}/destroy', [ContentControllrt::class , 'destroy'])->name('contents.destroy');

            // get content by class level using Ajax 
            Route::get('/get-content-by-classLevel' , [ContentControllrt::class , 'getContentBy'])->name('contents.getContentBy');
            // manage students routes 

            Route::resource('/students' , StudentController::class)->except('destroy');

            Route::get('students/{id}/destroy' , [StudentController::class , 'destroy'])->name('students.destroy');
            Route::get('students/{id}/approve' , [StudentController::class , 'approve'])->name('students.approve');
        });

        // manage routes of agents of schools 
        // Route::middleware('agent')->name('agent.')->prefix('agent')->group( function () {
        //      // manage teachers routes 
        //      Route::get('/' , function() {
        //         return 'this it\'s work';
        //      })->name('test');
        //      Route::resource('/teachers' , TeacherController::class)->except('destroy');
        //      Route::get('teachers/destroy-teacher/{id}' , [TeacherController::class , 'destroy'])->name('teachers.destroy');
        //      // manage students routes 

        //      Route::resource('/students' , StudentController::class)->except('destroy');

        //      Route::get('students/{id}/destroy' , [StudentController::class , 'destroy'])->name('students.destroy');
        // });
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

