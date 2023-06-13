<!DOCTYPE html>
<html>

@include('admin.layouts.head')

<body class="skin-josh">
    @include('admin.layouts.header')
    <div class="wrapper row-offcanvas row-offcanvas-left">
        <!-- Left side column. contains the logo and sidebar -->
        @include('admin.layouts.sidebar')
        @yield('content')
        <!-- right-side -->
    </div>
    <a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Return to top"
        data-toggle="tooltip" data-placement="left">
        <i class="livicon" data-name="plane-up" data-size="18" data-loop="true" data-c="#fff" data-hc="white"></i>
    </a>
    <!-- global js -->
    @include('admin.layouts.script')
    @yield('scripts')

    <!-- end page level js -->
</body>

</html>
