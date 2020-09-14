{{-- Extends layout --}}
@extends('layout_lambada.default')
@section('content')
<div class="d-flex flex-column flex-root">
<div class="d-flex flex-row-fluid bgi-size-cover bgi-position-center" style="background-image: url({{asset('media/error/bg2.jpg') }});">
<div class="d-flex flex-row-fluid flex-column justify-content-end align-items-center text-center text-white pb-40">
  <h1 class="display-1 font-weight-bold">OOPS!</h1>
  <span class="display-4 font-weight-boldest mb-8">
    Something went wrong here
  </span>
</div>
</div>
</div>

@endsection
@section('scripts')
<script>var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";</script>
<script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>
@endsection

        <!--begin::Global Config(global config for global JS scripts)-->
        <script>
            var KTAppSettings = {
    "breakpoints": {
        "sm": 576,
        "md": 768,
        "lg": 992,
        "xl": 1200,
        "xxl": 1400
    },
    "colors": {
        "theme": {
            "base": {
                "white": "#ffffff",
                "primary": "#3699FF",
                "secondary": "#E5EAEE",
                "success": "#1BC5BD",
                "info": "#8950FC",
                "warning": "#FFA800",
                "danger": "#F64E60",
                "light": "#E4E6EF",
                "dark": "#181C32"
            },
            "light": {
                "white": "#ffffff",
                "primary": "#E1F0FF",
                "secondary": "#EBEDF3",
                "success": "#C9F7F5",
                "info": "#EEE5FF",
                "warning": "#FFF4DE",
                "danger": "#FFE2E5",
                "light": "#F3F6F9",
                "dark": "#D6D6E0"
            },
            "inverse": {
                "white": "#ffffff",
                "primary": "#ffffff",
                "secondary": "#3F4254",
                "success": "#ffffff",
                "info": "#ffffff",
                "warning": "#ffffff",
                "danger": "#ffffff",
                "light": "#464E5F",
                "dark": "#ffffff"
            }
        },
        "gray": {
            "gray-100": "#F3F6F9",
            "gray-200": "#EBEDF3",
            "gray-300": "#E4E6EF",
            "gray-400": "#D1D3E0",
            "gray-500": "#B5B5C3",
            "gray-600": "#7E8299",
            "gray-700": "#5E6278",
            "gray-800": "#3F4254",
            "gray-900": "#181C32"
        }
    },
    "font-family": "Poppins"
};
        </script>
