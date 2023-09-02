<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="rtl nav-item nav-profile">
            <a href="{{route('home')}}" class=" rtl nav-link">
                <div class="rtl nav-profile-image">
                    <img src="{{asset('site/images/faces/face1.jpg')}}" alt="profile">
                    <span class="login-status online"></span>
                    <!--change to offline or busy as needed-->
                </div>
                <div class="rtl nav-profile-text d-flex flex-column">
                    <span class="font-weight-bold mb-2"> {{ Auth::user()->emp_name }} </span>
                    <span class="text-secondary text-small">{{ Auth::user()->parentUnit->unit_name }}</span>
                </div>
            </a>
        </li>
        <li class="rtl nav-item">
            <a class="nav-link" href="{{route('home')}}">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">الرئيسية</span>

            </a>
        </li>
        <li class="rtl nav-item">
            <a class="nav-link"  href="{{route('requests.blade.php')}}" >
                <i class="mdi mdi-settings menu-icon"></i>
                <span class="menu-title">الطلبات المرسلة</span>

            </a>

        </li>
        <li class="rtl nav-item">
            <a class="nav-link" href="{{route('showForm')}}">
                <i class="mdi mdi-settings-box menu-icon"></i>
                <span class="menu-title">طلب صيانة</span>

            </a>
        </li>

        <li class="rtl nav-item">
            <a class="nav-link" href="{{route('showNotification')}}">
                <i class="mdi mdi-bell-ring-outline menu-icon"></i>
                <span class="menu-title">الإشعارات</span>

            </a>
        </li>


    </ul>
</nav>
