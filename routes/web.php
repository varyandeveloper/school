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
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('/', 'HomeController@index')->name('home');

Route::middleware(['auth', 'role:admin'])
    ->namespace('Admin')
    ->group(function (\Illuminate\Routing\Router $router) {
        $router->resource('schedules', 'Schedule\ScheduleController');
        $router->resource('teachers', 'Teacher\TeacherController');
        $router->resource('students', 'Student\StudentController');
        $router->resource('classes', 'Classes\ClassController');
        $router->resource('subjects', 'Subject\SubjectController');
});
