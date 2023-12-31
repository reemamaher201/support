@extends('layout.master', ['title' => 'التسليم'])

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

                        <form action="{{ route('submit.create',['id'=>$acceptance->id]) }} " method="post"
                              style="margin-top: 50px">
                            @csrf
                            <div class="card">
                                <div class="card-body">

                                    <div class="form-group">
                                        <label for="recipient_name">اسم المستلم </label>
                                        <input class="form-control" id="recipient_name" name="recipient_name" value="{{$acceptance->employee->emp_name}}"
                                               readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="delivery_place">مكان الاستلام</label>
                                        <input class="form-control" id="delivery_place" name="delivery_place"
                                               required>
                                    </div>
                                    <div class="form-group">
                                        <label for="delivery_time">تاريخ الاستلام </label>
                                        <input type="datetime-local" class="form-control" id="delivery_time"
                                               name="delivery_time"
                                               required>
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
                            <th>اسم المستلم</th>
                            <th>تاريخ الاستلام</th>
                            <th>مكان الاستلام</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($acceptance->deliveries as $delivery)
                            <tr>
                                <td>{{ $acceptance->id }}</td>
                                <td>{{ $delivery->recipient_name }}</td>
                                <td>{{ $delivery->delivery_time }}</td>
                                <td>{{ $delivery->delivery_place }}</td>
                                <td> <a href="{{ route('msg.show', ['id' => $delivery->id]) }}" class="btn btn-outline-warning" style="color: #fed713 ; -webkit-text-fill-color: black ; border-color: #fed713"
                                        onmouseover="this.style.webkitTextFillColor='white'"
                                        onmouseout="this.style.webkitTextFillColor='black'">
                                        أرسل رسالة                                    </a></td>
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
