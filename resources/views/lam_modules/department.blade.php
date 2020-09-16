{{-- Extends layout --}}

@extends('layout_lambada.default')

@if($widgetgrid == null)



@else

@section('styles')

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedcolumns/3.3.1/css/fixedColumns.dataTables.min.css">

    <style media="screen">

    th, td { white-space: nowrap; }

      div.dataTables_wrapper {

          margin: 0 auto;

      }

      .fixed-div{

        position : fixed;

        top: 0;

        right: 0;

      }

      .hover{

          background-color: red;

      }

      #example{

    border-bottom: none;

}

#example tr:last-child td:not(.options){ /* <---- options will be the class for last column */

    border-bottom: 1px solid;

}

#example .options{

    background: white;

    border: none;

}

      /* .table-hover tbody tr:hover td, .table-hover tbody tr:hover th {

      background-color: #90CAF9 !important;

    } */





.table-hover>tbody>tr:nth-child(odd)>td,

.table-hover>tbody>tr:nth-child(odd)>th {

   background-color: white !important;

 }

.table-hover>tbody>tr:nth-child(even)>td,

.table-hover>tbody>tr:nth-child(even)>th {

   background-color: #BBDEFB !important;

 }





    </style>



@endsection

@section('content')

<div class="card card-custom">

        	<div class="card-header bg-primary d-flex">

        		<div class="card-title">

                    <span class="card-icon">

                        <i class="{{ $widget->widgeticon }} text-white"></i>

                    </span>

        			<h3 class="card-label text-white">

        				{{ $widget->widgetcaption }}

        			</h3>

        		</div>

                <div class="card-toolbar" >

                  <div id="tool-pertama">

                    <a onclick="AddData()" class="btn btn-sm btn-success">

                        <i class="fa fa-save"></i> Tambah Data

                    </a>

                  </div>

                  <div id="tool-kedua">

                    <a id="savedata" class="btn btn-sm btn-info">

                        <i class="fa fa-save"></i> Save

                    </a>

                    <a onclick="CancelData()" class="btn btn-sm btn-warning">

                        <i class="fa fa-reply"></i> Cancel

                    </a>

                  </div>

                  <div id="tool-ketiga">

                    <a id="back" class="btn btn-sm btn-warning" onclick="CancelData()" >

                        <i class="fa fa-reply"></i> Back

                    </a>

                  </div>

                </div>

        	</div>

        	<div class="card-body">

            <div id="from-departement">

              <form class="form" id="formdepartement" >

              </form>

            </div>

            <div id="tabledepartemen" class="table-responsive" style="width: 100%;">

              <div id="divsucces" class="alert alert-custom alert-light-success fade show mb-5" role="alert">

                <p id="notiftext"></p>

              </div>

              <div id="datad">

              </div>

            </div>

            </div>

        </div>

        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

        <input type="hidden" name="namatable" id="namatable" value="{{ $namatable }}">

@endsection

@section('scripts')

<script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>

  <script src="{{ asset('js/pages/crud/forms/widgets/bootstrap-datepicker.js?v=7.0.6') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs/dist/tf.min.js"> </script>

<script type="text/javascript" src="  https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/fixedcolumns/3.3.1/js/dataTables.fixedColumns.min.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.10.21/api/sum().js"></script>

<script src="{{ asset('js/custom.min.js') }}"></script>

@stop



@endif

