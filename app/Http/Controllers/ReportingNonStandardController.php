<?php

namespace App\Http\Controllers;
Use DB;
use App\User;
use App\Menu;
use App\Page;
use App\Panel;
use App\Widget;
use App\WidgetGrid;
use App\WidgetGridField;
use App\Departement;
use App\Company;
use Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Schema;
use Carbon;

class ReportingNonStandardController extends Controller
{
  public function index($slug)
  {
    if(!Session::get('login')){
        return view('pages.login');
    }
    $menu = Menu::where('noid',$slug)->first();
    $page = Page::where('noid',$menu->linkidpage)->first();
    dd('non');
  }

}
