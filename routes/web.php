<?php
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EducationController;
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

Route::get('/',function () {
    return view('welcome');
});
Route::get('/employee_edit',function () {
    return view('employee_edit');
});
Auth::routes(['register'=>true]);


Auth::routes();
Route::middleware(['auth'])->group(function () {
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'employee_total'])



// Route::get('dashboard', 'App\Http\Controllers\UserController@dashboard')->middleware('auth');
Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::prefix('user-management')->group(function(){
         Route::resource('roles', 'App\Http\Controllers\RoleController' , ['except' => ['show', 'create']]);
         Route::put('users/roles/{user}', [App\Http\Controllers\UserController::class, 'updateRole'])->name('users.roles.update');
         Route::resource('users', UserController::class);
     });
    
    });

Route::resource('department', DepartmentController::class);
Route::resource('designation', DesignationController::class);
Route::resource('employee', EmployeeController::class);
Route::resource('education', EducationController::class);



    // Route::get('user-management/roles', [App\Http\Controllers\RoleController::class, 'index'])->name('roles.index');
    // Route::get('users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
  
    
    
    