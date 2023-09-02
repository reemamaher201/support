@extends('layout.master', ['title' => 'الرئيسية'])

<body>
<div class="container-scroller">
    @section('content')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            @if (Auth::user()->parent_unit == 1)
                @include('layout.sidebar1')
            @else
                @include('layout.sidebar2')
            @endif

            <!-- partial -->
            <div class=" rtl main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title">
                                <span class="page-title-icon bg-gradient-warning text-white me-2">
                                    <i class="mdi mdi-home"></i>
                                </span> الرئيسية
                        </h3>


                        @if (Auth::check())
                            <p>أهلاً بك، {{ Auth::user()->emp_name }}!</p>
                        @else
                            <p>مرحباً بك!</p>
                        @endif
                    </div>
                    @if (Auth::user()->parent_unit == 1)
                        <div class="row">
                            <div class="col-md-4 stretch-card grid-margin">
                                <div class="card bg-gradient-warning card-img-holder text-white">
                                    <div class="card-body">
                                        <img src="{{ asset('site/images/dashboard/circle.svg') }}"
                                             class="card-img-absolute"
                                             alt="circle-image"/>
                                        <h4 class="font-weight-normal mb-3">Weekly Sales <i
                                                class="mdi mdi-chart-line mdi-24px float-right"></i>
                                        </h4>
                                        <h2 class="mb-5">$ 15,0000</h2>
                                        <h6 class="card-text">Increased by 60%</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 stretch-card grid-margin">
                                <div class="card bg-gradient-info card-img-holder text-white">
                                    <div class="card-body">
                                        <img src="{{ asset('site/images/dashboard/circle.svg') }}"
                                             class="card-img-absolute"
                                             alt="circle-image"/>
                                        <h4 class="font-weight-normal mb-3">Weekly Orders <i
                                                class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                                        </h4>
                                        <h2 class="mb-5">45,6334</h2>
                                        <h6 class="card-text">Decreased by 10%</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 stretch-card grid-margin">
                                <div class="card bg-gradient-success card-img-holder text-white">
                                    <div class="card-body">
                                        <img src="{{ asset('site/images/dashboard/circle.svg') }}"
                                             class="card-img-absolute"
                                             alt="circle-image"/>
                                        <h4 class="font-weight-normal mb-3">Visitors Online <i
                                                class="mdi mdi-diamond mdi-24px float-right"></i>
                                        </h4>
                                        <h2 class="mb-5">95,5741</h2>
                                        <h6 class="card-text">Increased by 5%</h6>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @else

                        {{--                            <div class="row">--}}
                        {{--                                <div class="container">--}}

                        @foreach($supportRequests as $request)
                            @if($request->status == 3)
                                <a style="text-decoration: none; color:#000"
                                   href="{{ route('notification.show', ['id' => $request->id]) }}">
                                    <div class="col-xl mb-4">
                                        <div class="card">
                                            <!-- محتوى البطاقة لكل طلب -->
                                            <div class="card-header bg-gradient-warning">تم استلام طلبك الخاص
                                                بعنوان {{ $request->issue_title }}</div>
                                            <div class="card-body">
                                                <a href="{{ route('showRating', ['id' => $request->id]) }}"
                                                   class="btn btn-gradient-warning mt-4">تقييم و ملاحظات </a>
                                            </div>
                                        </div>
                                    </div>
                                </a>


                </div>
            </div>
            @else
                <div class="row">
                    <div class="container">

                        <div class="col-xl mb-4">
                            <div class="card">
                                <!-- محتوى البطاقة لكل طلب -->
                                <div class="card-header bg-gradient-warning "></div>
                                <div class="card-body">
                                    <p>لا يوجد طلبات مستلمة بعد</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            @endif
            @endforeach

            @endif

        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->

        <!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>

</body>
@endsection
