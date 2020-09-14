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
use Illuminate\Support\Facades\DB;

class APIController extends Controller
{

    public function getDepartement()
    {

      $idhomepagelink = $_POST['idhomepagelink'];
      $widget = Widget::where('kode', $idhomepagelink)->first();
      $widgetgrid = WidgetGrid::where('idcmswidget', $widget->noid)->first();
      $widgetgridfield = WidgetGridField::where('idcmswidgetgrid', $widgetgrid->noid)->where('colshow',1)->get();
      // dd($widgetgridfield);
        $arr = Departement::latest()->get();
        $data[];
        foreach ($arr as $key => $value) {
          $data[$key] = $value;
        }
        return response()->json(['data' => $data]);
    }

}
