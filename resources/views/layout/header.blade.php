<!-- partial:partials/_navbar.html -->
<nav class="rtl navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="{{route('home')}}"><img src="{{asset('site/images/logo.png')}}"
                                                                         alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="{{route('home')}}"><img src="{{asset('images/logo.png')}}"
                                                                              alt="logo"/></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
        </button>
        <div class="search-field d-none d-md-block">
            <form class="d-flex align-items-center h-100" action="#">
                <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                        <i class="input-group-text border-0 mdi mdi-magnify"></i>
                    </div>
                    <input type="text" class="form-control bg-transparent border-0" placeholder="Search projects">
                </div>
            </form>
        </div>
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown"
                   aria-expanded="false">
                    <div class="nav-profile-img">
                        <img src="{{asset('site/images/faces/face1.jpg')}}" alt="image">
                        <span class="availability-status online"></span>
                    </div>
                    <div class="nav-profile-text">

                        <p class="mb-1 text-black">{{ Auth::user()->emp_name }}</p>
                    </div>
                </a>
                <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="mdi mdi-logout me-2 text-primary"></i> تسجيل خروج </a>
                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>


            <li class="nav-item dropdown">
                <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#"
                   data-bs-toggle="dropdown">
                    <i class="mdi mdi-bell-outline"></i>
                    <span class="count-symbol bg-danger"></span>
                </a>
                <!-- في صفحة الدعم الفني -->
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                     aria-labelledby="notificationDropdown">
                    <h6 class="p-3 mb-0">الإشعارات</h6>
                    <div class="dropdown-divider"></div>
                    @isset($notifications)

                        @foreach($notifications as $notification)

                            <a class="dropdown-item preview-item"
                               href="{{ route('notification.show', ['id' => $notification->id]) }}">

                                <div class="preview-thumbnail">
                                    @php
                                        $colors = ['bg-gradient-success', 'bg-gradient-warning', 'bg-gradient-danger', 'bg-gradient-info', 'bg-gradient-primary'];
                                        $randomColor = $colors[rand(0, count($colors) - 1)];

                                    @endphp
                                    <div class="preview-icon {{ $randomColor }}">
                                        <i class="mdi mdi-bell-alert"></i>
                                    </div>
                                </div>
                                <div
                                    class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                    <h6 class="preview-subject font-weight-normal mb-1">{{ $notification->subject }}</h6>
                                    <p class="text-gray ellipsis mb-0">{{ $notification->message }}</p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                        @endforeach
                    @endisset
                </div>
            </li>

        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>
