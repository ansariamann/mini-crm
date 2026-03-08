<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CompanyController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/Employee',[EmployeeController::class,'index'])->name('employee.index');
Route::get('/Employee/create',[EmployeeController::class,'create'])->name('employee.create');
Route::post('/Employee/store',[EmployeeController::class,'store'])->name('employee.store');
Route::get('/Employee/{employee}/edit',[EmployeeController::class,'edit'])->name('employee.edit');
Route::put('/Employee/{employee}/update',[EmployeeController::class,'update'])->name('employee.update');
Route::delete('/Employee/{employee}/destroy',[EmployeeController::class,'destroy'])->name('employee.destroy');
Route::get('/Employee/{employee}',[EmployeeController::class,'show'])->name('employee.show');

Route::resource('companies', CompanyController::class);

Auth::routes(['register'=>false]);

Route::get('/home', function () {
    return redirect()->route('company.index');
})->name('home');


Route::get('/company',[CompanyController::class,'index'])->name('company.index');
Route::get('/company/create',[CompanyController::class,'create'])->name('company.create');

Route::post('/company/store',[CompanyController::class,'store'])->name('company.store');
Route::get('/company/{company}/employees',[CompanyController::class,'showEmployees'])->name('company.showEmployees');
Route::get('/company/{company}/edit',[CompanyController::class,'edit'])->name('company.edit');
Route::put('/company/{company}/update',[CompanyController::class,'update'])->name('company.update');
Route::delete('/company/{company}/destroy',[CompanyController::class,'destroy'])->name('company.destroy');
Route::get('/company/{company}',[CompanyController::class,'show'])->name('company.show');
