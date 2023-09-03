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
                            <div class="container">

                                <div class="col-xl mb-4">
                                    <div class="card">
                                        <!-- محتوى البطاقة لكل طلب -->
                                        <div class="card-header bg-gradient-warning "></div>
                                        <div class="card-body">
                                            <p>أهلا وسهلا بك زميلنا في الدعم الفني نتمنى لك يوما رائعا </p>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    @else

                        {{--                            <div class="row">--}}
                        {{--                                <div class="container">--}}

                        @foreach($supportRequests as $request)
                            @if($request->status == 3)

                                    <div class="col-xl mb-4">
                                        <div class="card">
                                            <!-- محتوى البطاقة لكل طلب -->
                                            <div class="card-header bg-gradient-warning">تم استلام طلبك الخاص
                                                بعنوان {{ $request->issue_title }}</div>
                                            <div class="card-body">
                                                <a href="{{ route('showRating', ['id' => $request->id]) }}"
                                                   class="btn btn-outline-warning" style="color: #fed713 ; -webkit-text-fill-color: black ; border-color: #fed713;">تقييم و ملاحظات </a>
                                            </div>
                                        </div>
                                    </div>
                            @endif
                        @endforeach

                </div>
            </div>





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
