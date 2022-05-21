@php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();

if(Auth::user()->hasRole('admin')){
    $linkuser = "dashboard";
}
else if(Auth::user()->hasRole('technician')){
    $linkuser = "dashboard";
}
else{
    $linkuser = "ticket.view";
}

@endphp

<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
            <div class="ulogo">

                <a href= {{ route($linkuser) }}>
                    <!-- logo for regular state and mobile devices -->
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{ asset('backend/images/allo-tnb.png') }}" alt="" style="width:35px;height:35px;">
                        <h3><b>&nbsp Allo</b> HDTS</h3>
                    </div>
                </a>
            </div>
        </div>

        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">

            @hasanyrole('technician|admin')

            <li class="{{ ($route == 'dashboard')?'active':'' }}">
                <a href="{{ route('dashboard') }}">
                    <i data-feather="home"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            @endhasanyrole

            @role('admin')

            <hr>

            <li class="header nav-small-cap">Admin Pages</li>

            <li class="treeview {{ ($prefix == '/user')?'active':'' }}">
                <a href="#">
                    <i data-feather="user"></i>
                    <span>Manage User</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'user.view')?'active':'' }}"><a href="{{ route('user.view') }}"><i class="ti-more"></i>View User</a></li>
                    <li class="{{ ($route == 'user.add')?'active':'' }}"><a href="{{ route('user.add') }}"><i class="ti-more"></i>Add User</a></li>
                </ul>
            </li>

            <li class="treeview {{ ($prefix == '/role')?'active':'' }}">
                <a href="#">
                    <i data-feather="shield"></i>
                    <span>Manage Role & Perms</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'role.view')?'active':'' }}"><a href="{{ route('role.view') }}"><i class="ti-more"></i>View Role</a></li>
                    <li class="{{ ($route == 'permission.view')?'active':'' }}"><a href="{{ route('permission.view') }}"><i class="ti-more"></i>View Permission</a></li>
                </ul>
            </li>

            @endrole

            <hr>

            <li class="header nav-small-cap">General Pages</li>

            <li class="treeview {{ ($prefix == '/profile')?'active':'' }}">
                <a href="#">
                    <i data-feather="settings"></i> <span>Manage Profile</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'profile.view')?'active':'' }}"><a href="{{ route('profile.view') }}"><i class="ti-more"></i>My Profile</a></li>
                    <li class="{{ ($route == 'profile.edit')?'active':'' }}"><a href="{{ route('profile.edit') }}"><i class="ti-more"></i>Edit Profile</a></li>
                    <li class="{{ ($route == 'profile.password')?'active':'' }}"><a href="{{ route('profile.password') }}"><i class="ti-more"></i>Change Password</a></li>
                    <li class="{{ ($route == 'equipment.edit')?'active':'' }}"><a href="{{ route('equipment.edit') }}"><i class="ti-more"></i>Edit Equipment</a></li>
                </ul>
            </li>

            @hasanyrole('technician|admin')

            <hr>

            <li class="header nav-small-cap">Setup Management</li>

            <li class="treeview {{ ($prefix == '/rsp')?'active':'' }}">
                <a href="#">
                    <i data-feather="wifi"></i>
                    <span>Manage RSP</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'rsp.view')?'active':'' }}"><a href="{{ route('rsp.view') }}"><i class="ti-more"></i>View RSP</a></li>
                    <li class="{{ ($route == 'rsp.add')?'active':'' }}"><a href="{{ route('rsp.add') }}"><i class="ti-more"></i>Add RSP</a></li>
                </ul>
            </li>

            <li class="treeview {{ ($prefix == '/modem')?'active':'' }}">
                <a href="#">
                    <i data-feather="hard-drive"></i>
                    <span>Manage Modem</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'modem.view')?'active':'' }}"><a href="{{ route('modem.view') }}"><i class="ti-more"></i>View Modem</a></li>
                    <li class="{{ ($route == 'modem.add')?'active':'' }}"><a href="{{ route('modem.add') }}"><i class="ti-more"></i>Add Modem</a></li>
                </ul>
            </li>

            <li class="treeview {{ ($prefix == '/router')?'active':'' }}">
                <a href="#">
                    <i data-feather="hard-drive"></i>
                    <span>Manage Router</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'router.view')?'active':'' }}"><a href="{{ route('router.view') }}"><i class="ti-more"></i>View Router</a></li>
                    <li class="{{ ($route == 'router.add')?'active':'' }}"><a href="{{ route('router.add') }}"><i class="ti-more"></i>Add Router</a></li>
                </ul>
            </li>

            <li class="treeview {{ ($prefix == '/program/category')?'active':'' }}">
                <a href="#">
                    <i data-feather="file-text"></i>
                    <span>Manage Ticket Category</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'ticket.category.view')?'active':'' }}"><a href="{{ route('ticket.category.view') }}"><i class="ti-more"></i>View Ticket Category</a></li>
                    <li class="{{ ($route == 'ticket.category.add')?'active':'' }}"><a href="{{ route('ticket.category.add') }}"><i class="ti-more"></i>Add Ticket Category</a></li>
                </ul>
            </li>

            @endhasanyrole

            <hr>
            <li class="header nav-small-cap">Ticket Management</li>

            <li class="treeview {{ ($prefix == '/ticket')?'active':'' }}">
                <a href="#">
                    <i data-feather="film"></i>
                    <span>Manage Ticket</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'ticket.view')?'active':'' }}"><a href="{{ route('ticket.view') }}"><i class="ti-more"></i>View Ticket</a></li>
                    @can('view assigned ticket')
                    <li class="{{ ($route == 'ticket.view.assigned')?'active':'' }}"><a href="{{ route('ticket.view.assigned') }}"><i class="ti-more"></i>View Assigned Ticket</a></li>
                    @endcan
                    <li class="{{ ($route == 'ticket.create')?'active':'' }}"><a href="{{ route('ticket.create') }}"><i class="ti-more"></i>Create Ticket</a></li>
                </ul>
            </li>

            <hr>

            @hasanyrole('technician|admin')
            <li class="header nav-small-cap">Report Management</li>

            <li class="treeview {{ ($prefix == '/report')?'active':'' }}">
                <a href="#">
                    <i data-feather="clipboard"></i>
                    <span>Report Generation</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'report.view')?'active':'' }}"><a href="{{ route('report.view') }}"><i class="ti-more"></i>Generate Report</a></li>
                </ul>
            </li>

            @endhasanyrole

        </ul>
    </section>

    <div class="sidebar-footer">
        <!-- item-->
        <a href="{{ route('profile.view') }}" class="link" data-toggle="tooltip" title="" data-original-title="Profile"
            aria-describedby="tooltip92529"><i class="ti-user"></i></a>
        <!-- item-->
        <a href="{{ route('profile.edit') }}" class="link" data-toggle="tooltip" title="" data-original-title="Settings"
        aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
        <!-- item-->
        <a href="{{ route('admin.logout') }}" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i
                class="ti-lock"></i></a>
    </div>
</aside>