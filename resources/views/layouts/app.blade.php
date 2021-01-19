<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('includes.head')

<body class="loading">
    <!-- Begin page -->
    <div class="wrapper">
        @include('includes.left_menu')
        <div class="content-page">
            <div class="content">
                @include('includes.top_bar')
                <!-- Start Content-->
                <div class="container-fluid">
                    @include('includes.breadcrumbs')
                    <!-- end page title -->
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <!-- container -->
    </div>
    <!-- content -->
    @include('includes.footer')
    </div>
    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->
    </div>
    <!-- END wrapper -->
    @include('includes.right_bar')
    <script type="text/javascript">
        var _tpl_ = "{{env('APP_URL')}}";
        var _url_web_ = "{{env('APP_URL')}}";
        var _storage_ = "{{asset('storage').'/'}}";
    </script>
    @include('includes.scripts')
    @foreach($js as $archivo) 
        <script type="text/javascript" src="{{asset('js/'.$archivo)}}"></script>
    @endforeach
</body>

</html>