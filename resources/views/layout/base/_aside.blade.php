{{-- Aside --}}
@php
    $kt_logo_image = 'logo-light.png';
@endphp

@if (config('layout.brand.self.theme') === 'light')

    @php $kt_logo_image = 'logo-dark.png' @endphp

@elseif (config('layout.brand.self.theme') === 'dark')

    @php $kt_logo_image = 'lambada.png' @endphp

@endif
<div class="aside aside-left {{ Metronic::printClasses('aside', false) }} d-flex flex-column flex-row-auto" id="kt_aside">
    {{-- Brand --}}
    <div class="brand flex-column-auto {{ Metronic::printClasses('brand', false) }}" id="kt_brand">
        <div class="brand-logo">
            <a href="{{ url('/'.$idhomepage) }}">
                <img alt="{{ config('app.name') }}" src="{{ asset('media/logos/'.$kt_logo_image) }}"/>
            </a>
        </div>
        @if (config('layout.aside.self.minimize.toggle'))
            <button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
                {{ Metronic::getSVG("media/svg/icons/Navigation/Angle-double-left.svg", "svg-icon-xl") }}

            </button>
        @endif
    </div>
    {{-- Aside menu --}}
    <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
        @if (config('layout.aside.self.display') === false)
            <div class="header-logo">
                <a href="{{ url('/') }}">
                    <img alt="{{ config('app.name') }}" src="{{ asset('media/logos/'.$kt_logo_image) }}"/>
                </a>
            </div>
        @endif
        <div
            id="kt_aside_menu"
            class="aside-menu my-4 {{ Metronic::printClasses('aside_menu', false) }}"
            data-menu-vertical="1"
            {{ Metronic::printAttrs('aside_menu') }}>
            <ul class="menu-nav {{ Metronic::printClasses('aside_menu_nav', false) }}">
            @foreach($data_sidebar as $key => $side)
                        @php if($side->groupmenu == ''){$submenunya = 'Dashboard';}else{$submenunya = $side->groupmenu;} @endphp
            @if ($side->menulevel ==3)
                  <li class="menu-section ">
                    <h4 class="menu-text">{{ $submenunya }}</h4>
                    <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                  </li>
                    @php
                    $subb4 =  \App\Menu::where('menulevel',3)->where('isactive',1)->where('groupmenu',$side->groupmenu)->orderBy('nourut')->get();
                    @endphp
                                      @foreach($subb4 as $value4)
                                    @php
                                    $dataurl =Request::path();
                                    if($dataurl == '/'){
                                      $urlbaru  = $idhomepage;
                                    }else{
                                      $urlbaru = Request::path();
                                    }
                                        $carurl = \App\Menu::where('linkidpage',$urlbaru)->orderBy('nourut')->first();

                                        if(isset($carurl)){
                                            $carurl2 = \App\Menu::where('noid',$carurl->idparent)->first();
                                            if($value4->noid == $carurl2->noid){
                                            @endphp
                                                          <li id="10" class="menu-item menu-item-submenu menu-item-open" aria-haspopup="true" data-menu-toggle="hover">
                                            @php
                                            }else{
                                              @endphp
                                                            <li id="11" class="menu-item  menu-item-submenu " aria-haspopup="true" data-menu-toggle="hover">
                                              @php
                                            }
                                        }else{
                                            @endphp
                                                            <li id="11" class="menu-item  menu-item-submenu " aria-haspopup="true" data-menu-toggle="hover">
                                                              @php
                                        }



                                    @endphp

                <a href="javascript:;" class="menu-link menu-toggle">
                  <span class="svg-icon menu-icon">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24"></rect>
                        <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5"></rect>
                        <path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3"></path>
                      </g>
                    </svg>
                    </span>
                  <span class="menu-text">{{ $value4->menucaption }}</span>
                  <i class="menu-arrow"></i>
                </a>
                @php
                if($value4->groupmenu == ''){
                                                      $men =  \App\Menu::where('menulevel', 4)->where('isactive',1)->where('idparent',$value4->noid)->orderBy('nourut')->get();
                                                      @endphp
                                                      @foreach($men as $value)
                                                      <div class="menu-submenu ">
                                                        <i class="menu-arrow"></i>
                                                        <ul class="menu-subnav">
                                                      @if(Request::path() == $value->linkidpage || $value->linkidpage == $idhomepage)
                                                          <li class="menu-item menu-item-active" aria-haspopup="true">
                                                            <a href="{{ url('/'.$value->linkidpage) }}" class="menu-link ">
                                                              @else
                                                              <li class="menu-item " aria-haspopup="true">
                                                                  <a href="{{ url('/'.$value->linkidpage) }}" class="menu-link ">
                                                              @endif
                                                              <i class="menu-bullet menu-bullet-line">
                                                                <span></span>
                                                              </i>
                                                              <span class="menu-text">{{ $value->menucaption}}</span>
                                                            </a>
                                                          </li>
                                                        </ul>
                                                      </div>
                                                      @endforeach
                                                      @php

                }else{
                                    $men =  \App\Menu::where('menulevel', 4)->where('isactive',1)->where('idparent',$value4->noid)->orderBy('nourut')->get();
                                    @endphp
                                    @foreach($men as $value)
                                    <div class="menu-submenu ">
                                      <i class="menu-arrow"></i>
                                      <ul class="menu-subnav">
                                        @if(Request::path() == $value->linkidpage || $value->linkidpage == $idhomepage)
                    <li class="menu-item menu-item-active" aria-haspopup="true">
                      <a href="{{ url('/'.$value->linkidpage) }}" class="menu-link">
                        @else
                        <li class="menu-item " aria-haspopup="true">
                            <a href="{{ url('/'.$value->linkidpage) }}" class="menu-link ">
                        @endif
                                            <i class="menu-bullet menu-bullet-line">
                                              <span></span>
                                            </i>
                                            <span class="menu-text">{{ $value->menucaption}}</span>
                                          </a>
                                        </li>
                                      </ul>
                                    </div>
                                    @endforeach
                                    @php
                }
                @endphp
                                    </li>
                @endforeach
            @endif
              @endforeach
            </ul>
        </div>
    </div>
</div>
