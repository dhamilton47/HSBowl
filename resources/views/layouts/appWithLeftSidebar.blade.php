<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include ('layouts.includes.head')

<body>
    <div id="app">
        @include ('layouts.includes.nav')

        <main class="container">
            <div class="row justify-content-center">
                <div class="col-md-2">
                    @section('sidebar')
                        @include('layouts.includes.sidebar')
                    @show
                </div>

                <div class="col-md-10">
                    @yield('content')
                </div>
            </div>
        </main>

        <flash message="{{ session('flash') }}"></flash>
    </div>

    @include ('layouts.includes.foot')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')
</body>
</html>
