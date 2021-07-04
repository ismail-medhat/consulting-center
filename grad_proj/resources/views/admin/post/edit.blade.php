@extends('admin.admin_layouts')

@section('admin_content')


    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Admin</a>
            <a class="breadcrumb-item" href="{{ route('all.post') }}">Product</a>
            <span class="breadcrumb-item active">Edit Post</span>
        </nav>

        <div class="sl-pagebody">

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Post Edit Page
                    <a href="{{ route('all.post') }}" class="btn btn-sm btn-warning float-right">
                        <i class="fa fa-arrow-left"> Back To posts</i></a>
                </h6>
                <p class="mg-b-20 mg-sm-b-30">Update Post Information Form.</p>

                <form method="POST" action="{{ route('update.post',$post->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-layout">


                        <div class="row mg-b-25">


                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Post Name: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control @error('name') is-invalid @enderror" type="text"
                                           name="name"
                                           placeholder="Enter Post Name" required
                                           value="{{ $post->name }}">

                                </div>
                            </div><!-- col-6 -->


                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Post Status: <span
                                            class="tx-danger">*</span></label>
                                    <select name="status" class="form-control">
                                        <option <?php if ($post->status == 1) echo "selected"?> >Active</option>
                                        <option <?php if ($post->status == 0) echo "selected"?> >Inactive</option>
                                    </select>
                                </div>
                            </div><!-- col-6 -->

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Post Description: <span
                                            class="tx-danger">*</span></label>
                                    <textarea class="form-control" id="summernote"
                                              name="description">{!! $post->description !!}</textarea>
                                </div>
                            </div><!-- col-12 -->



                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Post Photo: <span
                                            class="tx-danger">*</span></label><br>
                                    <label class="custom-file">
                                        <input type="file" id="file" class="custom-file-input"
                                               name="photo" onchange="readURL(this);">
                                        <span class="custom-file-control"></span>
                                    </label>
                                </div>
                                <input type="hidden" name="old_photo" value="{{ $post->photo }}">
                                <img src="#" id="one">
                            </div><!-- col-6 -->


                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Current Post Image: <span
                                            class="tx-danger">*</span></label>
                                    <img src="{{ URL::to($post->photo) }}" style="width: 80px;height: 80px;">
                                </div>
                            </div><!-- col-6 -->


                        </div><!-- row -->

                        <br>


                        <div class="form-layout-footer">
                            <button type="submit" class="btn btn-info mg-r-5">Update Post</button>
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



