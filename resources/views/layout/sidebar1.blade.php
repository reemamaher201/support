<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="rtl nav-item nav-profile">
            <a href="#" class=" rtl nav-link">

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
            <a class="nav-link" href="{{route('accept.show')}}">
                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                <span class="menu-title">الطلبات المقبولة</span>

            </a>
        </li>


        <li class="rtl nav-item">
            <a class="nav-link" href="{{route('reject.show')}}">
                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                <span class="menu-title">الطلبات المرفوضة</span>

            </a>
        </li>

    </ul>
</nav>
