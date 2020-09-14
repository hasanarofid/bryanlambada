<?php

namespace App\Http\Controllers;
Use DB;
use App\User;
use App\Menu;
use App\Page;
use App\Panel;
use App\Widget;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{

    public function home(Request $request)
    {
      $slug = $request->path();
      if(!Session::get('login')){
          return view('pages.login');
      }
      $menu = Menu::where('noid',$slug)->first();
      $page = Page::where('noid',$menu->linkidpage)->first();
      // dd($page->idtypepage);
      if ((int)$page->idtypepage == 9) {
        //   9. Halaman Custom
        // dd($page->idtypepage);
          // return Redirect::to('CustomController/index',[$slug]);
        return redirect()->call('App\Http\Controllers\CustomController@index',[$slug]);
      }else if ((int)$page->idtypepage == 1) {
        // Halaman System
        return redirect()->action('App\Http\Controllers\SystemController@index',['slug'=>$slug]);
      }else if ((int)$page->idtypepage == 2) {
        // Halaman Dashboard
        return redirect()->action('App\Http\Controllers\DashboardController@index',['slug'=>$slug]);
      }else if ((int)$page->idtypepage == 3) {
        // Halaman Data Master (Tabel Biasa)
        return redirect()->action('App\Http\Controllers\MasterTabelController@index',['slug'=>$slug]);
      }else if ((int)$page->idtypepage == 4) {
        // Halaman Data Master (Tabel Treelist)
        return redirect()->action('App\Http\Controllers\MasterTreelistController@index',['slug'=>$slug]);
      }else if ((int)$page->idtypepage == 5) {
        //  Halaman Transaksi Master Detail (1 Tabel Master + 1 Tabel Detail)
        return redirect()->action('App\Http\Controllers\TransaksiMasterDetailController@index',['slug'=>$slug]);
      }else if ((int)$page->idtypepage == 6) {
        //   Halaman Transaksi Master Detail (1 Tabel Master + lebih dari 1 Tabel Detail)
        return redirect()->action('App\Http\Controllers\TransaksiMasterDetail6Controller@index',['slug'=>$slug]);
      }else if ((int)$page->idtypepage == 7) {
        //   Halaman Reporting Standard
        return redirect()->action('App\Http\Controllers\ReportingStandardController@index',['slug'=>$slug]);
      }else if ((int)$page->idtypepage == 8) {
        //  Halaman Reporting Non Standard
        dd($page->idtypepage);
        return redirect()->action('App\Http\Controllers\ReportingNonStandardController@index',['slug'=>$slug]);
      }else {
        // Other
        return redirect()->action('App\Http\Controllers\OtherController@index',['slug'=>$slug]);
      }

    }
    public function index()
    {
          if(!Session::get('login')){
            $idhomepagelink =  request()->path();
            if ($idhomepagelink == '' || $idhomepagelink == '/') {
              $idhomepagelink = 10;
            }
            $user = User::where('noid', 0)->first();
            $menu = Menu::where('noid',$idhomepagelink)->first();
            $public = $menu->ispublic;
            $page = Page::where('noid',$menu->linkidpage)->first();
            $panel = Panel::where('idpage', $page->noid)->orderBy('norow','asc')->orderBy('nocol','asc')->get();
            $page_title = $page->pagetitle;
            $page_description = $page->pagetitle;
            $idhomepage =  $user->idhomepage;
            $noid = 'null';
            $myusername = 'Guest';
            $slug = $page->noid;



            return view('lam_dashboard.index', compact(
              'noid',
              'public',
              'myusername',
              'idhomepagelink',
              'page',
              'panel',
              'page_title',
              'idhomepage',
               'page_description'));

            // dd($user);
          }else{
            $idhomepagelink =  request()->path();
            if ($idhomepagelink == '' || $idhomepagelink == '/') {
              $idhomepagelink = 10;
            }
            $user = User::where('noid', Session::get('noid'))->first();
            // dd($user);
            $menu = Menu::where('noid',$idhomepagelink)->first();
            $public = $menu->ispublic;
            $page = Page::where('noid',$menu->linkidpage)->first();
            $panel = Panel::where('idpage', $page->noid)->orderBy('norow','asc')->orderBy('nocol','asc')->get();
            $page_title = $page->pagetitle;
            $page_description = $page->pagetitle;
            $idhomepage =  $user->idhomepage;
            $noid =  Session::get('noid');
            $myusername =  Session::get('myusername');
            $slug = $page->noid;
            return view('lam_dashboard.index', compact(
              'noid',
              'public',
              'myusername',
              'idhomepagelink',
              'page',
              'panel',
              'page_title',
              'idhomepage',
               'page_description'
             ));

          }
    }

    public function page($slug,Request $request)
    {
          if(!Session::get('login')){
              return view('pages.login');
          }
        $menu = Menu::where('noid',$slug)->first();
        $page = Page::where('noid',$menu->linkidpage)->first();
        // if($page->idtypepage == 9){
        //     return Redirect::to('system/index');
        // }
      $idhomepagelink = $slug;
      $user = User::where('noid', Session::get('noid'))->first();
      $public = $menu->ispublic;
      $panel = Panel::where('idpage', $page->noid)->orderBy('norow','asc')->orderBy('nocol','asc')->get();
      $page_title = $page->pagetitle;
      $page_description = $page->pagetitle;
      $idhomepage =  $user->idhomepage;
      $noid = Session::get('noid');
      $myusername = Session::get('myusername');

    if($menu->ispublic == 1){
      return view('lam_dashboard.index', compact(
        'noid',
        'public',
        'myusername',
        'idhomepagelink',
        'page',
        'panel',
        'page_title',
        'idhomepage',
         'page_description'));
    }else{
      if(!Session::get('login')){
        return view('pages.login');
      }else{

        return view('lam_dashboard.index', compact(
          'noid',
          'public',
          'myusername',
          'idhomepagelink',
          'page',
          'panel',
          'page_title',
          'idhomepage',
           'page_description'));

      }

    }

    }

}
