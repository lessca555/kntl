<div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
    <div class="brand-logo">
        <a href="{{ route('dashmin') }}">
            <img src="{{ asset('assets/images/icon.png') }}" class="logo-icon" alt="logo icon">
            <h5 class="logo-text">IndoSwakarya Solusi</h5>
        </a>
    </div>
    <ul class="sidebar-menu do-nicescrol">
        <li class="sidebar-header">MAIN NAVIGATION</li>
        @if ($admin->roles()->first()->name == 'superadmin')
            <li>
                <a href="{{ route('dashmin') }}">
                    <i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('kelas-admin') }}">
                    <i class="zmdi zmdi-balance"></i> <span>Kelas</span>
                </a>
            </li>

            <li>
                <a href="{{ route('data-siswa') }}">
                    <i class="zmdi zmdi-assignment-account"></i> <span>Data Siswa</span>
                </a>
            </li>

            <li>
                <a href="{{ route('pelanggaran-siswa') }}">
                    <i class="zmdi zmdi-alert-triangle"></i> <span>Jenis Pelanggaran</span>
                </a>
            </li>
        @else
            <li>
                <a href="{{ route('dashmin') }}">
                    <i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('profile') }}">
                    <i class="zmdi zmdi-assignment-account"></i> <span>Profile</span>
                </a>
            </li>
        @endif

        {{-- <li>
            <a href="calendar.html">
                <i class="zmdi zmdi-accounts-list"></i> <span>User</span>
            </a>
        </li> --}}

        <li>
            <a href="{{ route('logout') }}">
                <i class="fa fa-sign-out"></i> <span>logout</span>
            </a>
        </li>

        {{-- <li>
            <a href="login.html" target="_blank">
                <i class="zmdi zmdi-lock"></i> <span>Login</span>
            </a>
        </li>

        <li>
            <a href="register.html" target="_blank">
                <i class="zmdi zmdi-account-circle"></i> <span>Registration</span>
            </a>
        </li>

        <li class="sidebar-header">LABELS</li>
        <li><a href="javaScript:void();"><i class="zmdi zmdi-coffee text-danger"></i> <span>Important</span></a></li>
        <li><a href="javaScript:void();"><i class="zmdi zmdi-chart-donut text-success"></i> <span>Warning</span></a>
        </li>
        <li><a href="javaScript:void();"><i class="zmdi zmdi-share text-info"></i> <span>Information</span></a></li> --}}

    </ul>

</div>
