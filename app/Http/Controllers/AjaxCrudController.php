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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Validator;

class AjaxCrudController extends Controller
{

    public function index(Request $request)
   {

       if ($request->ajax()) {
           $data = Departement::latest()->get();
           dd($data);
           return Datatables::of($data)
                   ->addIndexColumn()
                   ->addColumn('action', function($row){

                          $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Edit</a>';

                          $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a>';

                           return $btn;
                   })
                   ->rawColumns(['action'])
                   ->make(true);
       }

       // return view('productAjax',compact('products'));
   }
  

}
