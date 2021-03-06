<?php

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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('dashboard');
Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);


/* ================== Customers =====================*/

Route::name('customer.index')->get('customer', 'CustomerController@index');
Route::name('customer.store')->post('customer/store', 'CustomerController@store');
Route::name('customer.create')->get('customer/create', 'CustomerController@create');
Route::name('customer.edit')->get('customer/edit/{id}', 'CustomerController@edit');
Route::name('customer.update')->post('customer/update/{id}', 'CustomerController@update');
Route::name('customer.show')->get('customer/show/{id}', 'CustomerController@show');
Route::name('customer.ledger')->get('customer/ledger/{id}', 'CustomerController@ledger');
Route::name('customer.destroy')->get('customer/destroy/{id}', 'CustomerController@destroy');
Route::post('/customer/dataTable', 'CustomerController@dataTable');

/* ================== Transaction Receive =====================*/

Route::name('transaction')->get('transaction', 'TransactionController@index');
Route::name('transaction.index')->get('transaction', 'TransactionController@index');
Route::name('transaction.generate')->get('transaction/generate', 'TransactionController@billGenerate');
Route::name('transaction.billcreate')->post('transaction/billcreate', 'TransactionController@billGenerateCreate');
Route::name('transaction.store')->post('transaction/store', 'TransactionController@store');
Route::name('transaction.create')->get('transaction/create', 'TransactionController@create');
Route::name('transaction.edit')->get('transaction/edit/{id}', 'TransactionController@edit');
Route::name('transaction.update')->post('transaction/update/{id}', 'TransactionController@update');
Route::name('transaction.show')->get('transaction/show/{id}', 'TransactionController@show');
Route::name('transaction.receive')->get('transaction/receive/{id}', 'TransactionController@receive');
Route::name('transaction.destroy')->get('transaction/destroy/{id}', 'TransactionController@destroy');
Route::post('/transaction/dataTable', 'TransactionController@dataTable');

/* ================== Internet Package =====================*/

Route::name('internet')->get('internet', 'InternetController@index');
Route::name('internet.index')->get('internet', 'InternetController@index');
Route::name('internet.store')->post('internet/store', 'InternetController@store');
Route::name('internet.create')->get('internet/create', 'InternetController@create');
Route::name('internet.edit')->get('internet/edit/{id}', 'InternetController@edit');
Route::name('internet.update')->put('internet/update/{id}', 'InternetController@update');
Route::name('internet.show')->get('internet/show/{id}', 'InternetController@show');
Route::name('internet.destroy')->get('internet/destroy/{id}', 'InternetController@destroy');
Route::post('/internet/dataTable', 'InternetController@dataTable');

/* ================== Location =====================*/

Route::name('location')->get('location', 'LocationController@index');
Route::name('location.index')->get('location', 'LocationController@index');
Route::name('location.store')->post('location/store', 'LocationController@store');
Route::name('location.create')->get('location/create', 'LocationController@create');
Route::name('location.edit')->get('location/edit/{id}', 'LocationController@edit');
Route::name('location.update')->put('location/update/{id}', 'LocationController@update');
Route::name('location.show')->get('location/show/{id}', 'LocationController@show');
Route::name('location.destroy')->get('location/destroy/{id}', 'LocationController@destroy');
Route::post('/location/dataTable', 'LocationController@dataTable');
Route::get('/location/parentList/{type}', 'LocationController@parentList');
Route::get('/location/category-tree-view', ['uses' => 'LocationController@manageCategory']);

/* ================== Users =====================*/

Route::name('user.index')->get('user', 'UserController@index');
Route::name('user.store')->post('user/store', 'UserController@store');
Route::name('user.create')->get('user/create', 'UserController@create');
Route::name('user.edit')->get('user/edit/{id}', 'UserController@edit');
Route::name('user.update')->put('user/update/{id}', 'UserController@update');
Route::name('user.show')->get('user/show/{id}', 'UserController@show');


/* ================== Users =====================*/

Route::name('customer.import')->get('customer/import', 'CustomerImportController@index');
Route::name('customer.importForm')->get('customer/import-form', 'CustomerImportController@create');
Route::name('customer.importForm')->post('customer/import-form', 'CustomerImportController@store');
Route::name('customer.importFile')->get('customer/import-file/{id}', 'CustomerImportController@importFile');
Route::name('customer.importDelete')->get('customer/import-delete/{id}', 'CustomerImportController@destroy');

/* ================== Users =====================*/

Route::name('report.overview')->get('overview', 'UserController@index');
Route::name('report.monthlySales')->post('user/monthly-sales', 'UserController@store');

/*=================== Admin ===================== */


Route::get('admin/student/create','AdminController@create')->name('student_create');
Route::post('/admin/student/store','AdminController@store')->name('student_store');
Route::get('/admin/student/class/1','AdminController@indexOne')-> name('student_index1');
Route::get('/admin/student/class/2','AdminController@indexTwo')-> name('student_index2');
Route::get('/admin/student/class/3','AdminController@indexThree')-> name('student_index3');
Route::post('/customer/dataTable', 'CustomerController@dataTable');
Route::post('/student/dataTable','AdminController@dataTable');

Route::get('/student/all/view/{id}','AdminController@View')->name('student_view');

/*=================== Class ===================== */
Route::get('class/create', 'StudentclassController@create')->name('class_create');
Route::post('/class/store','StudentclassController@store')->name('class_store');
Route::get('/all/class/fees','StudentclassController@allClass')->name('all_class');

//Route::post('/class/store','StudentclassController@store')->name('class_store');

/*=================== Section ===================== */

Route::get('section/create','SectionController@create')->name('section_create');
Route::post('section/store','SectionController@store')->name('section_store');

/*=================== Teachers Panel ===================== */
Route::get('teachers/create','TeacherController@create')->name('teacher_create');
Route::post('/teacher/store','TeacherController@store')->name('teacher_store');
Route::get('/teachers/index','TeacherController@index')->name('teacher_index');

/*=================== Attendence System ===================== */

Route::get('student/attendence','AttendenceController@create')->name('attendence_create');
Route::post('student/attendence/store','AttendenceController@store')->name('attendence_store');


/*=================== Settings Table ===================== */

Route::get('setting/create','SettingController@create')->name('setting_create');
Route::post('setting/store','SettingController@store')->name('setting_store');
Route::get('setting/index','SettingController@index')->name('setting_index');

/*=================== Students Fees ===================== */

Route::get('student/fees/create','FeesController@create')->name('fees_create');
Route::post('/student/fees/store','FeesController@store')->name('fees_store');
Route::get('student/fees/batch','FeesController@index')->name('fees_index');
Route::get('/student/fess/edit/{id}','FeesController@edit')->name('fees_edit');
Route::post('student/fees/update/{id}','FeesController@update')->name('fees_update');

//ajax
Route::get('student/class/fees/admissionfees/{id}','FeesController@admission_fee')->name('admissionfees');


/*=================== Batch ===================== */
/*Route::post('create/batch','')*/


/*===================Expense===================== */

Route::get('expense/create/','ExpenseController@create')->name('expense_create');
Route::get('expense/index/','ExpenseController@index')->name('expense_index');
Route::post('expense/store/','ExpenseController@store')->name('expense_store');

/*=================== Student Transaction Table ===================== */

Route::get('student/transaction/create','StudentTransactionController@create')->name('transaction_create');
Route::get('student/transaction/index','StudentTransactionController@index')->name('transaction_index');
Route::post('student/transaction/store','StudentTransactionController@store')->name('transaction_store');
