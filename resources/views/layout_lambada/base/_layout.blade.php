@if(config('layout.self.layout') == 'blank')
    <div class="d-flex flex-column flex-root">
        @yield('content')
    </div>
@else
    @include('layout_lambada.base._header-mobile')
    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-row flex-column-fluid page">
              @if($page->showleftbar == 1)

                @include('layout_lambada.base._aside')
                @endif

            <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">

                @include('layout_lambada.base._header')

                <div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
                  <div class="subheader py-2 py-lg-6  subheader-transparent " id="kt_subheader">
                    <div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                        <div class="d-flex align-items-center flex-wrap mr-1">
                			       <div class="d-flex align-items-baseline flex-wrap mr-5">
                	            <h5 class="text-dark font-weight-bold my-1 mr-5">
                	                {{ $page->pagecaption }}	                	            </h5>
                                  <span class="text-muted font-weight-bold mr-4">
                                          {{ $page->pagesubcaption }}
                                    </span>

                	           </div>
                		    </div>
                    </div>
                </div>
                @if((int)$page->showbreadcrumb == 1 )
                @php
                $breadcrumb = App\Menu::where('linkidpage',$idhomepagelink)->first();
                @endphp
                  <nav aria-label="breadcrumb">
                   <ol class="breadcrumb" style="background-color:white">
                     <li class="breadcrumb-item"><a href="{{ url('/'.$page->noid) }}">{{ $page->pagecaption }}</a></li>
                     <li class="breadcrumb-item active">{{ $page->pagesubcaption }}</li>
                   </ol>
                  </nav>
                  @else

                  @endif
                                      @include('layout.base._content')

                </div>

                @if($page->showfooter === 1)
                @include('layout.base._footer')
                @else

                @endif

            </div>
        </div>
    </div>

@endif

@if (config('layout.self.layout') != 'blank')

    @if (config('layout.extras.search.layout') == 'offcanvas')
        @include('layout.partials.extras.offcanvas._quick-search')
    @endif

    @if (config('layout.extras.notifications.layout') == 'offcanvas')
        @include('layout.partials.extras.offcanvas._quick-notifications')
    @endif

    @if (config('layout.extras.quick-actions.layout') == 'offcanvas')
        @include('layout.partials.extras.offcanvas._quick-actions')
    @endif

    @if (config('layout.extras.user.layout') == 'offcanvas')
                  @include('layout_lambada.partials._quick-user')
    @endif

    @if (config('layout.extras.quick-panel.display'))
        @include('layout.partials.extras.offcanvas._quick-panel')
    @endif


    @if (config('layout.extras.chat.display'))
        @include('layout.partials.extras._chat')
    @endif

    @include('layout.partials.extras._scrolltop')

@endif
