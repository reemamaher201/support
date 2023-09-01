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
                                    <i class="mdi mdi-bell-ring-outline"></i>
                                </span> الإشعارات
                        </h3>


                    </div>
                    <div class="card" style="padding: 20px;background-color: #e7e4e4">
                        {{--                        <form action="{{ route('submit') }}" method="POST" enctype="multipart/form-data">--}}
                        @csrf
                        <div class="form-group">
                            <h5> المشكلة</h5>
                            <label class="form-control" style="background: white">khvhvufu</label>
                        </div>
                        <div class="form-group">
                            <h5>الإجراء المتخذ</h5>
                            <label class="form-control" style="background: white">khvhvufu</label>
                        </div>
                        <div class="form-group">
                            <h5>مُتخذ الإجراء</h5>
                            <label class="form-control" style="background: white">khvhvufu</label>
                        </div>
                        <div class="container mt-1">
                            <div class="card p-0">
                                <div class="card-body">
                                    <form action="{{route('notification.rate')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="emp_id" value="{{$emp->emp_id}}">
                                        <h4 class="card-title d-inline" style="color: #615f5f;margin-left: 20px">
                                            التقييم </h4>
                                        <div class="rating-css d-inline">
                                            <div class="star-icon d-inline">
                                                <input type="radio" value="1" name="solve_rating" checked
                                                       id="rating1">
                                                <label for="rating1" class="fa fa-star"></label>
                                                <input type="radio" value="2" name="solve_rating" id="rating2">
                                                <label for="rating2" class="fa fa-star"></label>
                                                <input type="radio" value="3" name="solve_rating" id="rating3">
                                                <label for="rating3" class="fa fa-star"></label>
                                                <input type="radio" value="4" name="solve_rating" id="rating4">
                                                <label for="rating4" class="fa fa-star"></label>
                                                <input type="radio" value="5" name="solve_rating" id="rating5">
                                                <label for="rating5" class="fa fa-star"></label>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-top: 20px">
                                            <h5>الملاحظات</h5>
                                            <textarea class="form-control" rows="5" style="background: #dedcdc" name="solve_message"></textarea>
                                        </div>
                                    </form>

                                    <button class="btn" type="submit" style="margin-right: 780px;background: -webkit-gradient(linear, left top, right top, from(#f6e384), to(#ffd500));
    background: linear-gradient(to right, #f6e384, #ffd500);">تم
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- End of Inline CSS for Rating Stars -->
                        {{--                        <button class="btn btn-primary">Add to Cart</button>--}}


                        {{--                            <button type="submit" class="btn btn-block btn-lg btn-gradient-warning mt-4">تقديم الطلب--}}
                        {{--                            </button>--}}
                        {{--                        </form>--}}
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
