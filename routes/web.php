<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ElectionController;
use App\Http\Controllers\PartiController;
use App\Http\Controllers\CandidatController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PayrollController;
use Illuminate\Support\Facades\Auth;

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
    return view('auth.login');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//les routes accessibles seulemet si l'on est connecté.
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    //route pour l'espace admin
    Route::get('/admin',[Controller::class,'admin'])->name('admin');
    route::get('employeeView',[EmployeeController::class,'employeeView'])->name('employeeView');
    route::get('payrollView',[PayrollController::class,'payrollView'])->name('payrollView');
    route::get('user',[AuthenticatedSessionController::class,'store'])->name('mes_profiles.users_accueille');

    Route::get('/employeeView',[EmployeeController::class,'employeeView'])->name('employeeView');
    Route::post('/employee/nouveau',[EmployeeController::class,'createEmployee'])->name('nouveauemployee');
    Route::delete('/employee/{id}', [EmployeeController::class, 'destroy'])->name('employee.destroy');

    Route::get('/admin/payroll', [EmployeeController::class, 'adminPayrollView'])->name('admin.payroll');

   
});

require __DIR__ . '/auth.php';
