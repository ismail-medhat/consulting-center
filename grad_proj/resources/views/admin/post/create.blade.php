@extends('admin.admin_layouts')

@section('admin_content')



    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Admin</a>
            <a class="breadcrumb-item" href="{{ route('all.post') }}">Post</a>
            <span class="breadcrumb-item active">Create Post</span>
        </nav>

        <div class="sl-pagebody">

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">New Post ADD
                    <a href="{{ route('all.post') }}" class="btn btn-success btn-sm pull-right ">All Posts</a>
                </h6>
                <p class="mg-b-20 mg-sm-b-30">New Post Information Add Form.</p>

                <form method="POST" action="{{ route('store.post') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-layout">
                        <div class="row mg-b-25">

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Post Name: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control @error('name') is-invalid @enderror" type="text"
                                           name="name"
                                           placeholder="Enter Post Name" required>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Post Status: <span
                                            class="tx-danger">*</span></label>
                                    <select name="status" class="form-control">
                                        <option selected >Active</option>
                                        <option>Inactive</option>
                                    </select>
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Post Photo: <span
                                            class="tx-danger">*</span></label><br>
                                    <label class="custom-file">
                                        <input type="file" id="file" class="custom-file-input"
                                               name="photo" onchange="readURL(this);" required>
                                        <span class="custom-file-control"></span>
                                    </label>
                                </div>
                                <img src="#" id="one">
                            </div><!-- col-4 -->


                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Post Description: <span
                                            class="tx-danger">*</span></label>
                                    <textarea class="form-control" id="summernote" name="description"></textarea>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div><!-- col-12 -->

                        </div><!-- row -->

                        <hr>
                        <br>

                        <div class="form-layout-footer">
                            <button type="submit" class="btn btn-info mg-r-5">ADD Post</button>
                            <a class="btn btn-secondary" href="{{ route('all.post') }}">Cancel</a>
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


