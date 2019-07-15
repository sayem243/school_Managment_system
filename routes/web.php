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

Route::get('/', function () {
    return view('welcome');
});
Route::name('dashboard')->get('dashboard','DashboardController@index');
/* ============== Shares =================== */
Route::name('shares')->get('shares','ShareController@index');
Route::name('shares.index')->get('shares','ShareController@index');
Route::name('shares.store')->post('shares/store','ShareController@store');
Route::name('shares.create')->get('shares/create','ShareController@store');
Route::name('shares.edit')->get('shares/edit/{id}','ShareController@edit');
Route::name('shares.update')->put('shares/update/{id}','ShareController@update');
Route::name('shares.show')->get('shares/show/{id}','ShareController@show');
Route::name('shares.destroy')->get('shares/destroy/{id}','ShareController@destroy');
Route::post('/shares/dataTable','ShareController@dataTable');

/* ================== Customers =====================*/

Route::name('customer')->get('customer','CustomerController@index');
Route::name('customer.index')->get('customer','CustomerController@index');
Route::name('customer.store')->post('customer/store','CustomerController@store');
Route::name('customer.create')->get('customer/create','CustomerController@create');
Route::name('customer.edit')->get('customer/edit/{id}','CustomerController@edit');
Route::name('customer.update')->put('customer/update/{id}','CustomerController@update');
Route::name('customer.show')->get('customer/show/{id}','CustomerController@show');
Route::name('customer.destroy')->get('customer/destroy/{id}','CustomerController@destroy');
Route::post('/customer/dataTable','CustomerController@dataTable');

/* ================== transaction Receive =====================*/

Route::name('transaction')->get('transaction','TransactionController@index');
Route::name('transaction.index')->get('transaction','TransactionController@index');
Route::name('transaction.store')->post('transaction/store','TransactionController@store');
Route::name('transaction.create')->get('transaction/create','TransactionController@create');
Route::name('transaction.edit')->get('transaction/edit/{id}','TransactionController@edit');
Route::name('transaction.update')->put('transaction/update/{id}','TransactionController@update');
Route::name('transaction.show')->get('transaction/show/{id}','TransactionController@show');
Route::name('transaction.destroy')->get('transaction/destroy/{id}','TransactionController@destroy');
Route::post('/transaction/dataTable','TransactionController@dataTable');

/* ================== Internet Package =====================*/

Route::name('internet')->get('internet','InternetController@index');
Route::name('internet.index')->get('internet','InternetController@index');
Route::name('internet.store')->post('internet/store','InternetController@store');
Route::name('internet.create')->get('internet/create','InternetController@create');
Route::name('internet.edit')->get('internet/edit/{id}','InternetController@edit');
Route::name('internet.update')->put('internet/update/{id}','InternetController@update');
Route::name('internet.show')->get('internet/show/{id}','InternetController@show');
Route::name('internet.destroy')->get('internet/destroy/{id}','InternetController@destroy');
Route::post('/internet/dataTable','InternetController@dataTable');

/* ================== Location =====================*/

Route::name('location')->get('location','LocationController@index');
Route::name('location.index')->get('location','LocationController@index');
Route::name('location.store')->post('location/store','LocationController@store');
Route::name('location.create')->get('location/create','LocationController@create');
Route::name('location.edit')->get('location/edit/{id}','LocationController@edit');
Route::name('location.update')->put('location/update/{id}','LocationController@update');
Route::name('location.show')->get('location/show/{id}','LocationController@show');
Route::name('location.destroy')->get('location/destroy/{id}','LocationController@destroy');
Route::post('/location/dataTable','LocationController@dataTable');
Route::get('/location/parentList/{type}','LocationController@parentList');
Route::get('/location/category-tree-view',['uses'=>'LocationController@manageCategory']);





