@extends('admin.admin_layouts')

@section('admin_content')



    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Admin</a>
            <a class="breadcrumb-item" href="{{ route('all.course') }}">Course</a>
            <span class="breadcrumb-item active">Create Course</span>
        </nav>

        <div class="sl-pagebody">

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">New Course ADD
                    <a href="{{ route('all.course') }}" class="btn btn-success btn-sm pull-right ">All Courses</a>
                </h6>
                <p class="mg-b-20 mg-sm-b-30">New Course Information Add Form.</p>

                <form method="POST" action="{{ route('store.course') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-layout">
                        <div class="row mg-b-25">

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">English Name: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control @error('en_name') is-invalid @enderror" type="text"
                                           name="en_name"
                                           placeholder="Enter Course English Name" required>
                                    @error('en_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Arabic Name: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control @error('ar_name') is-invalid @enderror" type="text"
                                           name="ar_name"
                                           placeholder="Enter Course Arabic Name" required>
                                    @error('ar_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Course Price: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control @error('price') is-invalid @enderror" type="text"
                                           name="price"
                                           placeholder="Enter Course Price" required>
                                    @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Number Of Days: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control @error('day_number') is-invalid @enderror" type="text"
                                           name="day_number"
                                           placeholder="Enter Days Number" required>
                                    @error('day_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Number Of Hours: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control @error('hour_number') is-invalid @enderror" type="text"
                                           name="hour_number"
                                           placeholder="Enter Hours Number" required>
                                    @error('hour_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Course Status: <span
                                            class="tx-danger">*</span></label>
                                    <select name="status" class="form-control">
                                        <option>Active</option>
                                        <option>Inactive</option>
                                    </select>
                                    @error('hour_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Course Arabic Details: <span
                                            class="tx-danger">*</span></label>
                                    <textarea class="form-control" id="summernote" name="ar_description"></textarea>
                                    @error('ar_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div><!-- col-12 -->

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Course English Details: <span
                                            class="tx-danger">*</span></label>
                                    <textarea class="form-control" id="summernote2" name="en_description"></textarea>
                                    @error('en_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div><!-- col-12 -->


                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Course Photo: <span
                                            class="tx-danger">*</span></label><br>
                                    <label class="custom-file">
                                        <input type="file" id="file" class="custom-file-input"
                                               name="photo" onchange="readURL(this);" required>
                                        <span class="custom-file-control"></span>
                                    </label>
                                </div>
                                <img src="#" id="one">
                            </div><!-- col-4 -->


                        </div><!-- row -->

                        <hr>
                        <br>


                        <div class="form-layout-footer">
                            <button type="submit" class="btn btn-info mg-r-5">Submit Form</button>
                            <a class="btn btn-secondary" href="{{ route('all.course') }}">Cancel</a>
                        </div><!-- form-layout-footer -->
                    </div><!-- form-layout -->
                </form>
            </div><!-- card -->

        </div><!-- row -->

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


