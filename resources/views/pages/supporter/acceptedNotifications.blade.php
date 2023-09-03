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
                                </span> الطلبات المقبولة
                        </h3>


                    </div>

                    <div class="row">

                        @if(isset($acceptedRequests))
                            @foreach($acceptedRequests as $acceptedRequest)
                            <div class="row">
                                <div class="container">




                                        <a style="text-decoration: none; color:#000"
                                           href="{{ route('notification.show', ['id' => $acceptedRequest->id]) }}">
                                            <div class="col-xl mb-4">
                                                <div class="card">
                                                    <div
                                                        class="card-header bg-gradient-success">{{$acceptedRequest->issue_title}}</div>
                                                    <div class="card-body">
                                                        <p>تم قبول الطلب،<button class="btn bg-gradient-success"> قم باتخاذ الاجراءات الان</button> </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>


                                </div>
                            </div>
                            @endforeach
                        @else
                            <div class="row">
                                <div class="container">

                                    <div class="col-xl mb-4">
                                        <div class="card">
                                            <!-- محتوى البطاقة لكل طلب -->
                                            <div class="card-header bg-gradient-success "></div>
                                            <div class="card-body">
                                                <p>لا يوجد طلبات مقبولة بعد</p>
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
