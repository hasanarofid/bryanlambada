<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
Use DB;

class WidgetGridField extends Model
{
  use Notifiable;
  protected $connection = 'mysql';
  protected $table = 'cmswidgetgridfield';
  public static function getField($value,$val2, $val3,$req)
  {

    if ($req == 1) {
      $required = 'required';
    }else{
      $required = '';
    }

      $conv = json_decode($value->lookupconfig, true);
      if ($conv == null) {
        $table = $value->tablename;
        $list = $value->lookupconfig;
        $stripped =explode(";",$list);
        array_pop($stripped);
        $selct = implode(",",$stripped);
        $stripped2 =explode(";",$list);
        $end = end($stripped2);
        $selct2 = "select ".$selct." from ".$end;
        $hasi = DB::connection('mysql2')->select($selct2);
        $select = '';
        $sel = array('<select width="'.$value->colheight.'" '.$required.' class="form-control form-control-solid" id="'.$val3.'" name="'.$val2.'">');
        foreach ($hasi as $key2 => $value2) {
                      array_push($sel, '<option value="'.$value2->noid.'" >'.$value2->nama.'</option>');
        }
          array_push($sel, '</select>');
          foreach ($sel as $key3 => $value3) {
            $select .= $sel[$key3];
          }
        }else{
                $convselect = $conv['LookupConfig']['FormLookup']['dataquery'];
                $select = '';
                  $hasil = DB::connection('mysql2')->select($convselect);

                  $sel = array('<select '.$required.' width="'.$value->colheight.'" class="form-control form-control-solid" id="'.$val3.'" name="'.$val2.'">');
                  foreach ($hasil as $key2 => $value2) {
                                array_push($sel, '<option value="'.$value2->noid.'" >'.$value2->nama.'</option>');
                  }
                    array_push($sel, '</select>');

                  foreach ($sel as $key3 => $value3) {
                    $select .= $sel[$key3];
                  }
      }



      return $select;
  }
}
