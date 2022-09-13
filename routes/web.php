<?php

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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('admin/civilstatuses', 'App\Http\Controllers\CivilStatusController');
    Route::resource('admin/banks', 'App\Http\Controllers\BankController');
    Route::resource('admin/genders', 'App\Http\Controllers\GendersController');
    Route::resource('admin/bloods', 'App\Http\Controllers\BloodController');
    Route::resource('admin/acctypes', 'App\Http\Controllers\BankAccountTypeController');
    Route::resource('admin/companies', 'App\Http\Controllers\CompanyController');
    Route::resource('admin/departments', 'App\Http\Controllers\DepartmentController');
    Route::resource('admin/municipalities', 'App\Http\Controllers\MunicipalityController');
    Route::resource('admin/projecttypes', 'App\Http\Controllers\ProjectTypeController');
    Route::resource('admin/projects', 'App\Http\Controllers\ProjectController');
    Route::resource('admin/insurances', 'App\Http\Controllers\InsuranceController');
    Route::resource('admin/igssafilliations', 'App\Http\Controllers\IgssAfilliationController');
    Route::resource('admin/sections', 'App\Http\Controllers\SectionController');
    Route::resource('admin/jobs', 'App\Http\Controllers\JobController');
    Route::resource('admin/kintypes', 'App\Http\Controllers\KinTypeController');

    Route::resource('admin/employees', 'App\Http\Controllers\EmployeeController');

    Route::resource('admin/comments', 'App\Http\Controllers\CommentController');
    Route::resource('admin/poligraphs', 'App\Http\Controllers\PoligraphController');
    Route::resource('admin/verifications', 'App\Http\Controllers\VerificationController');
    Route::resource('admin/vaccines', 'App\Http\Controllers\VaccineController');
    Route::resource('admin/capacitations', 'App\Http\Controllers\CapacitationController');
    Route::resource('admin/attentionCalls', 'App\Http\Controllers\AttentionCallController');
    Route::resource('admin/vacations', 'App\Http\Controllers\VacationController');
    Route::resource('admin/suspensions', 'App\Http\Controllers\SuspensionController');







});

route::get('/api/projects', function()
{
    $p = App\Models\KinType::find(1);
    return $p->kins;
    // return $p;

});


