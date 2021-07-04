@extends('admin.admin_layouts')

@section('admin_content')



    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Admin</a>
            <a class="breadcrumb-item" href="{{ route('all.post') }}">Posts</a>
            <span class="breadcrumb-item active">View Post</span>
        </nav>

        <div class="sl-pagebody">

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Post Details Page
                    <a href="{{ route('all.post') }}" class="btn btn-sm btn-warning float-right">
                        <i class="fa fa-arrow-left"> Back To post</i></a></h6>
                <br>
                <div class="form-layout">
                    <hr>
                    <div class="row mg-b-25">


                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Post Name: <span
                                        class="tx-danger">*</span></label><br>
                                <strong>{{ $post->name }}</strong>
                            </div>
                        </div><!-- col-4 -->


                        <div class="col-lg-2">
                            <div class="form-group">
                                <label class="form-control-label">Post Status: <span
                                        class="tx-danger">*</span></label><br>
                                @if($post->status==1)
                                    <span class="badge badge-pill badge-success">Active</span>
                                @else
                                    <span class="badge badge-pill badge-warning">Inactive</span>
                                @endif
                            </div>
                        </div><!-- col-2 -->


                        <div class="col-lg-2">
                            <div class="form-group">
                                <label class="form-control-label">Post Creation Date: <span
                                        class="tx-danger">*</span></label><br>
                                @if($post->created_at == NULL)
                                    <span class="text-danger">No Date Set</span>
                                @else
                                    <span class="badge badge-warning badge-info p-2">{{Carbon\Carbon::parse($post->created_at)->diffForHumans()}}</span>
                                @endif
                            </div>
                        </div><!-- col-2 -->


                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Post Image: <span
                                        class="tx-danger">*</span></label><br>
                                <img src="{{ URL::to($post->photo) }}" style="width: 100px; height: 100px;">
                            </div>
                        </div><!-- col-4 -->


                        <div class="col-lg-12">
                            <hr>
                            <div class="form-group">
                                <label class="form-control-label">Post Description: <span
                                        class="tx-danger">*</span></label><br>
                                <p>{!! $post->description !!} </p>
                            </div>
                        </div><!-- col-12 -->


                    </div><!-- row -->

                    <hr>

                </div><!-- form-layout -->

            </div><!-- card -->
        </div><!-- row -->

    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->


@endsection



