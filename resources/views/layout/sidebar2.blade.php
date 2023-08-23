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
            <a class="nav-link" href="index.html">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">الرئيسية</span>

            </a>
        </li>
        <li class="rtl nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="mdi mdi-crosshairs-gps menu-icon"></i>
                <span class="menu-title">الطلبات المرسلة</span>
                <i class="menu-arrow"></i>

            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="rtl nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html"></a></li>
                    <li class="rtl nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
                </ul>
            </div>
        </li>
        <li class="rtl nav-item">
            <a class="nav-link" href="{{route('showForm')}}">
                <i class="mdi mdi-contacts menu-icon"></i>
                <span class="menu-title">طلب صيانة</span>

            </a>
        </li>
        <li class="rtl nav-item">
            <a class="nav-link" href="pages/forms/basic_elements.html">
                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                <span class="menu-title">Forms</span>

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
        <li class="rtl nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages">

                <i class="mdi mdi-medical-bag menu-icon"></i>
                <span class="menu-title">Sample Pages</span><i class="menu-arrow"></i>

            </a>
            <div class="collapse" id="general-pages">
                <ul class="nav flex-column sub-menu">
                    <li class="rtl nav-item"> <a class="nav-link" href="pages/samples/blank-page.html"> Blank Page </a></li>
                    <li class="rtl nav-item"> <a class="nav-link" href=" "> Login </a></li>
                    <li class="rtl nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404 </a></li>
                    <li class="rtl nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a></li>
                </ul>
            </div>
        </li>
        <li class="rtl nav-item sidebar-actions">
  <span class="nav-link">
    <div class="border-bottom">
      <h6 class="font-weight-normal mb-3">Projects</h6>
    </div>
    <button class="btn btn-block btn-lg btn-gradient-warning mt-4">+ Add a project</button>
    <div class="mt-4">
      <div class="border-bottom">
        <p class="text-secondary">Categories</p>
      </div>

    </div>
  </span>
        </li>
    </ul>
</nav>
