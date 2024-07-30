<div>
    @include('components.navigation-bar')
    {{--side-bar--}}
    if (empty($noSidebar)) {
    @include('components.side-bar')
    }

    {{--search-bar--}}
    if (empty($noSearchBar)) {
    @include('components.search-bar')
    }

    <div class="content-container">
        @yield('content')
    </div>

    @include('components.footer')
</div>
