<?php

use App\Http\Controllers\AboutusController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\UserController;
use App\Models\Content;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

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

Route::get('/login', [LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/signup', [SignupController::class, 'index']);
Route::post('/signup', [SignupController::class, 'store']);

Route::get('/index', [HomeController::class, 'index']);
Route::get('/', [HomeController::class, 'index']);

Route::get('/aboutus', [AboutusController::class, 'index']);

Route::get('/user', [UserController::class, 'index']);

Route::get('/detail/{id}', [DetailController::class, 'index']);
Route::post('/detail/{id}', [DetailController::class, 'enroll']);

Route::get('/course', [CourseController::class, 'index']);
