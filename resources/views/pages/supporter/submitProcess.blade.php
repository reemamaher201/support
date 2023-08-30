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

                    <form action="{{ route('submit.create') }} " method="post" style="margin-top: 50px">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="support_id">اسم  </label>
                                    <input  class="form-control" id="support_id" name="support_id"
                                        value="{{$acceptances->id}}"   required>
                                </div>
                                <div class="form-group">
                                    <label for="recipient_name">اسم المستلم </label>
                                    <input class="form-control" id="recipient_name" name="recipient_name"
                                           required>
                                </div>
                                <div class="form-group">
                                    <label for="delivery_place">مكان الاستلام</label>
                                    <input class="form-control" id="delivery_place" name="delivery_place"
                                           required>
                                </div>
                                <div class="form-group">
                                    <label for="delivery_time">تاريخ الاستلام </label>
                                    <input type="datetime-local" class="form-control" id="delivery_time" name="delivery_time"
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
                            <th>اسم المستلم</th>
                            <th>تاريخ الاستلام</th>
                            <th>مكان الاستلام</th>
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
