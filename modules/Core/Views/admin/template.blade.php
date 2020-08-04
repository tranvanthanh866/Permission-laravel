@extends("Core::template")

@section('title', 'CMS VNIT')
@section('class-body', 'skin-yellow-light sidebar-mini') {{-- skin-yellow-light --}}

@section("head")
    <link rel="shortcut icon" type="image/png" href="{{asset('vendor/AdminLTE2/img/favicon.png')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" href="{{asset('vendor/AdminLTE2/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/AdminLTE2/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/AdminLTE2/Ionicons/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/AdminLTE2/dist/css/AdminLTE.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/AdminLTE2/dist/css/skins/_all-skins.min.css')}}">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <title>@yield('title')</title>
@endsection

@section("header")
	<div class="wrapper">
    @include('Core::admin.layout.header')
    @include('Core::admin.layout.menu-sidebar')
@endsection

@section("content")
   @include('Core::admin.layout.content')
@endsection

@section("footer")
    @include('Core::admin.layout.footer')
	</div>
@endsection

@section('script')
    <script src="{{asset('vendor/AdminLTE2/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/AdminLTE2/jquery-ui/jquery-ui.min.js')}}"></script>
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <script src="{{asset('vendor/AdminLTE2/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('vendor/AdminLTE2/dist/js/adminlte.min.js')}}"></script>
    <script type="text/javascript">
        /** add active class and stay opened when selected */
        var url = window.location;
        // for sidebar menu entirely but not cover treeview
        $('ul.sidebar-menu a').filter(function() {
            return this.href == url;
        }).parent().addClass('active');
        // for treeview
        $('ul.treeview-menu a').filter(function() {
            return this.href == url;
        }).parentsUntil(".sidebar-menu > .treeview-menu").addClass('active');
        let domain = "{{url('/')}}";
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        let loader = $('#js-loading');
    </script>
@endsection
