<?php
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\HolidayController;
use App\Http\Controllers\DisciplinaryController;
use App\Http\Controllers\Leave_typeController;
use App\Http\Controllers\Leave_applyController;
use App\Http\Controllers\FileController;
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
Route::get('/exp', function () {
    return view('experience.index');
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
Route::resource('employee.education', EducationController::class);
Route::resource('employee.experience', ExperienceController::class);
Route::resource('employee.bank', BankController::class);
Route::resource('employee.document', FileController::class);
Route::resource('disciplinary', DisciplinaryController::class);
Route::resource('holiday', HolidayController::class);
Route::resource('leave_type', Leave_typeController::class);
Route::resource('leave_apply', Leave_applyController::class);
// Route::resource('countries.cities', 'CitiesController');
// Route::post('/education', [App\Http\Controllers\EducationController::class, 'store'])->name('education_tore');
// Route::get('/education/{id}', [App\Http\Controllers\EducationController::class, 'index'])->name('eduction_index');

    // Route::get('user-management/roles', [App\Http\Controllers\RoleController::class, 'index'])->name('roles.index');
    // Route::get('users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
  
    
    
    