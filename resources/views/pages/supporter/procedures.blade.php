@extends('layout.master', ['title' => 'الاجراءات'])

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


                    <div class="row">

                        <form action="{{ route('procedures.store' ,['id' => $acceptances->id]) }} " method="post" style="margin-top: 50px">
                            @csrf
                            @method('PUT')
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="procedures_token">الإجراء المتخذ </label>
                                        <textarea class="form-control" id="procedures_token" name="procedures_token"
                                                  rows="5"
                                                  required></textarea>
                                    </div>
                                    <div class="form-check" style="display: flex">
                                        <label for="procedures_status" style="display: flex ; margin-left: 70px">حالة
                                            الإنجاز</label>
                                        <div style=" display: flex; align-items: center;">
                                            <input class="form-check-input" type="radio" name="procedures_status"
                                                   id="status1"
                                                   value="غير منجزة" required>
                                            <label for="status1" class="form-check-label"
                                                   style="margin-left: 20px">غير منجزة</label>
                                            <input class="form-check-input" type="radio" name="procedures_status"
                                                   id="status2"
                                                   value="منجزة" required>
                                            <label for="status2" class="form-check-label">منجزة</label>
                                        </div>
                                    </div>
                                    <button class="btn btn-outline-warning" type="submit"
                                            style="color: #fed713 ; -webkit-text-fill-color: black ; border-color: #fed713; margin-right: 830px">
                                        تنفيذ
                                    </button>
                                </div>
                            </div>
                        </form>




                    </div>

                    <!-- جدول عرض البيانات -->
                    <h2>البيانات المخزنة</h2>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>متخذ الإجراء</th>
                            <th>تاريخ الإجراء</th>
                            <th>حالة الإنجاز</th>
                            <th>نص الإجراء</th>
                            <th>قطع الغيار اللازمة</th>

                        </tr>
                        </thead>
                        <tbody>
                        @if ($acceptances)
                            <tr>
                                <td>{{ $acceptances->id }}</td>
                                <td>{{ $acceptances->assigned }}</td>
                                <td>{{ $acceptances->procedures_time }}</td>
                                <td>{{ $acceptances->procedures_status }}</td>
                                <td>{{ $acceptances->procedures_token }}</td>
                                <td>
                                    <a href="{{ route('spare.show', ['id' => $acceptances->id]) }}" class="btn btn-outline-warning" style="color: #fed713 ; -webkit-text-fill-color: black ; border-color: #fed713"
                                       onmouseover="this.style.webkitTextFillColor='white'"
                                       onmouseout="this.style.webkitTextFillColor='black'">
                                        قطع الغيار                                    </a>

                                </td>
                            </tr>
                        @endif
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


</body>
@endsection
