@extends('admin.admin_layouts')

@section('admin_content')



    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Admin</a>
            <a class="breadcrumb-item" href="{{ route('all.course') }}">Courses</a>
            <span class="breadcrumb-item active">View Course</span>
        </nav>

        <div class="sl-pagebody">

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Course Details Page
                    <a href="{{ route('all.course') }}" class="btn btn-sm btn-warning float-right">
                        <i class="fa fa-arrow-left"> Back To course</i></a></h6>
                <br>
                <div class="form-layout">
                    <hr>
                    <div class="row mg-b-25">


                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">English Name: <span
                                        class="tx-danger">*</span></label>
                                <strong>{{ $course->en_name }}</strong>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Arabic Name: <span
                                        class="tx-danger">*</span></label>
                                <strong>{{ $course->ar_name }}</strong>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Course Price: <span
                                        class="tx-danger">*</span></label>
                                <strong>{{ $course->price }}</strong>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Number Of Days: <span
                                        class="tx-danger">*</span></label>
                                <strong>{{ $course->day_number }}</strong>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Number Of Hours: <span
                                        class="tx-danger">*</span></label>
                                <strong>{{ $course->hour_number }}</strong>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Course Status: <span
                                        class="tx-danger">*</span></label>
                                @if($course->status==1)
                                    <span class="badge badge-pill badge-success">Active</span>
                                @else
                                    <span class="badge badge-pill badge-warning">Inactive</span>
                                @endif
                            </div>
                        </div><!-- col-4 -->


                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Arabic Description: <span
                                        class="tx-danger">*</span></label><br>
                                <p>{!! $course->ar_description !!} </p>
                            </div>
                        </div><!-- col-12 -->

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">English Description: <span
                                        class="tx-danger">*</span></label><br>
                                <p>{!! $course->en_description !!} </p>
                            </div>
                        </div><!-- col-12 -->


                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Course Image: <span
                                        class="tx-danger">*</span></label><br>
                                <img src="{{ URL::to($course->photo) }}" style="width: 100px; height: 100px;">
                            </div>
                        </div><!-- col-4 -->


                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Course Creation Date: <span
                                        class="tx-danger">*</span></label><br>
                                @if($course->created_at == NULL)
                                    <span class="text-danger">No Date Set</span>
                                @else
                                    <span class="badge badge-warning badge-info p-2">{{Carbon\Carbon::parse($course->created_at)->diffForHumans()}}</span>
                                @endif
                            </div>
                        </div><!-- col-4 -->


                    </div><!-- row -->

                    <hr>

                </div><!-- form-layout -->

            </div><!-- card -->
        </div><!-- row -->

    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->


@endsection



