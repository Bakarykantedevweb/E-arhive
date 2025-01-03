<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="{{url('admin/dashboard')}}" class="logo logo-dark"> <span class="logo-sm">
                    <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22">
                </span> <span class="logo-lg">
                    <img src="{{ asset('assets/images/logo-dark.png') }}" alt="" height="20">
                </span> </a>
            <a href="{{url('admin/dashboard')}}" class="logo logo-light"> <span class="logo-sm">
                    <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22">
                </span> <span class="logo-lg">
                    <img src="{{ asset('assets/images/logo-light.png') }}" alt="" height="20">
                </span> </a>
            </div>
        </div>
        <div class="d-flex">
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">  <span class="d-none d-xl-inline-block ms-1 fw-medium font-size-15">
                        {{ Auth::user()->nom . ' ' . Auth::user()->prenom }}</span> <i
                        class="uil-angle-down d-none d-xl-inline-block font-size-15"></i> </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item--><a class="dropdown-item" href="#"><i
                            class="uil uil-user-circle font-size-18 align-middle text-muted me-1"></i> <span
                            class="align-middle">View Profile</span></a> <a class="dropdown-item" href="#"><i
                            class="uil uil-wallet font-size-18 align-middle me-1 text-muted"></i> <span
                            class="align-middle">My Wallet</span></a> <a class="dropdown-item d-block" href="#"><i
                            class="uil uil-cog font-size-18 align-middle me-1 text-muted"></i>
                        <span class="align-middle">Settings</span> <span
                            class="badge bg-soft-success rounded-pill mt-1 ms-2">03</span></a> <a class="dropdown-item"
                        href="#"><i class="uil uil-lock-alt font-size-18 align-middle me-1 text-muted"></i> <span
                            class="align-middle">Lock screen</span></a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        {{-- {{ __('Logout') }}> --}}
                        <i class="uil uil-sign-out-alt font-size-18 align-middle me-1 text-muted"></i>
                        <span class="align-middle">Sign out</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect"> <i
                        class="uil-cog"></i> </button>
            </div>
        </div>
    </div>
</header>
