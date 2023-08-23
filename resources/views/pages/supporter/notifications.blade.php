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

                            @if(isset($notifications))
                                <div class="row">
                                    <div class="container">
                                        @php
                                            $colors = ['bg-gradient-success', 'bg-gradient-warning', 'bg-gradient-danger', 'bg-gradient-info', 'bg-gradient-primary'];
                                            $randomColor = $colors[rand(0, count($colors) - 1)];


                                        @endphp

                                        @foreach($notifications as $notification)
                                            <a  style=" text-decoration: none; color:#000" href="{{ route('notification.show', ['id' => $notification->id]) }}">
                                            <div class="col-xl mb-4">

                                                <div class="card">

                                                    <!-- محتوى البطاقة لكل طلب -->
                                                    <div class="card-header {{ $randomColor }} ">{{ $notification->subject }}</div>
                                                    <div class="card-body">
                                                        <p>{{ $notification->message }}</p></a>
                                                        <button class="btn  btn-danger mt-4">رفض </button>
                                                        <button class= "btn  btn-success mt-4">قبول </button>                                                    </div>
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
                                                    <div class="card-header bg-gradient-warning "></div>
                                                    <div class="card-body">
                                                        <p>لا يوجد اشعارات بعد</p>
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
