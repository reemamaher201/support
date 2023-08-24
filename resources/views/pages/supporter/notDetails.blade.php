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
                                </span> تفاصيل الطلبات
                        </h3>


                    </div>

                    <div class="row">

                        <div class="row">
                            <div class="container">

                                <div class="col-xl mb-4">
                                    <div class="card">
                                        @php
                                            $colors = ['bg-gradient-success', 'bg-gradient-warning', 'bg-gradient-danger', 'bg-gradient-info', 'bg-gradient-primary'];
                                            $randomColor = $colors[rand(0, count($colors) - 1)];


                                        @endphp

                                        <div class="card-header {{ $randomColor }}">{{ $notification->subject }}</div>
                                        <div class="card-body">
                                            <p><span
                                                    style="color: #ff004d;"> اسم الموظف :</span> {{ $notification->employee->emp_name }}
                                            </p>
                                            <p><span
                                                    style="color: #ff004d;"> وصف المشكلة :</span> {{ $notification->message }}
                                            </p>


                                            <p style="padding:0 900px  0 0; ;margin-bottom: -15px; color: #ff004d;">
                                                {{ $notification->created_at->format('H:i:s Y-m-d ') }}</p>


                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <form action="" method="post">
                            @csrf
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="assigned">المكلف بالصيانة</label>
                                        <input type="text" class="form-control " id="assigned" name="assigned" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">الحالة</label>
                                        <div style="display: flex;
    flex-direction: row;
    gap: 15px;">
                                            <div style=" display: flex;
    align-items: center;"><label for="status1">خيار 1</label>
                                                <input type="radio" id="status1" name="status" value="option1" required>

                                            </div>
                                            <div style=" display: flex;
    align-items: center;"><label for="status2">خيار 2</label>
                                                <input type="radio" id="status2" name="status" value="option2" required>

                                            </div>
                                            <div style=" display: flex;
    align-items: center;"> <label for="status3">خيار 3</label>
                                                <input type="radio" id="status3" name="status" value="option3" required>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="delivery_time">وقت الاستلام</label>
                                        <input type="datetime-local" class="form-control" id="delivery_time"
                                               name="delivery_time" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="receiver">الجهاز المستلم</label>
                                        <input type="text" class="form-control" id="receiver" name="receiver" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">تسليم</button>
                                </div>
                            </div>
                        </form>


                    </div>


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
