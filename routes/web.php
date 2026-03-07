<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\EmployeeController;

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/Employee',[EmployeeController::class,'index'])->name('employee.index');
Route::get('/Employee/create',[EmployeeController::class,'create'])->name('employee.create');
Route::post('/Employee/store',[EmployeeController::class,'store'])->name('employee.store');
Route::get('/Employee/edit',[EmployeeController::class,'edit'])->name('employee.edit');
Route::put('/Employee/update',[EmployeeController::class,'update'])->name('employee.update');
Route::delete('/Employee/destroy',[EmployeeController::class,'destroy'])->name('employee.destroy');

Auth::routes(['register'=>false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
