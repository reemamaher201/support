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
                                </span> الاشعارات
                        </h3>



                    </div>

                        <div class="row">
                            @php
                                $colors = ['bg-gradient-success', 'bg-gradient-warning', 'bg-gradient-danger', 'bg-gradient-info', 'bg-gradient-primary'];
                                $randomColor1 = $colors[rand(0, count($colors) - 1)];
                                $randomColor2 = $colors[rand(0, count($colors) - 1)];

                            @endphp
                            @if(isset($notification))

                                <div class="card">
                                    <div class="card-header {{ $randomColor1 }} ">{{ $notification->subject }}</div>
                                    <div class="card-body">
                                        <p>{{ $notification->message }}</p>
                                        <!-- قائمة تفاصيل الطلب هنا إذا كان لديك معلومات الطلب -->
                                    </div>
                                </div>
                            @else
                                <!-- عرض قائمة جميع الطلبات -->
                                <div class="row">
                                    <div class="container">
                                        @php
                                            $colors = ['bg-gradient-success', 'bg-gradient-warning', 'bg-gradient-danger', 'bg-gradient-info', 'bg-gradient-primary'];
                                        @endphp

                                        @foreach($notifications as $notification)
                                            @php
                                                $randomColor2 = $colors[array_rand($colors)];
                                            @endphp
                                            <div class="col-xl mb-4">
                                                <div class="card">
                                                    <!-- محتوى البطاقة لكل طلب -->
                                                    <div class="card-header {{ $randomColor2 }} ">{{ $notification->subject }}</div>
                                                    <div class="card-body">
                                                        <p>{{ $notification->message }}</p>
                                                        <!-- قائمة تفاصيل الطلب هنا إذا كان لديك معلومات الطلب -->
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
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
