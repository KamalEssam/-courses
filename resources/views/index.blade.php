@include('includes.header')

@switch($blade)
    @case('about')
   		@yield('content-about')
        @break

    @case('home')
        @yield('content-home')
        @break

    @default
@endswitch




@include('includes.footer')
