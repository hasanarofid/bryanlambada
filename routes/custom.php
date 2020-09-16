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
Route::get('/{slug}', function ($slug) {
  dd($slug);
  $menu = App\Menu::where('noid',$slug)->first();
  $page = App\Page::where('noid',$menu->linkidpage)->first();
  // dd($page->idtypepage);
  if ($page->idtypepage == 9)
  {
    return redirect()->action('CustomController@index', ['slug' => $slug]);
    // Route::get('/'.$slug.' ', 'CustomController@index')->name('custom');
    //
    // return redirect(route('custom'));

  }
  });
