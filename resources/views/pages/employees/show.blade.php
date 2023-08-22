@extends('layout.master', ['title' => 'الرئيسية'])

<body>
    <div class="container-scroller">
        @section('content')
            <!-- partial -->
            <div class="container-fluid page-body-wrapper">
                <!-- partial:partials/_sidebar.html -->

                @include('layout.sidebar2')


                <!-- partial -->
                <div class=" rtl main-panel">
                    <div class="content-wrapper">
                        <div class="page-header">
                            <h3 class="page-title">
                                <span class="page-title-icon bg-gradient-warning text-white me-2">
                                    <i class="mdi mdi-settings"></i>
                                </span>عرض طلبات الصيانة
                            </h3>


                        </div>
                        <div class="row">
                            <table class="table table-bordered mt-3">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>عنوان المشكلة</th>
                                        <th>وصف المشكلة</th>
                                        <th>صاحب المشكلة</th>
                                        <th>مكان المكتب</th>
                                        <th>مرفقات الطلب</th>
                                        <th>-</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($supportRequests as $request)
                                        <tr>
                                            <td>{{ $request->issue_title }}</td>
                                            <td>{{ $request->issue_description }}</td>
                                            <td>{{ $request->requester_name }}</td>
                                            <td>{{ $request->office_location }}</td>
                                            <td>
                                                @foreach (json_decode($request->attachments) as $attachment)
                                                    <img src="{{ asset('storage/attachments/' . $attachment) }}"
                                                        alt="Attachment" class="img-thumbnail">
                                                @endforeach

                                            </td>
                                            <td>
                                                <a href="{{ route('support.edit', ['id' => $request->id]) }}"
                                                    class="btn btn-dark">تعديل</a>

                                                <a href="{{ route('support.delete', ['id' => $request->id]) }}"
                                                    class="btn btn-danger"
                                                    onclick="return confirm('هل أنت متأكد من رغبتك في حذف هذا الطلب؟')">حذف</a>
                                            </td>
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
        </div>

    </body>
@endsection
