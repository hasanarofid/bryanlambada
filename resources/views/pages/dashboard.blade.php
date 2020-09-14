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
    @php
    $datachart = json_decode($widget[5]->widget_dataquery);
    $hasi =\App\Menu::ambilQuery($datachart[0]->query);
    @endphp
    @if($widget != '')
              <div class="row" style="margin-top:10px">
    @if($dashboard == 0)
        @if($widget[0]->widget_idtypewidget == 151)
        @php
        $key = 151;
      ${"'q'.$key"}  =  json_decode($widget[0]->widget_configwidget);
        ${"'hasil'.$key"} = ${"'q'.$key"}->Widget_Slider->datasource->dataquery;
    ${"'data1'.$key"} =\App\Menu::ambilQuery(${"'hasil'.$key"});
      @endphp
      <div class="col-sm-{{ $widget[0]->panel_nospan }}">
        <div class="card card-custom card-stretch gutter-b">
          <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="height:{{$widget[0]->panel_panelheigth}}px;margin-bottom:10px;">
            <ol class="carousel-indicators">
              @for($i = 0; $i <= count(${"'data1'.$key"}); $i++)
              <li data-target="#carouselExampleIndicators" data-slide-to="{{ $i }}" class="{{ $i == 0 ? ' active' : '' }}"></li>
              @endfor
          </ol>
          @foreach(${"'data1'.$key"}  as $key => $slider)
              <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                    <img src="http://placehold.it/730x530" alt="Slide 1">
                  <div class="carousel-caption">
                    {{ $slider->newstitle }}
                  </div>
              </div>
              @endforeach
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
        </div>
      </div>
      @endif
      @if($widget[1]->widget_idtypewidget == 10)
      @php
      $key2 = 10;
      ${"'q'.$key2"}  =  json_decode($widget[1]->widget_configwidget);
      ${"'hasil'.$key2"} = ${"'q'.$key2"}->Widget_Stat->datasource->dataquery;
      ${"'data1'.$key2"} =\App\Menu::ambilQuery(${"'hasil'.$key2"});
      @endphp
      <div class="col-lg-{{$widget[1]->panel_nospan}}">
        @foreach(${"'data1'.$key2"} as $stat)
            <div class="card  card-stretch card-stretch-half gutter-b">
              <div class="card-body p-0" style="position: relative;">
               <div class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
                   <span class="symbol  symbol-50 symbol-light-success mr-2">
                       <span class="symbol-label">
                           <span class="svg-icon svg-icon-xl svg-icon-success">
                             <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                               <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                   <rect x="0" y="0" width="24" height="24"></rect>
                                   <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5"></rect>
                                   <path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3"></path>
                               </g>
                             </svg>
                           </span>
                      </span>
                   </span>
                   <div class="d-flex flex-column text-right">
                       <span class="text-dark-75 font-weight-bolder font-size-h3">{{$stat->jumlahdata}}</span>
                       <span class="text-muted font-weight-bold mt-2">{{ $widget[1]->widget_widgetcaption }}</span>
                   </div>
               </div>
            </div>
            </div>
            @endforeach
            @php
            $key3 = 111;
            ${"'q'.$key3"}  =  json_decode($widget[2]->widget_configwidget);
            ${"'hasil'.$key3"} = ${"'q'.$key3"}->Widget_Stat->datasource->dataquery;
            ${"'data1'.$key3"} =\App\Menu::ambilQuery(${"'hasil'.$key3"});
            @endphp
            @foreach(${"'data1'.$key3"} as $stat)
                <div class="card  card-stretch card-stretch-half gutter-b">
                  <div class="card-body p-0" style="position: relative;">
                   <div class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
                       <span class="symbol  symbol-50 symbol-light-success mr-2">
                           <span class="symbol-label">
                               <span class="svg-icon svg-icon-xl svg-icon-success">
                                 <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                   <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                       <rect x="0" y="0" width="24" height="24"></rect>
                                       <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5"></rect>
                                       <path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3"></path>
                                   </g>
                                 </svg>
                               </span>
                          </span>
                       </span>
                       <div class="d-flex flex-column text-right">
                           <span class="text-dark-75 font-weight-bolder font-size-h3">{{$stat->jumlahdata}}</span>
                           <span class="text-muted font-weight-bold mt-2">{{ $widget[2]->widget_widgetcaption }}</span>
                       </div>
                   </div>
                </div>
                </div>
                @endforeach
                @php
                $key4 = 111;
                ${"'q'.$key4"}  =  json_decode($widget[3]->widget_configwidget);
                ${"'hasil'.$key4"} = ${"'q'.$key4"}->Widget_Stat->datasource->dataquery;
                ${"'data1'.$key4"} =\App\Menu::ambilQuery(${"'hasil'.$key4"});
                @endphp
                @foreach(${"'data1'.$key4"} as $stat)
                    <div class="card  card-stretch card-stretch-half gutter-b">
                      <div class="card-body p-0" style="position: relative;">
                       <div class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
                           <span class="symbol  symbol-50 symbol-light-success mr-2">
                               <span class="symbol-label">
                                   <span class="svg-icon svg-icon-xl svg-icon-success">
                                     <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                       <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                           <rect x="0" y="0" width="24" height="24"></rect>
                                           <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5"></rect>
                                           <path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3"></path>
                                       </g>
                                     </svg>
                                   </span>
                              </span>
                           </span>
                           <div class="d-flex flex-column text-right">
                               <span class="text-dark-75 font-weight-bolder font-size-h3">{{$stat->jumlahdata}}</span>
                               <span class="text-muted font-weight-bold mt-2">{{ $widget[3]->widget_widgetcaption }}</span>
                           </div>
                       </div>
                    </div>
                    </div>
                    @endforeach
                    @php
                    $key5 = 111;
                    ${"'q'.$key5"}  =  json_decode($widget[4]->widget_configwidget);
                    ${"'hasil'.$key5"} = ${"'q'.$key5"}->Widget_Stat->datasource->dataquery;
                    ${"'data1'.$key5"} =\App\Menu::ambilQuery(${"'hasil'.$key5"});
                    @endphp
                    @foreach(${"'data1'.$key5"} as $stat)
                        <div class="card  card-stretch card-stretch-half gutter-b">
                          <div class="card-body p-0" style="position: relative;">
                           <div class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
                               <span class="symbol  symbol-50 symbol-light-success mr-2">
                                   <span class="symbol-label">
                                       <span class="svg-icon svg-icon-xl svg-icon-success">
                                         <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                           <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                               <rect x="0" y="0" width="24" height="24"></rect>
                                               <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5"></rect>
                                               <path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3"></path>
                                           </g>
                                         </svg>
                                       </span>
                                  </span>
                               </span>
                               <div class="d-flex flex-column text-right">
                                   <span class="text-dark-75 font-weight-bolder font-size-h3">{{$stat->jumlahdata}}</span>
                                   <span class="text-muted font-weight-bold mt-2">{{ $widget[4]->widget_widgetcaption }}</span>
                               </div>
                           </div>
                        </div>
                        </div>
                        @endforeach
            </div>
              @endif
              @if($widget[5]->widget_idtypewidget = 23)
              @php
              $datachart = json_decode($widget[5]->widget_dataquery);
              $hasi =\App\Menu::ambilQuery($datachart[0]->query);
              @endphp
              <div class="col-lg-{{$widget[5]->panel_nospan}}">
                <div class="card card-custom gutter-b">
                	<div class="card-header">
                		<div class="card-title">
                			<h3 class="card-label">
                				{{ $widget[5]->widget_widgetcaption }}
                			</h3>
                		</div>
                	</div>
                	<div class="card-body">
                		<div id="kt_amcharts_1" style="width: 100%; height: 500px;"></div>
                	</div>
                </div>
              </div>
              @endif
                            @if($widget[6]->widget_idtypewidget = 23)
                @php
                $datachart2 = json_decode($widget[6]->widget_dataquery);
                $hasi2 =\App\Menu::ambilQuery($datachart2[0]->query);
                @endphp
                <div class="col-lg-{{$widget[6]->panel_nospan}}">
                <div class="card card-custom gutter-b">
                	<div class="card-header">
                		<div class="card-title">
                			<h3 class="card-label">
                				{{ $widget[6]->widget_widgetcaption }}
                			</h3>
                		</div>
                	</div>
                	<div class="card-body">
                		<div id="kt_amcharts_12" style="height: 500px; overflow: visible; text-align: left;"></div>
                	</div>
                </div>
              </div>
              </div>
              @endif
                            @if($widget[7]->widget_idtypewidget = 23)
                  @php
                $datachart3 = json_decode($widget[7]->widget_dataquery);
                $hasi3 =\App\Menu::ambilQuery($datachart3[0]->query);
                @endphp
                <div class="col-lg-{{$widget[7]->panel_nospan}}">
                <div class="card card-custom gutter-b">
                	<div class="card-header">
                		<div class="card-title">
                			<h3 class="card-label">
                				{{ $widget[7]->widget_widgetcaption }}
                			</h3>
                		</div>
                	</div>
                	<div class="card-body">
                    <div id="kt_amcharts_bawah" style="width: 100%; height: 500px;"></div>
                		</div>
                </div>
              </div>
              </div>
              @endif

@endif
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
  <script type="text/javascript">
    var dataatas = {!! json_encode($hasi) !!};
         // console.log(data);
        var dataProvideratas = [];// this variable you have to pass in dataProvider inside chart
        for(var key in dataatas) {
          dataProvideratas.push({
            category: dataatas[key]['categories'],
            visits: dataatas[key]['jumlahdata'],
          });
        }

        var chart = AmCharts.makeChart("kt_amcharts_1", {
          "rtl": KTUtil.isRTL(),
          "type": "serial",
           "hideCredits":true,
          "theme": "light",
          "dataProvider": dataProvideratas,
          "valueAxes": [{
            "gridColor": "#FFFFFF",
            "gridAlpha": 0.2,
            "dashLength": 0
          }],
          "series": [{
              "type": "LineSeries",
              "stroke": "#ff0000",
              "strokeWidth": 3
            }],
"valueAxes": [ {
    "position": "left",
    "title": "Jumlah Data"
  }, {
    "position": "bottom",
    "title": @json($widget[5]->widget_widgetcaption)
  } ],
  "legend": {
   "useGraphSettings": true
 },
 "titles": [
   {
     "size": 15,
     "text": @json($widget[5]->widget_widgetcaption)
   },
   {
        "text": @json($widget[5]->widget_widgetsubcaption),
        "bold": false
    }
 ],
          "gridAboveGraphs": true,
          "startDuration": 1,
          "graphs": [{
            "balloonText": "[[category]]: <b>[[value]]</b>",
            "fillAlphas": 0.8,
            "lineAlpha": 0.2,
            "type": "column",
            "valueField": "visits",
            "title": @json($widget[5]->widget_widgetcaption)
          }],
          "chartCursor": {
            "categoryBalloonEnabled": false,
            "cursorAlpha": 0,
            "zoomable": false
          },
          "categoryField": "category",
          "categoryAxis": {
            "gridPosition": "start",
            // "gridAlpha": 0,
            // "tickPosition": "start",
            // "tickLength": 20
          },
          "export": {
            "enabled": true
          }
        });

        var databawah = {!! json_encode($hasi3) !!};

             console.log(data);
            var dataProviderBawah = [];// this variable you have to pass in dataProvider inside chart
            for(var key in databawah) {
              dataProviderBawah.push({
                category: databawah[key]['namabulan'],
                visits: databawah[key]['jumlahdata'],
              });
            }


        var chart_bawah = AmCharts.makeChart("kt_amcharts_bawah", {
          "rtl": KTUtil.isRTL(),
          "type": "serial",
           "hideCredits":true,
          "theme": "light",
          "dataProvider": dataProviderBawah,
          "valueAxes": [{
            "gridColor": "#FFFFFF",
            "gridAlpha": 0.2,
            "dashLength": 0
          }],
          "series": [{
              "type": "LineSeries",
              "stroke": "#ff0000",
              "strokeWidth": 3
            }],
"valueAxes": [ {
    "position": "left",
    "title": "Jumlah Data"
  }, {
    "position": "bottom",
    "title": @json($widget[7]->widget_widgetcaption)
  } ],
  "legend": {
   "useGraphSettings": true
 },
 "titles": [
   {
     "size": 15,
     "text": @json($widget[7]->widget_widgetcaption)
   },
   {
        "text": @json($widget[7]->widget_widgetsubcaption),
        "bold": false
    }
 ],
          "gridAboveGraphs": true,
          "startDuration": 1,
          "graphs": [{
            "balloonText": "[[category]]: <b>[[value]]</b>",
            "fillAlphas": 0.8,
            "lineAlpha": 0.2,
            "type": "column",
            "valueField": "visits",
            "title": @json($widget[7]->widget_widgetcaption)
          }],
          "chartCursor": {
            "categoryBalloonEnabled": false,
            "cursorAlpha": 0,
            "zoomable": false
          },
          "categoryField": "category",
          "categoryAxis": {
            "gridPosition": "start",
            // "gridAlpha": 0,
            // "tickPosition": "start",
            // "tickLength": 20
          },
          "export": {
            "enabled": true
          }
        });
        var data = {!! json_encode($hasi2) !!};
             // console.log(data);
            var dataProvider = [];// this variable you have to pass in dataProvider inside chart
            for(var key in data) {
              dataProvider.push({
                country: data[key]['messagestatus'],
                litres: data[key]['jumlahdata'],
              });
            }

        var chart = AmCharts.makeChart("kt_amcharts_12",{
  "type"    : "pie",
  "hideCredits"    : true,
  "theme"    : "light",
  "addClassNames": true,
  "titles": [
    {
      "size": 15,
      "text": @json($widget[6]->widget_widgetcaption)
    },
    {
         "text": @json($widget[6]->widget_widgetsubcaption),
         "bold": false
     }
  ],
  // "pullOutDuration": 0,
  // "pullOutRadius": 0,

  "labelsEnabled": false,
  "titleField"  : "country",
  "valueField"  : "litres",
  "dataProvider"  : dataProvider,
  "numberFormatter": {
            "precision": -1,
            "decimalSeparator": ",",
            "thousandsSeparator": ""
        },
  "legend": {
               "align": "center",
               "position": "bottom",
               "marginRight": 0,
               "labelText": "[[title]]",
               "valueText": "",
               "valueWidth": 50,
               "textClickEnabled": true
           },
  "export": {
    "enabled": true
  }

});

//         var data = {!! json_encode($hasi2) !!};
//              // console.log(data);
//             var dataProvider = [];// this variable you have to pass in dataProvider inside chart
//             for(var key in data) {
//               dataProvider.push({
//                 country: data[key]['messagestatus'],
//                 litres: data[key]['jumlahdata'],
//               });
//             }
//
//         var chart2 = am4core.create("kt_amcharts_12", am4charts.PieChart);
//
//         chart2.data = dataProvider;
// var title = chart2.titles.create();
// title.text = @json($widget[6]->widget_widgetsubcaption);
// title.fontSize = 10;
// title.bold = true;
// var title2 = chart2.titles.create();
// title2.text = @json($widget[6]->widget_widgetcaption);
// title2.fontSize = 15;
// title2.bold = false;
// chart2.numberFormatter.numberFormat = "#.";
// var pieSeries = chart2.series.push(new am4charts.PieSeries());
// pieSeries.dataFields.value = "litres";
// pieSeries.dataFields.category = "country";
// pieSeries.labels.template.disabled = true;
// pieSeries.ticks.template.disabled = true;
// pieSeries.calculatePercent = true;
// pieSeries.labels.template.text = "{category}: {value.percent.formatNumber('###.00')}%";
// pieSeries.slices.template.tooltipText = "{category}: {value.percent.formatNumber('###.00')}% ({value.value})";
// var valuesAxis = new AmCharts.ValueAxis();
// valuesAxis.integersOnly = true;
// chart2.exporting.menu = new am4core.ExportMenu();
// chart2.legend = new am4charts.Legend();
// chart2.legend.itemContainers.template.events.on("hit", function(ev) {
//   var slice = ev.target.dataItem.dataContext.slice;
//   pieSeries.slices.each(function(item) {
//     if (item != slice) {
//       item.isActive = false;
//     }
//     else {
//       slice.isActive = !slice.isActive;
//     }
//   });
// });
</script>
@endsection
