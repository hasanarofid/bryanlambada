
    <h2>{{ $data->widget_widgetcaption }}</h2>



    <div class="col-lg-{{ $wid->panel_nospan}} col-xxl-4">
    @if($wid->widget_idtypewidget = 151)
    @include('panel.all', ['data' => $wid])
    @endif
    </div>
