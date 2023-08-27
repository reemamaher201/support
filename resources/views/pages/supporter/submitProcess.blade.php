@extends('layout.master', ['title' => 'الإجراءات'])
<body>

<div class="container-scroller">
    @section('content')
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            @if (Auth::user()->parent_unit == 1)
                @include('layout.sidebar1')
            @else
                @include('layout.sidebar2')
            @endif
            <div class=" rtl main-panel">
                <div class="content-wrapper">

                    <form action="{{ route('submit.create' ,['id' => $acceptances->id]) }} " method="post" style="margin-top: 50px">
                        @csrf
                        @method('PUT')
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="spare_name">اسم المستلم </label>
                                    <input class="form-control" id="spare_name" name="spare_name"
                                           required>
                                </div>
                                <div class="form-group">
                                    <label for="spare_name">مكان الاستلام</label>
                                    <input class="form-control" id="spare_name" name="spare_name"
                                           required>
                                </div>
                                <div class="form-group">
                                    <label for="savingSpare_time">تاريخ الاستلام </label>
                                    <input type="datetime-local" class="form-control" id="savingSpare_time" name="savingSpare_time"
                                           required>
                                </div>

                                <button class="btn btn-outline-warning" type="submit"
                                        style="color: #fed713 ; -webkit-text-fill-color: black ; border-color: #fed713; margin-right: 830px">
                                    ارسال
                                </button>
                            </div>
                        </div>
                    </form>


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
{{--                        <tbody>--}}
{{--                        @if ($acceptances)--}}
{{--                            <tr>--}}
{{--                                <td>{{ $acceptances->id }}</td>--}}
{{--                                <td>{{ $acceptances->spare_name }}</td>--}}
{{--                                <td>{{ $acceptances->savingSpare_time }}</td>--}}
{{--                                <td>{{ $acceptances->method_spare }}</td>--}}
{{--                                <td> <a href="" class="btn btn-outline-warning" style="color: #fed713 ; -webkit-text-fill-color: black ; border-color: #fed713"--}}
{{--                                        onmouseover="this.style.webkitTextFillColor='white'"--}}
{{--                                        onmouseout="this.style.webkitTextFillColor='black'">--}}
{{--                                        عملية التسليم                                    </a></td>--}}

{{--                            </tr>--}}
{{--                        @endif--}}
{{--                        </tbody>--}}
                    </table>

                </div>
            </div>
        </div>
</div>
</body>
