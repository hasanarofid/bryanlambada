<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use App\User;
use App\Menu;
use App\Page;
use App\Panel;
use App\Widget;
use App\WidgetGrid;
use App\WidgetGridField;
use App\Departement;
use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

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
// Route::get('/{slug}', array('as' => 'home.home', 'uses' => 'HomeController@home'));
Route::get('/{slug}', 'HomeController@home');
// Route::get('{slug}', function($slug) {
//    // return 'User '.$slug;
//       if(!Session::get('login')){
//           return view('pages.login');
//       }
//     $menu = App\Menu::where('noid',$slug)->first();
//     $page = App\Page::where('noid',$menu->linkidpage)->first();
//     if ($page->idtypepage == 9) {
//       //custom
//       return redirect(route('custom'));
//     }else if ($page->idtypepage == 1) {
//       //Halaman System
//       return redirect(route('system'));
//     }else if ($page->idtypepage == 2) {
//       //Dashboard
//       return redirect(route('dashboard'));
//     }else if ($page->idtypepage == 3) {
//       // Halaman Data Master (Tabel Biasa)
//       return redirect(route('MasterTabelController'));
//     }else if ($page->idtypepage == 4) {
//       // Halaman Data Master (Tabel Biasa)
//       return redirect(route('MasterTreelistController'));
//     }else if ($page->idtypepage == 5) {
//       return redirect(route('TransaksiMasterDetailController'));
//     }else if ($page->idtypepage == 6) {
//         return redirect(route('TransaksiMasterDetail6Controller'));
//     }else if ($page->idtypepage == 7) {
//           return redirect(route('ReportingStandardController'));
//     }else if ($page->idtypepage == 8) {
//             return redirect(route('ReportingNonStandardController'));
//     }
//     return abort(404);
// });
// Route::get('/{slug}', 'CustomController@index')->name('custom');
// Route::get('/{slug}', 'SystemController@index')->name('system');
// Route::patch('/{slug}',[
//   'as' => 'custom.index',
//   'uses' => 'CustomController@index'
// ]);
// Route::get('/{slug}', 'HomeController@home')->name('home');

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
