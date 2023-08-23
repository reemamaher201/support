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
                                </span> طلب صيانة
                        </h3>


                    </div>
                    <div class="row">
                        <form action="{{ route('submit') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="issue_title">عنوان المشكلة</label>
                                <input type="text" class="form-control" id="issue_title" name="issue_title" required>
                            </div>
                            <div class="form-group">
                                <label for="issue_description">وصف المشكلة</label>
                                <textarea id="issue_description" class="form-control" name="issue_description" rows="4"
                                          required></textarea></div>
                            <div class="form-group">
                                <label for="requester_name">صاحب المشكلة</label>
                                <input type="text" id="requester_name" class="form-control" name="requester_name"
                                       required></div>
                            <div class="form-group">
                                <label for="office_location">مكان المكتب</label>
                                <input type="text" id="office_location" class="form-control" name="office_location"
                                       required></div>
                            <div class="form-group">
                                <label for="attachments">مرفقات الطلب</label>
                                <input type="file" id="attachments" class="form-control" name="attachments[]" multiple
                                       accept="image/*"></div>

                            <button type="submit" class="btn btn-block btn-lg btn-gradient-warning mt-4">Submit
                                Request
                            </button>
                        </form>
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
