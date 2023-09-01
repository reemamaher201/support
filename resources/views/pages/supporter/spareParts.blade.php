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

                        <form action="{{ route('spare.create' ,['id' => $acceptances->id]) }} " method="post" style="margin-top: 50px">
                            @csrf
                            @method('PUT')
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="spare_name">اسم القطعة </label>
                                        <input class="form-control" id="spare_name" name="spare_name"
                                               required>
                                    </div>
                                    <div class="form-group">
                                        <label for="savingSpare_time">تاريخ توفيرها </label>
                                        <input type="datetime-local" class="form-control" id="savingSpare_time" name="savingSpare_time"
                                               required>
                                    </div>
                                    <div class="form-check" style="display: flex">
                                        <label for="method_spare" style="display: flex ; margin-left: 70px">طريقة
                                            التوفير</label>
                                        <div style=" display: flex; align-items: center;">
                                            <input class="form-check-input" type="radio" name="method_spare"
                                                   id="status1"
                                                   value="من المخزن" required>
                                            <label for="status1" class="form-check-label"
                                                   style="margin-left: 20px">من المخزن</label>
                                            <input class="form-check-input" type="radio" name="method_spare"
                                                   id="status2"
                                                   value="تم الشراء" required>
                                            <label for="status2" class="form-check-label">تم الشراء</label>
                                        </div>
                                    </div>
                                    <button class="btn btn-outline-warning" type="submit"
                                            style="color: #fed713 ; -webkit-text-fill-color: black ; border-color: #fed713; margin-right: 830px">
                                        ارسال
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
                            <th>القطعة</th>
                            <th>تاريخ توفيرها</th>
                            <th>طريقة التوفير</th>
                            <th>عملية التسليم</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if ($acceptances)
                            <tr>
                                <td>{{ $acceptances->id }}</td>
                                <td>{{ $acceptances->spare_name }}</td>
                                <td>{{ $acceptances->savingSpare_time }}</td>
                                <td>{{ $acceptances->method_spare }}</td>
                                <td> <a href="{{ route('submit.show', ['id' => $acceptances->id]) }}" class="btn btn-outline-warning" style="color: #fed713 ; -webkit-text-fill-color: black ; border-color: #fed713"
                                        onmouseover="this.style.webkitTextFillColor='white'"
                                        onmouseout="this.style.webkitTextFillColor='black'">
                                        عملية التسليم                                    </a></td>

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
