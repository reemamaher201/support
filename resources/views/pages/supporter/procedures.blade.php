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
                    @foreach ($acceptances as $acceptance)
                        <form action="{{ route('acceptances.storeProcedures', ['id' =>$acceptance->problem_id] )}}"
                              method="post" style="margin-top: 50px">

                            @endforeach
                            @csrf
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


                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>متخذ الإجراء</th>
                                <th>تاريخ الإجراء</th>
                                <th>حالة الإنجاز</th>
                                <th>نص الإجراء</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($n as $notification)
                                @foreach ($acceptances as $acceptance)
                                    @if($acceptance->problem_id == $notification->id )
                                        {{--                            @if($acceptance->problem_id == $notification->id  )--}}
                                        <tr>
                                            <td>{{ $acceptance->id }}</td>
                                            <td>{{ $acceptance->assigned }}</td>
                                            <td>{{ $acceptance->procedures_time }}</td>
                                            <td>{{ $acceptance->procedures_status }}</td>
                                            <td>{{ $acceptance->procedures_token }}</td>

                                        </tr>
                                    @endif
                                @endforeach
                            @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
</div>
</body>
