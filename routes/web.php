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
use App\Http\Controllers\LoanViewController;
use App\Http\Controllers\PerdeimController;
use App\Http\Controllers\PerdeimViewController;
use App\Http\Controllers\PerdeimRetireViewController;
use App\Http\Controllers\PerdeimretireController;
use App\Http\Controllers\DeductionController;
use App\Http\Controllers\Loan_installController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\taskController;
use App\Http\Controllers\BenefitController;
use App\Http\Controllers\ManagerDashboard;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\EmployeeDeductionController;
use App\Http\Controllers\EmployeeBenefitController;
use App\Http\Controllers\PerformanceController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\FieldController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\WorkOverTimeController;
use App\Http\Controllers\AssetListController;
use App\Http\Controllers\RateController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\EmployeeAssetController;
use App\Http\Controllers\ViewRoomController;
use App\Http\Controllers\EmployeeBookController;
use App\Http\Controllers\ManagerAloneController;
use App\Http\Controllers\PerformanceView;
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

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/employee_edit', function () {
    return view('employee_edit');
});
// Auth::routes(['register' => true]);


Auth::routes(['register' => false]);
// Route::get('/forgot-password', function () {
//     return view('auth.reset');
// })->middleware(['guest'])->name('password.request');

Route::middleware(['auth', 'must-change-password'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




    // Route::get('dashboard', 'App\Http\Controllers\UserController@dashboard')->middleware('auth');
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // });
    Route::get('/exp', function () {
        return view('experience.index');
    });
    Route::prefix('user-management')->group(function () {
        Route::resource('roles', 'App\Http\Controllers\RoleController', ['except' => ['show', 'create']]);
        Route::put('users/roles/{user}', [App\Http\Controllers\UserController::class, 'updateRole'])->name('users.roles.update');
        Route::resource('users', UserController::class);
    });
    Route::get('/dashboard', [App\Http\Controllers\ManagerDashboard::class, 'index'])->name('dashboard');
    Route::resource('performance', PerformanceController::class);
    Route::get('performance/{id}/average', [App\Http\Controllers\PerformanceController::class, 'RateAverage'])->name('rate.average');
    Route::resource('performance.rate', RateController::class);
    Route::resource('work-overtime', WorkOverTimeController::class);
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

    Route::group(['prefix' => '/asset-list/{assetlist}', 'as' => 'assetlist.'], function () {
        Route::get('/depreciation-list', [AssetListController::class, 'viewDepreciation'])->name('view.depreciation');
        Route::get('/depreciation', [AssetListController::class, 'addDepreciation'])->name('add.depreciation');
        Route::get('/returned/{employee}', [EmployeeAssetController::class, 'returned'])->name('employee.returned');
        Route::resource('employee', EmployeeAssetController::class);

    });
    Route::resource('assetlist', AssetListController::class);
    Route::resource('field', FieldController::class);
    Route::resource('logistic', LogisticController::class);
    Route::resource('logsupport', LogsupportController::class);
    Route::resource('salary', SalaryController::class);
    Route::resource('loan', LoanController::class);
    Route::resource('loan-apply', LoanViewController::class);
    Route::resource('perdeim', PerdeimController::class);
    Route::resource('perdeim-employee', PerdeimViewController::class);
    Route::resource('leave', LeaveViewController::class);
    Route::resource('loan.loan_installment', Loan_installController::class);
    Route::resource('perdeim.perdeimretire', PerdeimretireController::class);
    Route::resource('perdeim-employee.perdeimretire-view', PerdeimRetireViewController::class);
    Route::resource('employee-deduction', EmployeeDeductionController::class);
    Route::resource('employee-benefit', EmployeeBenefitController::class);
    Route::resource('employee-performance', PerformanceView::class);
    Route::resource('room', RoomController::class);
    Route::resource('book', BookController::class);
    Route::resource('view-room', ViewRoomController::class);
    Route::resource('book-room', EmployeeBookController::class);
    Route::get('download-payslip/{id}', [App\Http\Controllers\PayrolController::class, 'generate_payslip'])->name('download.payslip');
    Route::get('view-payslip/{id}', [App\Http\Controllers\PayrolController::class, 'view_payslip'])->name('payrol.payslip');
    Route::get('/book.occupied/{id}', [App\Http\Controllers\BookController::class, 'occupied'])->name('book.occupy');
    Route::get('/book.cancelled/{id}', [App\Http\Controllers\BookController::class, 'cancelled'])->name('book.cancel');
    Route::get('/leave.approve/{id}', [App\Http\Controllers\Leave_applyController::class, 'approve'])->name('leave.approve');
    Route::get('/leave.decline/{id}', [App\Http\Controllers\Leave_applyController::class, 'decline'])->name('leave.decline');
    Route::get('/perdeim.approve/{id}', [App\Http\Controllers\PerdeimController::class, 'approve'])->name('perdeim.approve');
    Route::get('/perdeim.decline/{id}', [App\Http\Controllers\PerdeimController::class, 'decline'])->name('perdeim.decline');
    Route::get('/perdeim.perdeimretire.approve/{id}', [App\Http\Controllers\PerdeimretireController::class, 'approved'])->name('perdeim.perdeimretire.approve');
    Route::get('/perdeim.perdeimretire.decline/{id}', [App\Http\Controllers\PerdeimretireController::class, 'declined'])->name('perdeim.perdeimretire.decline');
    Route::get('/field.approved/{id}', [App\Http\Controllers\FieldController::class, 'approved'])->name('field.approved');
    Route::get('/field.declined/{id}', [App\Http\Controllers\FieldController::class, 'declined'])->name('field.declined');
    Route::get('notice/{id}/download', [App\Http\Controllers\NoticeController::class, 'download'])->name('notice.download');
    Route::get('file/{id}/download', [App\Http\Controllers\HomeController::class, 'download'])->name('file.download');
    Route::get('file/{id}/download', [App\Http\Controllers\PerdeimretireController::class, 'download'])->name('retire.download');
    Route::get('/loan.approve/{id}', [App\Http\Controllers\LoanController::class, 'approve'])->name('loan.approve');
    Route::get('/loan.decline/{id}', [App\Http\Controllers\LoanController::class, 'decline'])->name('loan.decline');
    Route::get('file.proof/{id}/download', [App\Http\Controllers\WorkOverTimeController::class, 'download'])->name('work.download');
    Route::get('/work-overtime.approve/{id}', [App\Http\Controllers\WorkOverTimeController::class, 'approve'])->name('work-overtime.approve');
    Route::get('/work-overtime.decline/{id}', [App\Http\Controllers\WorkOverTimeController::class, 'decline'])->name('work-overtime.decline');
});

Route::get('/payment', function () {
    return view('payrol.payslip.index');
});



Route::resource('manager-dashboard', ManagerAloneController::class);
Route::get('/changePassword', [App\Http\Controllers\Password_ResetController::class, 'ResetPassword'])->name('changePasswordGet');
Route::post('/changePassword', [App\Http\Controllers\Password_ResetController::class, 'changePasswordPost'])->name('changePasswordPost');
