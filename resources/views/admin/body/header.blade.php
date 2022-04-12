<header class="main-header">
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top pl-30">
        <!-- Sidebar toggle button-->
        <div>
            <ul class="nav">
                <li class="btn-group nav-item">
                    <a href="#" class="waves-effect waves-light nav-link rounded svg-bt-icon" data-toggle="push-menu"
                        role="button">
                        <i class="nav-link-icon mdi mdi-menu"></i>
                    </a>
                </li>
            </ul>
        </div>

        <div class="navbar-custom-menu r-side">
            <ul class="nav navbar-nav">

                <!-- Search Bar -->
                {{-- <li class="search-bar">
                    <div class="lookup lookup-circle lookup-right">
                        <input type="text" name="s">
                    </div>
                </li> --}}

                @php
                $user = DB::table('users')->where('id',Auth::user()->id)->first();
                @endphp

                <!-- User Account-->

                <div class="row mt-1 p-3">
                    <div class="col"><span class="font-weight-bold text-white">{{ $user->name }}</span></div>
                </div>

                <li class="dropdown user user-menu">
                    <a href="#" class="waves-effect waves-light rounded dropdown-toggle p-0" data-toggle="dropdown"
                        title="User">
                        <img src="{{ (!empty($user->image))? url('upload/user_images/'.$user->image):url('upload/no_image.jpg') }}" alt="">
                    </a>
                    <ul class="dropdown-menu animated flipInX">
                        <li class="user-body">
                            <a class="dropdown-item" href="{{ route('profile.view') }}"><i class="ti-user text-muted mr-2"></i>
                                My Profile</a>
                            <a class="dropdown-item" href="{{ route('profile.edit') }}"><i class="ti-settings text-muted mr-2"></i>
                                Settings</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('admin.logout') }}"><i
                                    class="ti-lock text-muted mr-2"></i> Logout</a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </nav>
</header>