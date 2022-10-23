<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;

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

Route::get('/', [PatientController::class, 'index'])->name('home');
Route::get('/patients/create', [PatientController::class, 'create']);
Route::post('/patients/post', [PatientController::class, 'store']);
Route::put('/patients/{id}', [PatientController::class, 'update']);
Route::get('/patients/{id}', [PatientController::class, 'show']);
Route::get('/patients/edit/{id}', [PatientController::class, 'edit']);

Route::get('/doctors', [DoctorController::class, 'index'])->name('doctors');
Route::get('/doctors/{id}', [DoctorController::class, 'show']);