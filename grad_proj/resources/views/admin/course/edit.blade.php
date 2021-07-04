@extends('admin.admin_layouts')

@section('admin_content')


    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Admin</a>
            <a class="breadcrumb-item" href="{{ route('all.course') }}">Product</a>
            <span class="breadcrumb-item active">Edit Course</span>
        </nav>

        <div class="sl-pagebody">

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Course Edit Page
                    <a href="{{ route('all.course') }}" class="btn btn-sm btn-warning float-right">
                        <i class="fa fa-arrow-left"> Back To course</i></a>
                </h6>
                <p class="mg-b-20 mg-sm-b-30">Update Course Information Form.</p>

                <form method="POST" action="{{ route('update.course',$course->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-layout">


                        <div class="row mg-b-25">


                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">English Name: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control @error('en_name') is-invalid @enderror" type="text"
                                           name="en_name"
                                           placeholder="Enter Course English Name" required
                                           value="{{ $course->en_name }}">

                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Arabic Name: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control @error('ar_name') is-invalid @enderror" type="text"
                                           name="ar_name"
                                           placeholder="Enter Course Arabic Name" required
                                           value="{{ $course->ar_name }}">

                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Course Price: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control @error('price') is-invalid @enderror" type="text"
                                           name="price"
                                           placeholder="Enter Course Price" required
                                           value="{{ $course->price }}">

                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Number Of Days: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control @error('day_number') is-invalid @enderror" type="text"
                                           name="day_number"
                                           placeholder="Enter Days Number" required
                                           value="{{ $course->day_number }}">

                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Number Of Hours: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control @error('hour_number') is-invalid @enderror" type="text"
                                           name="hour_number"
                                           placeholder="Enter Hours Number" required
                                           value="{{ $course->hour_number }}">

                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Course Status: <span
                                            class="tx-danger">*</span></label>
                                    <select name="status" class="form-control">
                                        <option <?php if ($course->status == 1) echo "selected"?> >Active</option>
                                        <option <?php if ($course->status == 0) echo "selected"?> >Inactive</option>
                                    </select>
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Course Arabic Details: <span
                                            class="tx-danger">*</span></label>
                                    <textarea class="form-control" id="summernote"
                                              name="ar_description">{!! $course->ar_description !!}</textarea>
                                </div>
                            </div><!-- col-12 -->

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Course English Details: <span
                                            class="tx-danger">*</span></label>
                                    <textarea class="form-control" id="summernote2"
                                              name="en_description">{!! $course->en_description !!}</textarea>
                                </div>
                            </div><!-- col-12 -->


                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Course Photo: <span
                                            class="tx-danger">*</span></label><br>
                                    <label class="custom-file">
                                        <input type="file" id="file" class="custom-file-input"
                                               name="photo" onchange="readURL(this);">
                                        <span class="custom-file-control"></span>
                                    </label>
                                </div>
                                <input type="hidden" name="old_photo" value="{{ $course->photo }}">
                                <img src="#" id="one">
                            </div><!-- col-4 -->


                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Current Course Image: <span
                                            class="tx-danger">*</span></label>
                                    <img src="{{ URL::to($course->photo) }}" style="width: 80px;height: 80px;">
                                </div>
                            </div><!-- col-4 -->


                        </div><!-- row -->

                        <br>


                        <div class="form-layout-footer">
                            <button type="submit" class="btn btn-info mg-r-5">Update Course</button>
                        </div><!-- form-layout-footer -->
                    </div><!-- form-layout -->
                </form>
            </div><!-- card -->

        </div><!-- row -->

        <!-- ##################### Second Form Image ################################################ -->


    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>


    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#one')
                        .attr('src', e.target.result)
                        .width(80)
                        .height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>



@endsection



