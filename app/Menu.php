<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
Use DB;

class Menu extends Model
{
  protected $connection = 'mysql';
  use Notifiable;
  protected $table = 'cmsmenu';

  public static  function getAll()
  {
    $users = DB::table('cmsmenu')
                  ->whereIn('menulevel', [1, 2])
                  ->where('isactive',1)
                  ->where('ispublic',1)
                  ->get();
                  foreach($users as $menu)
    {
         $submenu = DB::table('cmsmenu')
                  ->whereIn('menulevel', [1, 2])
                  ->where('isactive',1)
                  ->where('idparent',$menu->noid)
                  ->groupBy('nourut')
                  ->groupBy('groupmenu')
                  ->get();
                  if (empty($submenu)) {
                    $menu->submenu = [];
                  }else{
                     $menu->submenu = $submenu;
                  }
        $data[] = $menu;
    }
    // print_r($data);die();
    return $data;

    // return $users;
  }

  public static  function getAllAfter()
  {
    // SELECT * FROM cmsmenu WHERE menulevel IN (1,2) AND isactive = 1 ORDER BY nourut, groupmenu
    $users = DB::table('cmsmenu')
                  ->whereIn('menulevel', [1, 2])
                  ->where('isactive',1)
                  ->orderBy('noid')
                  ->groupBy('nourut')
                  ->groupBy('groupmenu')
                  ->get();
                  $data = [];
                  foreach($users as $menu)
    {
         $submenu = DB::table('cmsmenu')
                  ->whereIn('menulevel', [1, 2])
                  ->where('isactive',1)
                  ->where('idparent',$menu->noid)
                  ->orderBy('noid')
                  ->groupBy('nourut')
                  ->groupBy('groupmenu')
                  ->get();
                  if (empty($submenu)) {
                    $menu->submenu = [];
                  }else{
                     $menu->submenu = $submenu;
                  }
        $data[] = $menu;
    }
    // print_r($data);die();
    return $data;
    // return $users;
  }

  public static  function getSidebar()
  {
    // SELECT * FROM cmsmenu WHERE menulevel IN (3,4) AND isactive = 1 AND ispublic = 1
    $users = DB::table('cmsmenu')
                  ->whereIn('menulevel', [3, 4])
                  ->where('isactive',1)
                  ->where('ispublic',1)
                  ->get();
    return $users;
  }

  public static function ambilQuery($dat)
  {
$str1 = str_replace('"',' ',$dat);
$programs=DB::connection('mysql2')->select($str1);

return $programs;
  }

  public static function ambilQuery2($dat)
  {
    $str1 = str_replace('"',' ',$dat);
    $programs=DB::connection('mysql2')->select($str1);
    dd($programs);
    return $programs;
  }

  public static  function getSidebarLoginBaru($id)
  {
    $menu = DB::select("SELECT * FROM cmsmenu WHERE menulevel IN (3,4) AND isactive = 1 AND ispublic = 1 ORDER BY nourut, groupmenu");
    return $menu;
    // $sql = "SELECT * FROM cmsmenu WHERE menulevel IN (3,4) AND isactive = 1 AND ispublic = 1 ORDER BY nourut, groupmenu";

  }
  public static  function getSidebarLogin($id)
  {

    $dataini = DB::table('cmsmenu')
                  ->where('noid', $id)
                  ->first();
                  $page = DB::table('cmspage')
                                ->where('noid', $dataini->linkidpage)
                                ->first();

                  // if ($dataini->linkidpage == 0) {
                  //   dd('1');
                    $dataku = DB::select("SELECT *
                    FROM cmsmenu
                    WHERE idparent = (
                    	SELECT idparent
                    	FROM cmsmenu
                    	WHERE noid = (
                    		SELECT idparent
                    		FROM cmsmenu
                    		WHERE (linkidpage = $page->noid) AND (menulevel =4)
                    		ORDER BY noid
                    		LIMIT 0, 1)
                    	LIMIT 0,1)
                      Group By groupmenu
                    ORDER BY groupmenu, nourut");
                  // }else{
                  //   dd('2');
                  //   $dataku = DB::table('cmsmenu')
                  //                 ->where('menulevel', 3)
                  //                 ->where('isactive',1)
                  //                 ->where('idparent',$id)
                  //                 ->groupBy('groupmenu')
                  //                 ->orderBy('noid')
                  //                 ->get();
                  //
                  // }
    // SELECT * FROM cmsmenu WHERE menulevel IN (3,4) AND isactive = 1 ORDER BY nourut, groupmenu
return $dataku;

}
  public static function getAllPanel($data)
  {
$dataku = DB::select("
    SELECT
  a.noid AS panel_noid,
  a.idpage AS panel_idpage,
  a.idwidget AS panel_idwidget,
  a.idparentpagepanel AS panel_idparentpagepanel,
  a.idgridaction AS panel_idgridaction,
  a.nospan AS panel_nospan,
  a.nospanxs AS panel_nospanxs,
  a.norow AS panel_norow,
  a.nocol AS panel_nocol,
  a.widget_pull AS panel_widget_pull,
  a.panelheigth AS panel_panelheigth,
  a.isportletframe AS panel_isportletframe,
  a.isonetoone AS panel_isonetoone,
  a.isshowonedit AS panel_isshowonedit,
  a.istabbed AS panel_istabbed,
  a.tabcaption AS panel_tabcaption,
  a.dataparam AS panel_dataparam,
  a.panelconfig AS panel_panelconfig,
  a.istabpanel AS panel_istabpanel,
  a.tabpanelcaption AS panel_tabpanelcaption,
  b.noid AS widget_noid,
  b.idtypewidget AS widget_idtypewidget,
  b.kode AS widget_kode,
  b.widgetcaption AS widget_widgetcaption,
  b.widgetsubcaption AS widget_widgetsubcaption,
  b.maintable AS widget_maintable,
  b.keterangan AS widget_keterangan,
  b.idlevelsecurity AS widget_idlevelsecurity,
  b.panelcolor AS widget_panelcolor,
  b.widgeticon AS widget_widgeticon,
  b.usepanel AS widget_usepanel,
  b.panelclose AS widget_panelclose,
  b.panelconfig AS widget_panelconfig,
  b.panelcolapse AS widget_panelcolapse,
  b.panelrefresh AS widget_panelrefresh,
  b.moreidpage AS widget_moreidpage,
  b.dataurl AS widget_dataurl,
  b.dataquery AS widget_dataquery,
  b.widgetconfig AS widget_widgetconfig,
  b.queryjoin AS widget_queryjoin,
  b.querywhere AS widget_querywhere,
  b.queryorderby AS widget_queryorderby,
  b.querygroupby AS widget_querygroupby,
  b.querylimit AS widget_querylimit,
  b.configwidget AS widget_configwidget,
  b.viewtable AS widget_viewtable,
  b.idconnection AS widget_idconnection,
  b.queryselect AS widget_queryselect
FROM
  cmspagepanel a
  LEFT JOIN cmswidget b ON a.idwidget = b.noid
WHERE a.idpage = $data
ORDER BY a.norow, a.nocol");
return $dataku;
  }



}
