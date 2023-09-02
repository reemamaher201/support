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
                                </span> الطلبات الواردة
                        </h3>



                    </div>

                    <div class="row">

                        @if(isset($supports))
                            <div class="row">
                                <div class="container">


                                    @foreach($supports as $support)
                                        @if ($support->status != 2 && $support->status != 1 && $support->status != 3)
                                            <a style="text-decoration: none; color:#000" href="{{ route('notification.show', ['id' => $support->id]) }}">
                                                <div class="col-xl mb-4">
                                                    <div class="card">
                                                        <!-- محتوى البطاقة لكل طلب -->
                                                        <div class="card-header bg-gradient-warning"> طلب صيانة بعنوان : {{ $support->issue_title }} من : {{$support->employee->emp_name}} </div>
                                                        <div class="card-body">
                                                            <p>{{ $support->issue_description }}</p>
                                                            <!-- زر الرفض -->
                                                            <a href="{{ route('reject.notification', ['id' => $support->id]) }}" class="btn btn-danger mt-4">رفض</a>
                                                            <a href="{{ route('accept.notification', ['id' => $support->id]) }}" class="btn btn-success mt-4">قبول</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        @endif
                                    @endforeach

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
                                                <p>لا يوجد طلبات بعد</p>
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
