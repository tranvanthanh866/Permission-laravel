<header class="main-header">
    <a href="{{asset('admin')}}" class="logo">
        <span class="logo-mini"><b>VNIT</b></span>
        <span class="logo-lg"><b>VNIT</b></span>
    </a>
    <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        @if(Auth::user()->avatar != '')
                            <img src="{{asset(Auth::user()->avatar)}}" class="user-image" alt="User Image">
                        @else
                            <img src="{{asset('vendor/AdminLTE2/img/flag_VN.png')}}" class="user-image" alt="User Image">
                        @endif
                        <span class="hidden-xs">{{Auth::user()->name}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-header">
                            @if(Auth::user()->avatar != '')
                                <img src="{{asset(Auth::user()->avatar)}}" class="img-circle" alt="User Image">
                            @else
                                <img src="{{asset('vendor/AdminLTE2/img/flag_VN.png')}}" class="img-circle" alt="User Image">
                            @endif
                            <p>
                                {{Auth::user()->email}}
                                <small>{{Auth::user()->create_at}}</small>
                            </p>
                        </li>
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{asset('admin/user/edit/'.Auth::user()->id)}}" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">
                                    Sign out
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </nav>
</header>
