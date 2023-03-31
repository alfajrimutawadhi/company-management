<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CrewController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PayrollController;
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


Route::get('/', [PagesController::class, 'index'])->middleware(['auth_session']);
Route::get('/login', [PagesController::class, 'login']);
Route::get('/register', [PagesController::class, 'register']);
Route::get('/payroll', [PagesController::class, 'payroll']);
Route::get('/project', [PagesController::class, 'project']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::get('crew/print', [CrewController::class, 'print']);
Route::resource('crew', CrewController::class);

Route::resource('finance', FinanceController::class);

Route::post('/payroll', [PayrollController::class, 'payroll']);
