<div class="content-wrapper">
    <section class="content-header">
        <h1>
            @yield('h1')
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{asset('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#"> Tạo User</a></li>
        </ol>
    </section>
    <section class="content">
        @yield('section-content')
    </section>
</div>
