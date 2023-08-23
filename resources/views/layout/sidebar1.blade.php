<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="rtl nav-item nav-profile">
            <a href="#" class=" rtl nav-link">
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
            <a class="nav-link" href="{{route('notification')}}">
                <i class="mdi mdi-contacts menu-icon"></i>
                <span class="menu-title">الطلبات الواردة</span>

            </a>
        </li>
        <li class="rtl nav-item">
            <a class="nav-link" href="pages/forms/basic_elements.html">
                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                <span class="menu-title">الطلبات المقبولة</span>

            </a>
        </li>
        <li class="rtl nav-item">
            <a class="nav-link" href="pages/charts/chartjs.html">
                <i class="mdi mdi-chart-bar menu-icon"></i>
                <span class="menu-title">Charts</span>

            </a>
        </li>
        <li class="rtl nav-item">
            <a class="nav-link" href="pages/tables/basic-table.html">
                <i class="mdi mdi-table-large menu-icon"></i>
                <span class=" menu-title">الجداول</span>

            </a>
        </li>


    </ul>
</nav>
