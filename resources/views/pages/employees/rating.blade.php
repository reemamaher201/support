@extends('layout.master', ['title' => 'الإشعارات'])

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
                                <span class="page-title-icon bg-gradient-warning text-white me-2"
                                      style="margin-left: 10px">
                                    <i class="mdi mdi-star"></i>
                                </span> التقييمات
                        </h3>


                    </div>


                    <form action="{{route('submit.rating' , ['id'=>$acceptance->id])}}" method="POST">
                        @csrf
                    <div class="card" style="padding: 20px;background-color: #e7e4e4">

                        <div class="form-group">
                            <h5> المشكلة</h5>
                            <label class="form-control" style="background: white">{{$support->issue_title}}</label>
                        </div>
                        <div class="form-group">
                            <h5>الإجراء المتخذ</h5>
                            <label class="form-control" style="background: white">{{$acceptance->procedures_token}}</label>
                        </div>

                            <input type="hidden" class="form-control" name="support_id" style="background: white" value="{{$delivery->support_id}}">



                            <input type="hidden" class="form-control" name="emp_support_id" style="background: white" value="{{$delivery->emp_support_id}}">



                            <input type="hidden" class="form-control" name="employee_id" style="background: white" value="{{Auth::user()->emp_id}}">




                            <input type="hidden" class="form-control" name="status" style="background: white" value="1">

                        <div class="container mt-1">
                            <div class="card p-0">
                                <div class="card-body">

                                        <h4 class="card-title d-inline" style="color: #615f5f;margin-left: 20px">
                                            التقييم </h4>
                                        <div class="rating-css d-inline">
                                            <div class="star-icon d-inline">
                                                <input type="radio" value="1" name="rating" checked
                                                       id="rating1">
                                                <label for="rating1" class="fa fa-star"></label>
                                                <input type="radio" value="2" name="rating" id="rating2">
                                                <label for="rating2" class="fa fa-star"></label>
                                                <input type="radio" value="3" name="rating" id="rating3">
                                                <label for="rating3" class="fa fa-star"></label>
                                                <input type="radio" value="4" name="rating" id="rating4">
                                                <label for="rating4" class="fa fa-star"></label>
                                                <input type="radio" value="5" name="rating" id="rating5">
                                                <label for="rating5" class="fa fa-star"></label>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-top: 20px">
                                            <h5>الملاحظات</h5>
                                            <textarea class="form-control" rows="5" style="background: #dedcdc" name="comment"></textarea>
                                        </div>

                                        <button class="btn btn-outline-warning" style="color: #fed713 ; -webkit-text-fill-color: black ; border-color: #fed713; margin-right: 900px" type="submit" >قييم الان
                                        </button>



                                </div>
                            </div>
                        </div>

                    </div>
                    </form>

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
