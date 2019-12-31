<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('admin.includes.head')

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <div id="app">

            @include('admin.includes.navbar')

            @include('admin.includes.aside')

            <div class="content-wrapper">

                @include('admin.includes.breadcrumb')

                @yield('content')

            </div>

            @include('admin.includes.footer')

        </div>

        @include('admin.includes.scripts')
    </div>
</body>
</html>


