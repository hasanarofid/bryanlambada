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

class CustomController extends Controller
{
  public function index($slug)
  {
    if(!Session::get('login')){
        return view('pages.login');
    }
    $menu = Menu::where('noid',$slug)->first();
    // dd($menu);
    $page = Page::where('noid',$menu->linkidpage)->first();
    if(strpos($menu->menucaption, ' ') !== false) {
      $pecah = explode(' ', $menu->menucaption);
      $namaview = strtolower($pecah[1]);
      } else {
        $namaview = strtolower($menu->menucaption);
      }
    $idhomepagelink = $slug;
    $user = User::where('noid', Session::get('noid'))->first();
    $widget = Widget::where('kode', $slug)->first();
      $public = $menu->ispublic;
      $idhomepage =  $user->idhomepage;
      $noid = Session::get('noid');
      $myusername = Session::get('myusername');

    if ($page == null) {
        $page = Page::where('noid', 2)->first();
        $page_title = $page->pagetitle;
        $page_description = $page->pagetitle;
      return view('lam_custom.notfound', compact(
        'noid',
        'myusername',
        'idhomepage',
        'idhomepagelink',
        'page',
        'page_title',
         'page_description'));

    }else{
        $panel = Panel::where('idpage',$page->noid)->first();
        $page_title = $page->pagetitle;
        $page_description = $page->pagetitle;
    }


      if ($widget == null) {
        $widgetgrid = null;
        $widgetgridfield = array();
        $widgetgridfield2 = array();
        $namatable = null;
      }else{
        $widgetgrid = WidgetGrid::where('idcmswidget', $widget->noid)->first();
        $widgetgridfield = WidgetGridField::where('idcmswidgetgrid', $widgetgrid->noid)->where('colshow',1)->get();
        $namatable = $widget->maintable;
        $tabledata =  DB::connection('mysql2')->table($widget->maintable)->first();
      }
      return view('lam_modules.'.$namaview.'', compact(
        'noid',
        'menu',
        'widget',
        'widgetgrid',
        'widgetgridfield',
        'widgetgridfield2',
        'departement',
        'public',
        'myusername',
        'idhomepagelink',
        'page',
        'panel',
        'page_title',
        'namatable',
        'idhomepage',
         'page_description'));
       


  }

}
