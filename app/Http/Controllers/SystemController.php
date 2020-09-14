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

class SystemController extends Controller
{
  public function index(Request $request)
  {
    dd($request);
    $slug = $request->path();
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
            // $widgetgridfield = WidgetGridField::where('idcmswidgetgrid', $widgetgrid->noid)->where('newshow',1)->get();
      // dd($widgetgridfield);
    if ($page->idtypepage == 2) {
      return view('lam_modules.'.$namaview.'', compact(
        'noid',
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
        'idhomepage',
        'menu',
        'namatable',
         'page_description'));
    }else{
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

    public function ordertable(Request $request)
    {
      $data = $request->all();
      $table = $data['table'];
      $filter = $data['filter'];
      // dd($table);
      if ($table == 'genmcompany') {
          $datafilter = $data['title'];
        $data = DB::connection('mysql2')->table($table)->orderBy($datafilter, $filter)->get();
        $no = 1;
        foreach ($data as $key => $value) {
          $datatables['data'][] = array(
            "checkbox" =>'<input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">',
            "no" =>$no++,
            "kode"=>$value->kode,
            "nama"=>$value->nama,
            "namaalias"=>$value->namaalias,
            "keterangan"=>\Illuminate\Support\Str::limit($value->keterangan, 100, $end='...'),
            "isactive"=>$value->isactive,
            "issystem"=>$value->issystem,
            "idparent"=>$value->idparent,
            "level"=>$value->depthlevel,
            "action"=>'<div class="tools">
                  <a onclick="editDepartemen('.$value->noid.')" class="btn btn-icon btn-light-warning btn-circle btn-xs"><i class="fa fa-edit"></i> </a>
                  <a onclick="viewDepartemen('.$value->noid.')" class="btn btn-icon btn-light-info btn-circle btn-xs"><i class="fa fa-search"></i> </a>
                  <a onclick="hapusDepartemen('.$value->noid.')"  class="btn btn-icon btn-light-success btn-circle btn-xs"><i class="fa fa-trash"></i> </a></div>',
          );
        }
        // dd(json_encode($datatables));
        header("Content-type: application/json");
        header("Cache-Control: no-cache, must-revalidate");
        echo json_encode($datatables);

      }else{
        if ($data['title'] == 'Company') {
          $datafilter = 'genmcompany.nama';
        }else{
          $datafilter = $data['title'];
        }
        $data = DB::connection('mysql2')->table($table)->join('genmcompany', 'genmcompany.noid', '=', 'genmdepartment.idcompany')->orderBy($datafilter, $filter)->get();
        $no = 1;
        foreach ($data as $key => $value) {
          $company = Company::where('noid',$value->idcompany)->first();
          $datatables['data'][] = array(
            "checkbox" =>'<input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">',
            "no" =>$no++,
            "company"=>$company->nama,
            "kode"=>$value->kode,
            "nama"=>$value->nama,
            "namaalias"=>$value->namaalias,
            "keterangan"=>\Illuminate\Support\Str::limit($value->keterangan, 100, $end='...'),
            "isactive"=>$value->isactive,
            "issystem"=>$value->issystem,
            "idparent"=>$value->idparent,
            "level"=>$value->depthlevel,
            "action"=>'<div class="tools">
                  <a onclick="editDepartemen('.$value->noid.')" class="btn btn-icon btn-light-warning btn-circle btn-xs"><i class="fa fa-edit"></i> </a>
                  <a onclick="viewDepartemen('.$value->noid.')" class="btn btn-icon btn-light-info btn-circle btn-xs"><i class="fa fa-search"></i> </a>
                  <a onclick="hapusDepartemen('.$value->noid.')"  class="btn btn-icon btn-light-success btn-circle btn-xs"><i class="fa fa-trash"></i> </a></div>',
          );
        }
        // dd(json_encode($datatables));
        header("Content-type: application/json");
        header("Cache-Control: no-cache, must-revalidate");
        echo json_encode($datatables);
      }




    }

    public function savedata(Request $request)
    {
      $data = $request->all();
      $datapost=  array();
      $table = $data['data']['tabel'];
      parse_str($data['data']['data'], $datapost);
      if ($datapost['noid'] == '') {
          $total = DB::connection('mysql2')->table($table)->orderBy('noid','desc')->first();
          foreach($datapost as $key => $value)
            {
              $datapost['noid'] = $total->noid+1;
            }
      $in =   DB::connection('mysql2')->table($table)->insert(
          $datapost
      );
      echo json_encode(array(
        'status'=>'add',
        'table'=>'Company',
        'success'=>true
        ));
      }else{
         $array = \array_diff($datapost, ["noid" => $datapost['noid']]);
        $total = DB::connection('mysql2')->table($table)->where('noid',$datapost['noid'])->update($array);
        echo json_encode(array(
          'status'=>'edit',
          'table'=>'Company',
          'success'=>true
          ));
      }
    }

    public function ambildata2(Request $request)
    {
      $table = $request->get('table');
      // dd($table);
      $widget = Widget::where('maintable', $table)->first();
      $widgetgrid = WidgetGrid::where('idcmswidget', $widget->noid)->first();
      $widgetgridfield = WidgetGridField::where('idcmswidgetgrid', $widgetgrid->noid)->where('newshow',1)->orderBy('formurut','asc')->get();
      // foreach ($widgetgridfield as $key => $value) {
      //   $dd[] = $value->coltypefield;
      // }
      // dd($widgetgridfield);
      $isifield = '';
      foreach ($widgetgridfield as $key => $value) {
        if ($value->newreq == 1) {
          $required = 'required';
        }else{
          $required = '';
        }
        if ($value->coltypefield == 96) {
          $select = WidgetGridField::getField($value,$value->fieldname,$value->fieldcaption,$value->newreq);
          // dd($select);
          $isifield = $select;
        }elseif ($value->coltypefield == 1) {
          $isifield = '<input width="'.$value->colheight.'"  '.$required.' type="text" class="form-control form-control"
          id="'.$value->fieldname.'" name="'.$value->fieldname.'" placeholder="'.$value->fieldcaption.'">';
        }elseif ($value->coltypefield == 4 ) {
          $isifield = '<textarea width="'.$value->colheight.'" '.$required.' class="form-control form-control"  id="'.$value->fieldname.'" name="'.$value->fieldname.'" placeholder="'.$value->fieldcaption.'"></textarea>';
        }elseif ($value->coltypefield == 31 ) {
          $isifield = '<div class="checkbox-list">
              <label class="checkbox">
                  <input width="'.$value->colheight.'" '.$required.' type="checkbox" id="'.$value->fieldname.'" name="'.$value->fieldname.'">
                  <span></span>
                  '.$value->fieldname.'
              </label>
              </div>';
        }elseif ($value->coltypefield == 41 ) {
          $isifield = '<div class="checkbox-list">
              <label class="checkbox">
                  <input width="'.$value->colheight.'" '.$required.' type="checkbox" id="'.$value->fieldname.'" name="'.$value->fieldname.'">
                  <span></span>
                  '.$value->fieldname.'
              </label>
              </div>';
        }elseif ($value->coltypefield == 51  ) {
          $isifield = '<div class="checkbox-list">
              <label class="checkbox">
                  <input width="'.$value->colheight.'" '.$required.' type="checkbox" id="'.$value->fieldname.'" name="'.$value->fieldname.'">
                  <span></span>
                  '.$value->fieldname.'
              </label>
              </div>';
        }elseif ($value->coltypefield == 12  ) {
          $mytime = \Carbon\Carbon::now()->format('d-m-Y');
          $isifield = '<div class="input-group date">
            <input type="text" '.$required.' width="'.$value->colheight.'" class="datepicker form-control" data-provide="datepicker" readonly="readonly" value="'.$mytime.'"  id="'.$value->fieldname.'" name="'.$value->fieldname.'">
            <div class="input-group-append">
              <span class="input-group-text">
                <i class="la la-calendar"></i>
              </span>
            </div>
          </div>';
        }elseif ($value->coltypefield == 21  ) {
          $mytime = \Carbon\Carbon::now()->format('d-m-Y H:i');
          $isifield = '<div class="input-group date" id="kt_datetimepicker_1" data-target-input="nearest">
						<input type="text" class="datepicker2 form-control datetimepicker-input" placeholder="Select date &amp; time" data-target="#kt_datetimepicker_1">
						<div class="input-group-append" data-target="#kt_datetimepicker_1" data-toggle="datetimepicker">
							<span class="input-group-text">
								<i class="ki ki-calendar"></i>
							</span>
						</div>
					</div>';
          // $isifield = '<div class="input-group date">
          //   <input type="text" '.$required.' class="datepicker form-control" data-provide="datepicker" readonly="readonly" value="'.$mytime.'"  id="'.$value->fieldname.'" name="'.$value->fieldname.'">
          //   <div class="input-group-append">
          //     <span class="input-group-text">
          //       <i class="la la-calendar"></i>
          //     </span>
          //   </div>
          // </div>';
        }else{
          $isifield = '';
        }

        $data['field'][]= array(
          'label'=>$value->fieldcaption,
          'kode'=>$value->coltypefield,
          'field'=>$isifield,
        );
                // dd($data);
      }
      // dd($data['field']);

      header("Content-type: application/json");
      header("Cache-Control: no-cache, must-revalidate");
      echo json_encode($data);
    }


    public function ambildata(Request $request)
    {
      $table = $request->get('table');
      $widget = Widget::where('maintable', $table)->first();
      $widgetgrid = WidgetGrid::where('idcmswidget', $widget->noid)->first();
      $widgetgridfield = WidgetGridField::where('idcmswidgetgrid', $widgetgrid->noid)->where('newshow',1)->get();
      $datatables = DB::connection('mysql2')->table($table)->get();
      $data['columns'] = array('<input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">','no');
      for ($i=0; $i <count($widgetgridfield) ; $i++) {
        array_push($data['columns'], $widgetgridfield[$i]->fieldcaption);
      }
      array_push($data['columns'],'Action');
          $no = 1;
      foreach ($datatables as $key => $value) {
              $row = array();
        array_push($row,'<input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">');
        array_push($row,$no++);
        for ($i=0; $i <count($widgetgridfield) ; $i++) {
          $string = (string)$widgetgridfield[$i]->fieldname;
          array_push($row,$value->$string);
        }
        array_push($row,'<div class="tools">
                   <a onclick="editDepartemen('.$value->noid.')" class="btn btn-icon btn-light-warning btn-circle btn-xs"><i class="fa fa-edit"></i> </a>
                   <a onclick="viewDepartemen('.$value->noid.')" class="btn btn-icon btn-light-info btn-circle btn-xs"><i class="fa fa-search"></i> </a>
                   <a onclick="hapusDepartemen('.$value->noid.')"  class="btn btn-icon btn-light-success btn-circle btn-xs"><i class="fa fa-trash"></i> </a></div>');
        $data['data'][] =$row;
      }
      header("Content-type: application/json");
      header("Cache-Control: no-cache, must-revalidate");
      echo json_encode($data);
    }


    public function hapusdepartemen()
    {
        $namatable = $_POST['namatable'];
        $in =   DB::connection('mysql2')->table($namatable)->where('noid',$_POST['id'])->delete();
        echo json_encode('Berhasil');
    }

    public function editdepartemen(Request $request)
    {
            $data = $request->all();
            $table = $data['namatable'];
            $widget = Widget::where('maintable', $table)->first();
            $widgetgrid = WidgetGrid::where('idcmswidget', $widget->noid)->first();
            $widgetgridfield = WidgetGridField::where('idcmswidgetgrid', $widgetgrid->noid)->where('editshow',1)->get();
            $id = $data['id'];
            $datatab = DB::connection('mysql2')->table($table)->where('noid',$id)->first();
            $no = 1;

            foreach ($widgetgridfield as $key => $value) {
              $string = (string)$widgetgridfield[$key]->fieldname;
              $hasil[] = array(
                $widgetgridfield[$key]->fieldname =>$datatab->$string,
              );
            }
            $hasil2[] = array(
              'noid' =>$id,
            );
            $hasilsemua = array_merge($hasil,$hasil2);
            // dd($hasil);
                      echo json_encode($hasilsemua);
      //       foreach ($datatab as $key => $value) {
      //           $dataarray = array(
      //
      //           );
      //       }
      //       dd($datatab);
      // if ($_POST['namatable'] == 'genmcompany') {
      //   $departement = Company::where('noid',$_POST['id'])->first();
      //   $data = array(
      //     'noid'=>$departement->noid,
      //     'kode'=>$departement->kode,
      //     'nama'=>$departement->nama,
      //     'namaalias'=>$departement->namaalias,
      //     'keterangan'=>$departement->keterangan,
      //     'isactive'=>$departement->isactive,
      //     'issystem'=>$departement->issystem,
      //     'nourut'=>$departement->nourut,
      //     'idparent'=>$departement->idparent,
      //     'depthlevel'=>$departement->depthlevel,
      //     'classicon'=>$departement->classicon,
      //     'idcreate'=>$departement->idcreate,
      //     'docreate'=>$departement->docreate,
      //     'idupdate'=>$departement->idupdate,
      //     'lastupdate'=>$departement->lastupdate
      //   );
      //   echo json_encode($data);
      // }else{
      //   $departement = Departement::where('noid',$_POST['id'])->first();
      //   $company = Company::where('noid',$departement->idcompany)->first();
      //   $data = array(
      //     'noid'=>$departement->noid,
      //     'company'=>$departement->idcompany,
      //     'kode'=>$departement->kode,
      //     'nama'=>$departement->nama,
      //     'namaalias'=>$departement->namaalias,
      //     'keterangan'=>$departement->keterangan,
      //     'isactive'=>$departement->isactive,
      //     'issystem'=>$departement->issystem,
      //     'nourut'=>$departement->nourut,
      //     'idparent'=>$departement->idparent,
      //     'depthlevel'=>$departement->depthlevel,
      //     'classicon'=>$departement->classicon,
      //     'idcreate'=>$departement->idcreate,
      //     'docreate'=>$departement->docreate,
      //     'idupdate'=>$departement->idupdate,
      //     'lastupdate'=>$departement->lastupdate
      //   );
      //   echo json_encode($data);
      // }

    }



}
