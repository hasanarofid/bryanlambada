{{-- Extends layout --}}
@extends('layout.default')
                            <link href="//www.amcharts.com/lib/3/plugins/export/export.css?v=7.0.6" rel="stylesheet" type="text/css"/>
{{-- Content --}}
@section('content')
@if($widget != '')
          <div class="row" style="margin-top:10px">
                  @if($widget[0]->widget_idtypewidget == 10)
                  @php
                $widget1 =  json_decode($widget[0]->widget_configwidget);
                  $widget2 = $widget1->Widget_Stat->datasource->dataquery;
                  $widget3 =\App\Menu::ambilQuery($widget2);
                  @endphp
                  <div class="col-lg-{{ $widget[0]->panel_nospan }}">
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
                               <span class="text-dark-75 font-weight-bolder font-size-h3">{{ $widget3[0]->jumlahdata }}</span>
                               <span class="text-muted font-weight-bold mt-2">{{ $widget[0]->widget_widgetcaption }}</span>
                           </div>
                       </div>
                    </div>
                    </div>
                  </div>
                  @endif
                  @if($widget[1]->widget_idtypewidget == 10)
                  @php
                $widget4 =  json_decode($widget[1]->widget_configwidget);
                  $widget5 = $widget4->Widget_Stat->datasource->dataquery;
                  $widget6 =\App\Menu::ambilQuery($widget5);
                  @endphp
                  <div class="col-lg-{{ $widget[1]->panel_nospan }}">
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
                               <span class="text-dark-75 font-weight-bolder font-size-h3">{{ $widget6[0]->jumlahdata }}</span>
                               <span class="text-muted font-weight-bold mt-2">{{ $widget[1]->widget_widgetcaption }}</span>
                           </div>
                       </div>
                    </div>
                    </div>
                  </div>
                  @endif
                  @if($widget[2]->widget_idtypewidget == 10)
                  @php
                  $widget7 =  json_decode($widget[2]->widget_configwidget);
                    $widget8 = $widget7->Widget_Stat->datasource->dataquery;
                    $widget9 =\App\Menu::ambilQuery($widget8);
                    @endphp
                  <div class="col-lg-{{ $widget[2]->panel_nospan }}">
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
                               <span class="text-dark-75 font-weight-bolder font-size-h3">{{ $widget9[0]->jumlahdata }}</span>
                               <span class="text-muted font-weight-bold mt-2">{{ $widget[2]->widget_widgetcaption }}</span>
                           </div>
                       </div>
                    </div>
                    </div>
                  </div>
                  @endif
                  @if($widget[3]->widget_idtypewidget == 10)
                  @php
                  $widget10 =  json_decode($widget[3]->widget_configwidget);
                    $widget11 = $widget10->Widget_Stat->datasource->dataquery;
                    $widget12 =\App\Menu::ambilQuery($widget11);
                    @endphp
                  <div class="col-lg-{{ $widget[3]->panel_nospan }}">
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
                               <span class="text-dark-75 font-weight-bolder font-size-h3">{{ $widget12[0]->jumlahdata }}</span>
                               <span class="text-muted font-weight-bold mt-2">{{ $widget[3]->widget_widgetcaption }}</span>
                           </div>
                       </div>
                    </div>
                    </div>
                  </div>
                  @endif

                  @if($widget[4]->widget_idtypewidget = 23)
                    @php
                    $datachart2 = json_decode($widget[4]->widget_dataquery);
                    $hasi =\App\Menu::ambilQuery($datachart2[0]->query);
                    @endphp
                    <div class="col-lg-{{$widget[4]->panel_nospan}}">
                    <div class="card card-custom gutter-b">
                      <div class="card-header">
                        <div class="card-title">
                          <h3 class="card-label">
                            {{ $widget[4]->widget_widgetcaption }}
                          </h3>
                        </div>
                      </div>
                      <div class="card-body">
                        <div id="kt_amcharts_pertama" style="height: 500px; overflow: visible; text-align: left;"</div>
                      </div>
                    </div>
                  </div>
                  </div>
                  @endif
                  @if($widget[5]->widget_idtypewidget = 23)
                    @php
                    $datachart3 = json_decode($widget[5]->widget_dataquery);
                    $hasi2 =\App\Menu::ambilQuery($datachart3[0]->query);
                    @endphp
                    <div class="col-lg-{{$widget[4]->panel_nospan}}">
                    <div class="card card-custom gutter-b">
                      <div class="card-header">
                        <div class="card-title">
                          <h3 class="card-label">
                            {{ $widget[5]->widget_widgetcaption }}
                          </h3>
                        </div>
                      </div>
                      <div class="card-body">
                        <div id="kt_amcharts_kedua" style="height: 500px; overflow: visible; text-align: left;"</div>
                      </div>
                    </div>
                  </div>
                  </div>
                  @endif

                  @if($widget[6]->widget_idtypewidget = 23)
                    @php
                    $datachart4 = json_decode($widget[6]->widget_dataquery);
                    $hasi3 =\App\Menu::ambilQuery($datachart4[0]->query);
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
                        <div id="kt_amcharts_ketiga" style="height: 500px; overflow: visible; text-align: left;"</div>
                      </div>
                    </div>
                  </div>
                  </div>
                  @endif




            </div>
@endif
@endsection
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
    var dataProvideratas = [];// this variable you have to pass in dataProvider inside chart
    for(var key in dataatas) {
      dataProvideratas.push({
        category: dataatas[key]['categories'],
        visits: dataatas[key]['jumlahdata'],
      });
    }

    var chart = AmCharts.makeChart("kt_amcharts_pertama", {
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
"title": @json($widget[4]->widget_widgetcaption)
} ],
"legend": {
"useGraphSettings": true
},
"titles": [
{
 "size": 15,
 "text": @json($widget[4]->widget_widgetcaption)
},
{
    "text": @json($widget[4]->widget_widgetsubcaption),
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
        "title": @json($widget[4]->widget_widgetcaption)
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

    // var data = {!! json_encode($hasi2) !!};
    //
    //      // console.log(data);
    //     var dataProvider = [];// this variable you have to pass in dataProvider inside chart
    //     for(var key in data) {
    //       dataProvider.push({
    //         country: data[key]['messagestatus'],
    //         litres: data[key]['jumlahdata'],
    //       });
    //     }
    //
    // var chart2 = am4core.create("kt_amcharts_kedua", am4charts.PieChart);
    //
    // chart2.data = dataProvider;
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
    //
    // valuesAxis.integersOnly = true;
    //
    // chart2.legend = new am4charts.Legend();
    // chart2.legend.itemContainers.template.events.on("hit", function(ev) {
    // var slice = ev.target.dataItem.dataContext.slice;
    // pieSeries.slices.each(function(item) {
    // if (item != slice) {
    // item.isActive = false;
    // }
    // else {
    // slice.isActive = !slice.isActive;
    // }
    // });
    // });

    var databawah1 = {!! json_encode($hasi3) !!};

    var idhomepage = {!! json_encode($idhomepage) !!};

    if (idhomepage == 10000002) {
      var dataProviderBawah2 = [];// this variable you have to pass in dataProvider inside chart
      for(var key in databawah1) {
        dataProviderBawah2.push({
          category: databawah1[key]["namabulan"],
          visits: databawah1[key]['jumlahdata'],
        });
      }
    }else{
      var dataProviderBawah2 = [];// this variable you have to pass in dataProvider inside chart
      for(var key in databawah1) {
        dataProviderBawah2.push({
          category: databawah1[key]["namabulan"],
          visits: databawah1[key]['jumlahdata'],
        });
      }
    }

         // console.log(data);



            var chart_bawah = AmCharts.makeChart("kt_amcharts_ketiga", {
              "rtl": KTUtil.isRTL(),
              "type": "serial",
               "hideCredits":true,
              "theme": "light",
              "dataProvider": dataProviderBawah2,
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
        "title": @json($widget[6]->widget_widgetcaption)
      } ],
      "legend": {
       "useGraphSettings": true
     },
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
              "gridAboveGraphs": true,
              "startDuration": 1,
              "graphs": [{
                "balloonText": "[[category]]: <b>[[value]]</b>",
                "fillAlphas": 0.8,
                "lineAlpha": 0.2,
                "type": "column",
                "valueField": "visits",
                "title": @json($widget[6]->widget_widgetcaption)
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

            var chart = AmCharts.makeChart("kt_amcharts_kedua",{
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
</script>
@endsection
