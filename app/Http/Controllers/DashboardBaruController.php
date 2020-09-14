<?php

namespace App\Http\Controllers;
Use DB;
use App\User;
use App\Menu;
use App\Page;
use App\Widget;
use App\Panel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class DashboardBaruController extends Controller
{

  public function index()
  {
    if(!Session::get('login')){
      $idhomepagelink =  request()->path();
      if ($idhomepagelink == '' || $idhomepagelink == '/') {
        $idhomepagelink = 10;
      }

    $page_title = 'Dashboard';
    $page_description = 'Some description for the page';
    $user = User::where('noid', 0)->first();
    $page = Page::where('noid', $user->idhomepage)->first();
    $panel = Panel::where('idpage', $idhomepagelink)->orderBy('norow','asc')->orderBy('nocol','asc')->get();
    $idhomepage =  $user->idhomepage;
    $noid = 'null';
    $myusername = 'Guest';
    $slug = $page->noid;
    $pagechack = Page::where('noid', $idhomepagelink)->first();
    $pagemenu = Menu::where('linkidpage', $idhomepagelink)->first();
            $public = $pagemenu->ispublic;
            if ($public == 0) {
                return view('pages.login');
            }
    // if ($page->idtypepage == 1) {

      return view('dashboard.index', compact(
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
  $page_title = 'Dashboard';
  $page_description = 'Some description for the page';
  $user = User::where('noid', Session::get('noid'))->first();
    $idhomepagelink =  request()->path();
    if ($idhomepagelink == 10000000 || $idhomepagelink == '/') {
      $page = Page::where('noid', 10000000)->first();
      $panel = Panel::where('idpage', 10000000)->orderBy('norow','asc')->orderBy('nocol','asc')->get();
      $idhomepagelink = 10000000;
      $idhomepage = $user->idhomepage;
    }else{
      $page = Page::where('noid', $user->idhomepage)->first();
      $panel = Panel::where('idpage', $user->idhomepage)->orderBy('norow','asc')->orderBy('nocol','asc')->get();
        $idhomepage =   $user->idhomepage;
        $idhomepagelink  =   request()->path();
    }
    // dd($idhomepagelink);
    $slug = $page->noid;
    $pagechack = Page::where('noid', $slug)->first();
    $pagemenu = Menu::where('linkidpage', $slug)->first();
            $public = 0;

  $noid = Session::get('noid');
  $myusername = Session::get('myusername');
  // if ($page->idtypepage == 1) {
    return view('dashboard.index', compact(
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
      // }else{
      //   return view('page.index', compact(
      //     'noid',
      //     'page',
      //     'panel',
      //     'page_title',
      //     'idhomepage',
      //      'page_description'));
      // }
    }

    public function page($slug)
    {
        $pagechack = Page::where('noid', $slug)->first();
        dd($pagechack);
        $pagemenu = Menu::where('linkidpage', $slug)->first();
        // dd($pagemenu->ispublic);
        $public = $pagemenu->ispublic;
        // dd($pagemenu->ispublic);
          if($pagemenu->ispublic == null){
              return $this->index();

          }else{
            if ($slug == 10000000) {
              return $this->index();
            }

      $idhomepagelink =  request()->path();
      $page_title = 'Dashboard';
      $page_description = 'Some description for the page';
      $user = User::where('noid', Session::get('noid'))->first();
      $page = Page::where('noid', $idhomepagelink)->first();
      $panel = Panel::where('idpage', $idhomepagelink)->orderBy('noid','asc')->orderBy('norow','desc')->orderBy('nocol','asc')->get();
       $client = new \GuzzleHttp\Client();
       $apiRequest = $client->request('POST', 'http://api.lambada.id/api/GET_PAGE?idpage='.$slug);
       $response = json_decode($apiRequest->getBody());
      $idhomepage =  $user->idhomepage;

      $noid = Session::get('noid');
      $myusername = Session::get('myusername');
      if ($response->Data == null) {
        $page = Page::where('noid', 404)->first();
        return view('dashboard.error', compact(
          'data',
          'public',
          'noid',
          'myusername',
          'data_sidebar',
          'data_page',
          'page',
          'page_description',
          'idhomepage',
          'data_panel',
          'widget',
          'page_description'
        ));
      }

      // if ($page->idtypepage == 1) {
        return view('dashboard.index', compact(
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

    public function login()
    {
      return view('pages.login');
    }



}
