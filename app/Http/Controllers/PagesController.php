<?php

namespace App\Http\Controllers;
Use DB;
use App\User;
use App\Menu;
use App\Page;
use App\Widget;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class PagesController extends Controller
{
      public function notfound()
      {
        $page = Page::where('noid', 2)->first();
        $page_title = $page->pagetitle;
        $page_description = $page->pagetitle;
        $error = 1;
        $noid = Session::get('noid');
        $myusername = Session::get('myusername');
          $user = User::where('noid', Session::get('noid'))->first();
          $idhomepage =  $user->idhomepage;
        // dd($myusername);
        return view('lam_custom.notfound', compact(
          'noid',
          'myusername',
          'idhomepage',
          'page',
          'error',
          'page_title',
           'page_description'));

      }

    public function index()
    {
        $page_title = 'Dashboard';
        $page_description = 'Some description for the page';
        return view('pages.dashboard', compact('page_title', 'page_description'));
    }

    public function error()
    {
        $page_title = 'Dashboard';
        $page_description = 'Some description for the page';

        return view('pages.error', compact('page_title', 'page_description'));
    }

    public function baru()
    {
      $data = Menu::getAll();
      $data_sidebar = Menu::getSidebar()->toArray();
      $idhomepage = 10000000;
      $noid = 'null';
      $requestContent = [
       'headers' => [
           'Accept' => 'application/json',
           'Content-Type' => 'application/json'
       ]
           ];
   try {
       $client = new \GuzzleHttp\Client();
       $apiRequest = $client->request('POST', 'http://api.lambada.id/api/GET_PAGE?idpage='.$idhomepage);
       $apiRequest2 = $client->request('POST', 'http://api.lambada.id/api/GET_PAGE_PANEL?idpage='.$idhomepage);
       $response = json_decode($apiRequest->getBody());
       $response2 = json_decode($apiRequest2->getBody());
       $data_page = $response->Data;
       $data_panel = $response2->Data;
       $widget = Menu::getAllPanel($idhomepage);
   } catch (RequestException $re) {
    }
   $error = '';
   $page_title = $data_page[0]->PageCaption->pagetitle;
   $page_description = $data_page[0]->PageCaption->pagetitle;
   $dashboard = 0;
      return view('pages.dashboard', compact(
        'dashboard',
        'error',
        'data',
        'noid',
        'data_sidebar',
        'data_page',
        'page_title',
        'data_panel',
        'widget',
        'idhomepage',
        'page_description'
      ));
    }

    public function baru_login()
    {
      $data = Menu::getAllAfter();
      $noid = Session::get('noid');
      $myusername = Session::get('myusername');
      $idhomepage = Session::get('idhomepage');
       $data_sidebar = Menu::getSidebarLogin($idhomepage);
      $requestContent = [
       'headers' => [
           'Accept' => 'application/json',
           'Content-Type' => 'application/json'
       ]
           ];
   try {
       $client = new \GuzzleHttp\Client();
       $apiRequest = $client->request('POST', 'http://api.lambada.id/api/GET_PAGE?idpage='.$idhomepage);
       $apiRequest2 = $client->request('POST', 'http://api.lambada.id/api/GET_PAGE_PANEL?idpage='.$idhomepage);
       $response = json_decode($apiRequest->getBody());
       $response2 = json_decode($apiRequest2->getBody());
       $data_page = $response->Data;
       $data_panel = $response2->Data;
       $widget = Menu::getAllPanel($idhomepage);

   } catch (RequestException $re) {
         // For handling exception.
   }

   $error = '';
   $page_title = $data_page[0]->PageCaption->pagetitle;
   $page_description = $data_page[0]->PageCaption->pagetitle;
   $dashboard = 1;
      return view('pages.dashboard2', compact(
        'dashboard',
        'error',
        'data',
        'noid',
        'myusername',
        'data_sidebar',
        'data_page',
        'page_title',
        'data_panel',
        'widget',
        'idhomepage',
        'page_description'
      ));
    }

    public function page($slug)
    {
      //10000001
      if ($slug == 2) {
          return view('pages.error');
      }

      if ($slug == 10000000 ) {
        return Redirect::to('pages/baru');
      }

      if ($slug == 10000001 ) {
        return Redirect::to('pages/baru_login');
      }
            if(!Session::get('login')){
                      return redirect('/');
            }else{
              $requestContent = [
               'headers' => [
                   'Accept' => 'application/json',
                   'Content-Type' => 'application/json'
               ]
           ];
           try {
               $client = new \GuzzleHttp\Client();
               $apiRequest = $client->request('POST', 'http://api.lambada.id/api/GET_PAGE?idpage='.$slug);
               $apiRequest2 = $client->request('POST', 'http://api.lambada.id/api/GET_PAGE_PANEL?idpage='.$slug);
               $response = json_decode($apiRequest->getBody());
               $response2 = json_decode($apiRequest2->getBody());
               if ($response->Data == null) {
                 return view('pages.error', compact(
                   'data',
                   'noid',
                   'myusername',
                   'data_sidebar',
                   'data_page',
                   'page_title',
                   'page_description',
                   'idhomepage',
                   'data_panel',
                   'widget',
                   'page_description'
                 ));

               }
               $data_page = $response->Data;
               $data_panel = $response2->Data;


           } catch (RequestException $re) {

           }
            }
                           $widget = Menu::getAllPanel($slug);
            $data = Menu::getAllAfter();
            $idhomepage = Session::get('idhomepage');
            $data_sidebar = Menu::getSidebarLogin($slug);
            $noid = Session::get('noid');
            $myusername = Session::get('myusername');
            if ($data_page[0] == null) {
              $page_title = '';
              $page_description = '';
              }else{
              $page_title = $data_page[0]->PageCaption->pagetitle;
              $page_description = $data_page[0]->PageCaption->pagetitle;
            }
            if ($widget == null) {
              $error = DB::select("SELECT *
              FROM cmspage
              where noid = 2 limit 1
              ");
              // dd($error);
              return view('pages.error', compact(
                'data',
                'noid',
                'myusername',
                'data_sidebar',
                'data_page',
                'page_title',
                'page_description',
                'idhomepage',
                'data_panel',
                'widget',
                'page_description',
                'error'
              ));
            }
            $error = '';
            $dashboard = 1;
               return view('pages.dashboard3', compact(
                 'dashboard',
                 'data',
                 'noid',
                 'myusername',
                 'data_sidebar',
                 'data_page',
                 'page_title',
                 'page_description',
                 'idhomepage',
                 'data_panel',
                 'widget',
                 'error'
               ));
    }


    public function page_baru($slug)
    {
      $client = new \GuzzleHttp\Client();
      $apiRequest = $client->request('POST', 'http://api.lambada.id/api/GET_PAGE?idpage='.$slug);
      $page = Page::where('noid', $slug)->get();
      $apiRequest2 = $client->request('POST', 'http://api.lambada.id/api/GET_PAGE_PANEL?idpage='.$slug);
      $response = json_decode($apiRequest->getBody());
      $response2 = json_decode($apiRequest2->getBody());
      $data_page = $response->Data;
      $data_panel = $response2->Data;
        // dd($data_page[0]->idtypepage);
      if ($data_page[0]->idtypepage = 1) {
        $error = '';
        $dashboard = 1;
        $data = Menu::getAllAfter();
        $noid = Session::get('noid');
        $myusername = Session::get('myusername');
        $idhomepage = $slug;
        $data_sidebar = Menu::getSidebarLogin($slug);
        $page_title = $data_page[0]->PageCaption->pagetitle;
        $page_description = $data_page[0]->PageCaption->pagetitle;
        $widget = Menu::getAllPanel($idhomepage);
        if ($data_page[0]->noid == 10000003) {
          return view('pages.dashboard3', compact(
            'error',
            'dashboard',
            'data',
            'noid',
            'myusername',
            'idhomepage',
            'data_sidebar',
            'data_page',
            'page_title',
            'page_description',
            'data_panel',
            'widget'
          ));
        }else {


           return view('pages.dashboard2', compact(
             'error',
             'dashboard',
             'data',
             'noid',
             'myusername',
             'idhomepage',
             'data_sidebar',
             'data_page',
             'page_title',
             'page_description',
             'data_panel',
             'widget'
           ));
         }
      }

    }


  public function dashboard()
  {

  }

    /**
     * Demo methods below
     */

    // Datatables
    public function datatables()
    {
        $page_title = 'Datatables';
        $page_description = 'This is datatables test page';

        return view('pages.datatables', compact('page_title', 'page_description'));
    }

    // KTDatatables
    public function ktDatatables()
    {
        $page_title = 'KTDatatables';
        $page_description = 'This is KTdatatables test page';

        return view('pages.ktdatatables', compact('page_title', 'page_description'));
    }

    // Select2
    public function select2()
    {
        $page_title = 'Select 2';
        $page_description = 'This is Select2 test page';

        return view('pages.select2', compact('page_title', 'page_description'));
    }

    // custom-icons
    public function customIcons()
    {
        $page_title = 'customIcons';
        $page_description = 'This is customIcons test page';

        return view('pages.icons.custom-icons', compact('page_title', 'page_description'));
    }

    // flaticon
    public function flaticon()
    {
        $page_title = 'flaticon';
        $page_description = 'This is flaticon test page';

        return view('pages.icons.flaticon', compact('page_title', 'page_description'));
    }

    // fontawesome
    public function fontawesome()
    {
        $page_title = 'fontawesome';
        $page_description = 'This is fontawesome test page';

        return view('pages.icons.fontawesome', compact('page_title', 'page_description'));
    }

    // lineawesome
    public function lineawesome()
    {
        $page_title = 'lineawesome';
        $page_description = 'This is lineawesome test page';

        return view('pages.icons.lineawesome', compact('page_title', 'page_description'));
    }

    // socicons
    public function socicons()
    {
        $page_title = 'socicons';
        $page_description = 'This is socicons test page';

        return view('pages.icons.socicons', compact('page_title', 'page_description'));
    }

    // svg
    public function svg()
    {
        $page_title = 'svg';
        $page_description = 'This is svg test page';

        return view('pages.icons.svg', compact('page_title', 'page_description'));
    }

    // Quicksearch Result
    public function quickSearch()
    {
        return view('layout.partials.extras._quick_search_result');
    }
}
