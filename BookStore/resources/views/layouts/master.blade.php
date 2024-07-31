<div>
    <div id="main-layout">
        {{--navigation-bar--}}
        @include('components.navigation-bar')
        {{--side-bar--}}
        @if (empty($noSidebar))
            @include('components.side-bar')
        @endif
        {{--search-bar--}}
        @if (empty($noSearchBar))
            @include('components.search-bar')
        @endif

        <div class="content-container">
            @yield('content')
        </div>

        @include('components.footer')
    </div>
</div>
