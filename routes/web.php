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
Route::name('transaction.update')->put('transaction/update/{id}', 'TransactionController@update');
Route::name('transaction.show')->get('transaction/show/{id}', 'TransactionController@show');
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
