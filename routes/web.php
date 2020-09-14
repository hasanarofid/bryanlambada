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

Route::get('/', 'HomeController@index');
Route::get('/login', 'DashboardBaruController@login');
Route::post('/login/loginPost', 'LoginUserController@loginPost');
Route::get('/login/logout', 'LoginUserController@logout');
Route::get('/pages/clear-cache', function() {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    return "Cache is cleared";
});


Route::post('/savedata', 'SystemController@savedata');
Route::get('/getdata', 'SystemController@getdata');
Route::post('/ambildata', 'SystemController@ambildata');
Route::post('/ambildata2', 'SystemController@ambildata2');
Route::post('/ordertable', 'SystemController@ordertable');
Route::post('/hapusdepartemen', 'SystemController@hapusdepartemen');
Route::post('/editdepartemen', 'SystemController@editdepartemen');
// Route::get('/2', 'PagesController@notfound');
// Route::get('/20{slug}', 'SystemController@index');
// Route::get('/50{slug}', 'CustomController@index');
// Route::get('/{slug}', 'HomeController@page');
// Route::get('/custom/tag/{slug}', 'CustomController@index');
Route::get('/{slug}', 'HomeController@home');
Route::get('/{slug}', 'CustomController@index');
// Route::get('/{slug}', 'SystemController@index');
// Route::get('/{slug}', 'DashboardController@index');
// Route::get('/{slug}', 'MasterTabelController@index');
// Route::get('/{slug}', 'MasterTreelistController@index');
// Route::get('/{slug}', 'TransaksiMasterDetailController@index');
// Route::get('/{slug}', 'TransaksiMasterDetail6Controller@index');
// Route::get('/{slug}', 'ReportingStandardController@index');
// Route::get('/{slug}', 'ReportingNonStandardController@index');







// Demo routes
Route::get('/datatables', 'PagesController@datatables');
Route::get('/ktdatatables', 'PagesController@ktDatatables');
Route::get('/select2', 'PagesController@select2');
Route::get('/icons/custom-icons', 'PagesController@customIcons');
Route::get('/icons/flaticon', 'PagesController@flaticon');
Route::get('/icons/fontawesome', 'PagesController@fontawesome');
Route::get('/icons/lineawesome', 'PagesController@lineawesome');
Route::get('/icons/socicons', 'PagesController@socicons');
Route::get('/icons/svg', 'PagesController@svg');
Route::get('/pages/error', 'PagesController@error');


// Quick search dummy route to display html elements in search dropdown (header search)
Route::get('/quick-search', 'PagesController@quickSearch')->name('quick-search');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
