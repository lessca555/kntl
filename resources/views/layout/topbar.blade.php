<header class="topbar-nav">
    <nav class="navbar navbar-expand fixed-top">
        <ul class="navbar-nav mr-auto align-items-center">
            <li class="nav-item">
                <a class="nav-link toggle-menu" href="javascript:void();">
                    <i class="icon-menu menu-icon"></i>
                </a>
            </li>
            <li class="nav-item">
                <form class="search-bar">
                    <input type="text" class="form-control" placeholder="Enter keywords">
                    <a href="javascript:void();"><i class="icon-magnifier"></i></a>
                </form>
            </li>
        </ul>

        <ul class="navbar-nav align-items-center right-nav-link">
            <li class="nav-item">
                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
                    <span class="user-profile"><img
                            src="@if ($admin->avatar == null) {{ asset('assets/images/yoda.png') }}
                        @else
                        {{ asset('assets/images/' . $admin->avatar) }} @endif"
                            class="img-circle" alt="user avatar"></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li class="dropdown-item user-details">
                        <a href="javaScript:void();">
                            <div class="media">
                                <div class="avatar"><img class="align-self-start mr-3"
                                        src="{{ asset('assets/images/' . $admin->avatar) }}" alt="user avatar"></div>
                                <div class="media-body">
                                    <h6 class="mt-2 user-title">{{ $admin->name }}</h6>
                                    <p class="user-subtitle">{{ $admin->email }}</p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="dropdown-divider"></li>
                    <li class="dropdown-item"><i class="zmdi zmdi-account mr-2"></i> Account</li>
                    <li class="dropdown-divider"></li>
                    @if ($admin->roles()->first()->name == 'superadmin')
                        <li class="dropdown-item"><a href="{{ route('logout-admin') }}"><i class="icon-power mr-2"></i> Logout</a>
                    @else
                        <li class="dropdown-item"><a href="{{ route('login-siswa') }}"><i class="icon-power mr-2"></i> Logout</a>
                    @endif
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</header>
