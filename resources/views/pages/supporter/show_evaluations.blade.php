@extends('layout.master', ['title' => 'التقييمات'])

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




                    <!-- جدول عرض البيانات -->
                    <h2>التقييمات المخزنة</h2>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>التقييم</th>
                            <th>الملاحظات</th>
                            <th>صاحب التقييم</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($evaluations as $evaluation)
                            <tr>
                                <td>{{$evaluation->id}}</td>
                                <td>
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $evaluation->rating)
                                            <span class="text-warning" style=" font-size: 28px">*</span>
                                        @else
                                            <span class="text-secondary" style=" font-size: 28px">*</span>
                                        @endif
                                    @endfor
                                </td>
                                <td>{{ $evaluation->comment }}</td>
                                <td>{{ $evaluation->user->emp_name }}</td>
                            </tr>
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


</body>
@endsection
