<?php
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\PayrolController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HolidayController;
use App\Http\Controllers\DisciplinaryController;
use App\Http\Controllers\Leave_typeController;
use App\Http\Controllers\LogisticController;
use App\Http\Controllers\LogsupportController;
use App\Http\Controllers\Leave_applyController;
use App\Http\Controllers\Leave_earnController;
use App\Http\Controllers\LeaveViewController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\DeductionController;
use App\Http\Controllers\Loan_installController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\taskController;
use App\Http\Controllers\BenefitController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\FieldController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\AssetListController;
use App\Http\Controllers\Password_ResetController;
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
    return view('auth.login');
});
Route::get('/employee_edit',function () {
    return view('employee_edit');
});
Auth::routes(['register'=>true]);


Auth::routes();
Route::middleware(['auth', 'must-change-password'])->group(function () {
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/forgot-password', function () {
    return view('auth.reset');
})->middleware(['guest'])->name('password.request');




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
Route::resource('deduction', DeductionController::class);
Route::resource('benefit', BenefitController::class);
Route::resource('payrol', PayrolController::class);
Route::resource('setting', SettingController::class);
Route::resource('notice', NoticeController::class);
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
Route::resource('leave_earn', Leave_earnController::class);
Route::resource('project', ProjectController::class);
Route::resource('task', TaskController::class);
Route::resource('asset', AssetController::class);
Route::resource('assetlist', AssetListController::class);
Route::resource('field', FieldController::class);
Route::resource('logistic', LogisticController::class);
Route::resource('logsupport', LogsupportController::class);
Route::resource('loan', LoanController::class);
Route::resource('leave', LeaveViewController::class);
Route::resource('loan.employee.loan_installment', Loan_installController::class);
Route::get('/approve/{id}', [App\Http\Controllers\Leave_applyController::class, 'approve'])->name('leave.approve');
Route::get('/decline/{id}', [App\Http\Controllers\Leave_applyController::class, 'decline'])->name('leave.decline');
Route::get('/approved/{id}', [App\Http\Controllers\FieldController::class, 'approved'])->name('field.approved');
Route::get('/declined/{id}', [App\Http\Controllers\FieldController::class, 'declined'])->name('field.declined');
Route::get('file/{id}/download', [App\Http\Controllers\NoticeController::class, 'download'])->name('file.download');
Route::get('file/{id}/download', [App\Http\Controllers\HomeController::class, 'download'])->name('file.download');
Route::get('/changePassword', [App\Http\Controllers\Password_ResetController::class, 'ResetPassword'])->name('changePasswordGet');
Route::post('/changePassword', [App\Http\Controllers\Password_ResetController::class, 'changePasswordPost'])->name('changePasswordPost');
// Route::resource('countries.cities', 'CitiesController');
// Route::post('/education', [App\Http\Controllers\EducationController::class, 'store'])->name('education_tore');
// Route::get('/education/{id}', [App\Http\Controllers\EducationController::class, 'index'])->name('eduction_index');

    // Route::get('user-management/roles', [App\Http\Controllers\RoleController::class, 'index'])->name('roles.index');
    // Route::get('users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
  
    
    
    