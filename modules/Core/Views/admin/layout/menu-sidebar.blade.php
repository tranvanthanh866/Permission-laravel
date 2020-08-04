<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                @if(Auth::user()->avatar != '')
                    <img src="{{asset(Auth::user()->avatar)}}" class="img-circle" alt="User Image">
                @else
                    <img src="{{asset('vendor/AdminLTE2/img/flag_VN.png')}}" class="img-circle" alt="User Image">
                @endif
            </div>
            <div class="pull-left info">
                <p>{{Auth::user()->name}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="nav-item">
                <a href="{{asset('admin/dashboard')}}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            @can(config('const.permissions.USERS_MANAGE'))
                <li class="treeview">
                    <a href="#" class="nav-link nav-toggle">
                        <i class="fa fa-users"></i>
                        <span class="title"> User management</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{asset('admin/permissions')}}"><i class="fa fa-circle-o"></i> Permissions</a></li>
                        <li><a href="{{asset('admin/roles')}}"><i class="fa fa-circle-o"></i> Roles</a></li>
                        <li><a href="{{asset('admin/users')}}"><i class="fa fa-circle-o"></i> User</a></li>
                    </ul>
                </li>
            @endcan
            <li class="nav-item">
                <a href="{{asset('admin/change_password')}}">
                    <i class="fa fa-key"></i> <span>Thay đổi mật khẩu</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{asset('logout')}}"
                   onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <i class="fa fa-fw fa-sign-out"></i> <span>Thoát</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
