@extends('layout.master', ['title' => 'الطلبات الواردة'])

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

                                        @isset($support)
                                            <div
                                                class="card-header bg-gradient-warning">{{  $support->issue_title }}</div>
                                            <div class="card-body">
                                                <p><span style="color: #ff004d;"> اسم الموظف :</span>
                                                    {{  $support->employee->emp_name }}
                                                </p>
                                                <p><span style="color: #ff004d;"> وصف المشكلة :</span>
                                                    {{  $support->issue_description }}
                                                </p>
                                                <p style="padding:0 700px  0 0; ;margin-bottom: -15px; color: #ff004d;">
                                                    {{  $support->created_at->format('H:i:s Y-m-d ') }}</p>
                                            </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <form action="{{ route('acceptances.store') }}" method="post">
                            @csrf
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="assigned">المكلف بالصيانة</label>
                                        <input type="text" class="form-control " id="assigned" name="assigned"
                                               required>
                                    </div>
                                    <div class="form-group">
                                        <label for="maintenance_location">مكان الصيانة</label>
                                        <div style="display: flex;
    flex-direction: row;
    gap: 15px;">
                                            <div style=" display: flex;
    align-items: center;">
                                                <label
                                                    for="status1">نفس المكان</label>
                                                <input type="radio" id="status1" name="maintenance_location"
                                                       value="نفس المكان" required>

                                            </div>
                                            <div style=" display: flex;
    align-items: center;"><label
                                                    for="status2">الورشة</label>
                                                <input type="radio" id="status2" name="maintenance_location"
                                                       value="الورشة" required>

                                            </div>
                                            <div style=" display: flex;
    align-items: center;">
                                                <label for="status3">خارجي</label>
                                                <input type="radio" id="status3" name="maintenance_location"
                                                       value="خارجي" required>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="delivery_time">وقت الاستلام</label>
                                        <input type="datetime-local" class="form-control" id="delivery_time"
                                               name="delivery_time" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="receiver">المستلم</label>
                                        <input type="text" class="form-control" id="receiver" name="receiver"
                                               required>
                                    </div>
                                    <div class="form-group">
                                        <label for="received_device">الجهاز المستلم</label>
                                        <input type="text" class="form-control" id="received_device"
                                               name="received_device" required>
                                    </div>
                                    <div class="form-group">

                                        <input type="hidden" class="form-control" id="employee_id"
                                               value="{{  $support->employee->emp_id }}" name="employee_id"
                                               required>
                                    </div>
                                    <div class="form-group">

                                        <input type="hidden" class="form-control" id="support_id"
                                               value="{{  $support->id }}" name="support_id" required>
                                    </div>
                                    <button type="submit" class="btn btn-outline-warning" style="color: #fed713 ; -webkit-text-fill-color: black ; border-color: #fed713; margin-right: 830px">تسليم</button>
                                </div>
                            </div>
                        </form>
                        @endisset
                    </div>

                    <!-- جدول عرض البيانات --> --
                    <h2>البيانات المخزنة</h2>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>مكلف بالصيانة</th>
                            <th>مكان الصيانة</th>
                            <th>وقت الاستلام</th>
                            <th>المستلم</th>
                            <th>الجهاز المستلم</th>
                            <th>الإجراءات المتخذة</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach ($acceptances as $acceptance)
                            @if($acceptance->support_id == $support->id  )
                                <tr>
                                    <td>{{ $acceptance->support_id }}</td>
                                    <td>{{ $acceptance->assigned }}</td>
                                    <td>{{ $acceptance->maintenance_location }}</td>
                                    <td>{{ $acceptance->delivery_time }}</td>
                                    <td>{{ $acceptance->receiver }}</td>
                                    <td>{{ $acceptance->received_device }}</td>
                                    <td> <a href="{{ route('procedures.show', ['id' => $acceptance->id]) }}" class="btn btn-outline-warning" style="color: #fed713 ; -webkit-text-fill-color: black ; border-color: #fed713"
                                            onmouseover="this.style.webkitTextFillColor='white'"
                                            onmouseout="this.style.webkitTextFillColor='black'">
                                            استكمال الإجراءات
                                        </a></td>
                                </tr>@endif
                        @endforeach
                        </tbody>
                    </table>
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
