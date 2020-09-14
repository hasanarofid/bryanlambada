<?php

namespace App\Http\Controllers;

use App\User;
use App\Menu;
// use app\Models\CardUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    public function index()
    {
      if(!Session::get('login')){
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
           // For handling exception.
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
       }else{
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
  }

}
