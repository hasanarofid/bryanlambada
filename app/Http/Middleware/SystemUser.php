<?php

namespace App\Http\Middleware;

use Closure;
use App\Menu;
use App\Page;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class SystemUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */


     public function handle($request, Closure $next)
      {
          $slug = $request->getPathInfo();
          $str = ltrim($request->getPathInfo(), '/');          // dd($str);
          $menu = Menu::where('noid',$str)->first();          // dd($menu);
          if ($menu == null) {            // dd('ok');
            if ($menu == null) {
               return $next($request);
            }
            // return redirect('custom',[$str]);
              return redirect('/');
          }else{
            $page = Page::where('noid',$menu->linkidpage)->first();
            // dd($page->idtypepage);
            if ($page->idtypepage == 2) {
              $halaman = 'custom';
              return $next($request);
               return redirect('dashboard',[$str]);
              // return redirect()->route('dashboard.index');
            }
            if ($page->idtypepage == 9) {
              $halaman = 'dashboard';
              return $next($request);
              // return redirect('custom',[$str]);
              // dd(2);
            }
            // dd($halaman)

          }
        // dd($request->getPathInfo());
            // $user = Auth::user();
            // if($user->role === User::ROLE_ADMIN) {
            //     return $next($request);
            // }

            // return redirect('custom',[$str]);


        }
    // public function handle($request, Closure $next,$slug)
    // {
    //   dd($slug);
    //     return $next($request);
    // }
}
