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
                                    <i class="mdi mdi-bell"></i>
                                </span> الطلبات المرفوضة
                        </h3>


                    </div>

                    <div class="row">

                        @if(isset($rejectedRequests))
                            <div class="row">
                                <div class="container">

                                    @foreach($rejectedRequests as $rejectedRequest)

                                            <div class="col-xl mb-4">
                                                <div class="card">
                                                    <!-- محتوى البطاقة لكل طلب -->
                                                    <div
                                                        class="card-header bg-gradient-danger">{{ $rejectedRequest->issue_title }}</div>
                                                    <div class="card-body">
                                                        <p>تم رفض الطلب {{ $rejectedRequest->id }}</p>


                                                    </div>
                                                </div>
                                            </div>

                                    @endforeach

                                </div>
                            </div>
                        @else
                            <div class="row">
                                <div class="container">

                                    <div class="col-xl mb-4">
                                        <div class="card">
                                            <!-- محتوى البطاقة لكل طلب -->
                                            <div class="card-header bg-gradient-danger "></div>
                                            <div class="card-body">
                                                <p>لا يوجد طلبات مرفوضة بعد</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        @endif
                    </div>


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
