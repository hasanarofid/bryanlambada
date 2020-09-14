<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" {{ Metronic::printAttrs('html') }} {{ Metronic::printClasses('html') }}>
    <head>
        <meta charset="utf-8"/>
        {{-- Title Section --}}
        <title>{{ config('app.name') }} | @yield('title', $page_title ?? '')</title>
        {{-- Meta Data --}}
        <meta name="description" content="@yield('page_description', $page_description ?? '')"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        {{-- Favicon --}}
        <link rel="shortcut icon" href="{{ asset('media/logos/lambada.png') }}" />
        {{-- Fonts --}}
        {{ Metronic::getGoogleFontsInclude() }}
        {{-- Global Theme Styles (used by all pages) --}}
        @foreach(config('layout.resources.css') as $style)
            <link href="{{ config('layout.self.rtl') ? asset(Metronic::rtlCssPath($style)) : asset($style) }}" rel="stylesheet" type="text/css"/>
        @endforeach
        {{-- Layout Themes (used by all pages) --}}
        @foreach (Metronic::initThemes() as $theme)
            <link href="{{ config('layout.self.rtl') ? asset(Metronic::rtlCssPath($theme)) : asset($theme) }}" rel="stylesheet" type="text/css"/>
        @endforeach
        {{-- Includable CSS --}}
        @yield('styles')
                <meta name="csrf-token" content="{{ csrf_token() }}" />
    </head>
    @if($page->showleftbar == 0)
    <body class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed" id="kt_body">
    @endif
    @if($page->showleftbar == 1)
      <body {{ Metronic::printAttrs('body') }} {{ Metronic::printClasses('body') }}>
    @endif
            @include('layout_lambada.base._layout')
        <script>var HOST_URL = "{{ route('quick-search') }}";</script>
        {{-- Global Config (global config for global JS scripts) --}}
        <script>
            var KTAppSettings = {!! json_encode(config('layout.js'), JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES) !!};
        </script>

        {{-- Global Theme JS Bundle (used by all pages)  --}}
        @foreach(config('layout.resources.js') as $script)
            <script src="{{ asset($script) }}" type="text/javascript"></script>
        @endforeach

        {{-- Includable JS --}}
        @yield('scripts')

    </body>
</html>
