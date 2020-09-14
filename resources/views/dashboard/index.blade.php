{{-- Extends layout --}}
<!-- 10: Stat Box
23: Chart
71: Google Maps
151: News Slider
1011: DataTables -->
@extends('layout_lambada.default')
@section('content')
  <div class="row" style="margin-top:10px">
  @foreach($panel as $pan)
  @php
  $widget = App\Widget::where('noid',$pan->idwidget)->first();
  if($widget->idtypepage == 151 && $pan->panelheigth < 517 ){
    $heighasli = 517;
  }else{
    $heighasli = $pan->panelheigth;
  }

  if($widget->idtypepage == 1011 && $pan->panelheigth < 517 ){
    $heighasli = 517;
  }else{
      $heighasli = $pan->panelheigth;
  }


  if($widget->idtypepage == 10  && $pan->panelheigth < 100 ){
    $heighasli = 100;
  }else{
      $heighasli = $pan->panelheigth;
  }
  if($widget->idtypepage == 23 && $pan->panelheigth < 450 ){
    $heighasli = 450;
  }else{
    $heighasli = $pan->panelheigth;
  }

  do{
        if($pan->nocol != 1){
          @endphp
          <div class="row-fluid col-{{ $pan->nocol }} col-md-{{ $pan->nospan }} col-xs-{{ $pan->nospanxs }}" colspan=4 >
            <div class="card card-custom card-stretch gutter-b" style="height:{{ $heighasli }}px;margin-bottom:10px;">
              <div class="card-header h-auto border-0">
                <h3 class="card-label"></h3>
              </div>
              <div class="card-body" style="position: relative;">
                {{ $pan->panelheigth }}
              </div>
            </div>
          </div>
          @php
           break;
        }else{
          @endphp
          <div class="row-fluid col-{{ $pan->nocol }} col-md-{{ $pan->nospan }} col-xs-{{ $pan->nospanxs }}">
                  <div class="card card-custom card-stretch gutter-b" style="height:{{ $heighasli }}px;margin-bottom:10px;">
                    <div class="card-header h-auto border-0">
                      <h3 class="card-label"></h3>
                    </div>
                    <div class="card-body" style="position: relative;">
                      {{ $pan->panelheigth }}
                    </div>
                  </div>

            </div>

          @php
        }
    }while(false);
  @endphp


  @endforeach
</div>
@endsection
