{{-- Extends layout --}}
@extends('layout.default')
                            <link href="//www.amcharts.com/lib/3/plugins/export/export.css?v=7.0.6" rel="stylesheet" type="text/css"/>
{{-- Content --}}
@section('content')
    {{-- Dashboard 1 --}}
  @if ($data_page != '')
    <div class="subheader py-2 py-lg-4  subheader-solid " id="kt_subheader">
        <div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <div class="d-flex align-items-center flex-wrap mr-2">
              <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                @if($page_title == '')
                Lambada
                @else
                      {{ $data_page[0]->PageCaption->pagecaption }}
                @endif
                  </h5>
                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
                <span class="text-muted font-weight-bold mr-4">
                  @if($page_description == '')
                  Sistem Lamada
                  @else
                        {{ $data_page[0]->PageCaption->pagesubcaption }}
                  @endif
                </span>
            </div>
            <div class="d-flex align-items-center">
                <a href="#" class="btn btn-clean  btn-sm font-weight-bold font-size-base mr-1">
                    Today
                </a>
                <a href="#" class="btn btn-clean btn-sm font-weight-bold font-size-base  mr-1">
                    Month
                </a>
                <a href="#" class="btn btn-clean btn-sm font-weight-bold font-size-base mr-1">
                    Year
                </a>
                    <a href="#" class="btn btn-sm btn-light font-weight-bold mr-2" id="kt_dashboard_daterangepicker" data-toggle="tooltip" title="" data-placement="left" data-original-title="Select dashboard daterange">
                        <span class="text-muted font-size-base font-weight-bold mr-2" id="kt_dashboard_daterangepicker_title">Today:</span>
                        <span class="text-primary font-size-base font-weight-bolder" id="kt_dashboard_daterangepicker_date">Jul 24</span>
                    </a>
                <div class="dropdown dropdown-inline" data-toggle="tooltip" title="" data-placement="left" data-original-title="Quick actions">
                    <a href="#" class="btn btn-sm btn-clean btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="svg-icon svg-icon-success svg-icon-lg"><!--begin::Svg Icon | path:assets/media/svg/icons/Files/File-plus.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <polygon points="0 0 24 0 24 24 0 24"></polygon>
            <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
            <path d="M11,14 L9,14 C8.44771525,14 8,13.5522847 8,13 C8,12.4477153 8.44771525,12 9,12 L11,12 L11,10 C11,9.44771525 11.4477153,9 12,9 C12.5522847,9 13,9.44771525 13,10 L13,12 L15,12 C15.5522847,12 16,12.4477153 16,13 C16,13.5522847 15.5522847,14 15,14 L13,14 L13,16 C13,16.5522847 12.5522847,17 12,17 C11.4477153,17 11,16.5522847 11,16 L11,14 Z" fill="#000000"></path>
        </g>
    </svg><!--end::Svg Icon--></span>                </a>
                    <div class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right py-3">
                        <!--begin::Navigation-->
    <ul class="navi navi-hover py-5">
        <li class="navi-item">
            <a href="#" class="navi-link">
                <span class="navi-icon"><i class="flaticon2-drop"></i></span>
                <span class="navi-text">New Group</span>
            </a>
        </li>
        <li class="navi-item">
            <a href="#" class="navi-link">
                <span class="navi-icon"><i class="flaticon2-list-3"></i></span>
                <span class="navi-text">Contacts</span>
            </a>
        </li>
        <li class="navi-item">
            <a href="#" class="navi-link">
                <span class="navi-icon"><i class="flaticon2-rocket-1"></i></span>
                <span class="navi-text">Groups</span>
                <span class="navi-link-badge">
                    <span class="label label-light-primary label-inline font-weight-bold">new</span>
                </span>
            </a>
        </li>
        <li class="navi-item">
            <a href="#" class="navi-link">
                <span class="navi-icon"><i class="flaticon2-bell-2"></i></span>
                <span class="navi-text">Calls</span>
            </a>
        </li>
        <li class="navi-item">
            <a href="#" class="navi-link">
                <span class="navi-icon"><i class="flaticon2-gear"></i></span>
                <span class="navi-text">Settings</span>
            </a>
        </li>

          <li class="navi-separator my-3"></li>

        <li class="navi-item">
            <a href="#" class="navi-link">
                <span class="navi-icon"><i class="flaticon2-magnifier-tool"></i></span>
                <span class="navi-text">Help</span>
            </a>
        </li>
        <li class="navi-item">
            <a href="#" class="navi-link">
                <span class="navi-icon"><i class="flaticon2-bell-2"></i></span>
                <span class="navi-text">Privacy</span>
                <span class="navi-link-badge">
                    <span class="label label-light-danger label-rounded font-weight-bold">5</span>
                </span>
            </a>
        </li>
    </ul>
    <!--end::Navigation-->
                    </div>
                </div>
                <!--end::Dropdowns-->
            </div>
            <!--end::Toolbar-->
        </div>
    </div>
    @endif

    @if($widget != '')
    <div class="row" style="margin-top:10px">
        <div class="col-lg-{{$widget[0]->panel_nospan}}">
          {{$widget[0]->panel_nospan}}
          @php
          dd($widget);
          $tuu = App\Widget::where('noid', 1000000301)->get();
          dd($tuu);
          $datachart2 = json_encode($widget[0]->widget_dataquery);
          $string = $string = trim(preg_replace('/\s+/', ' ', $widget[0]->widget_dataquery));
          $dau = preg_replace('/[^A-Za-z0-9\-]/', ' ', $datachart2);
          dd($string);
          $res = str_replace( array( '\'', '"',
    ',' , ';', '<', '>' ), ' ', json_encode($widget[0]->widget_dataquery));
          dd($res);
          $hasi2 =\App\Menu::ambilQuery($datachart2[0]->query);

          @endphp
        </div>
        <div class="col-lg-{{$widget[1]->panel_nospan}}">
          {{$widget[1]->panel_nospan}}
          <div class="row">
            <div class="col-lg-{{$widget[2]->panel_nospan}}">
              {{$widget[2]->panel_nospan}}
            </div>
            <div class="col-lg-{{$widget[3]->panel_nospan}}">
              {{$widget[3]->panel_nospan}}
            </div>
          </div>
          <div class="row">
            <div class="col-lg-{{$widget[4]->panel_nospan}}">
              {{$widget[4]->panel_nospan}}
            </div>

            <div class="col-lg-{{$widget[5]->panel_nospan}}">
              {{$widget[5]->panel_nospan}}
            </div>
            <div class="col-lg-{{$widget[6]->panel_nospan}}">
              {{$widget[6]->panel_nospan}}
            </div>
          </div>

        </div>











    </div>

    @endif
@endsection
{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>
    <script src="//www.amcharts.com/lib/3/amcharts.js?v=7.0.6"></script>
    <script src="//www.amcharts.com/lib/3/serial.js?v=7.0.6"></script>
    <script src="//www.amcharts.com/lib/3/radar.js?v=7.0.6"></script>
    <script src="//www.amcharts.com/lib/3/pie.js?v=7.0.6"></script>
    <script src="//www.amcharts.com/lib/3/plugins/tools/polarScatter/polarScatter.min.js?v=7.0.6"></script>
    <script src="//www.amcharts.com/lib/3/plugins/animate/animate.min.js?v=7.0.6"></script>
    <script src="//www.amcharts.com/lib/3/plugins/export/export.min.js?v=7.0.6"></script>
    <script src="//www.amcharts.com/lib/3/themes/light.js?v=7.0.6"></script>
    <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
@endsection
