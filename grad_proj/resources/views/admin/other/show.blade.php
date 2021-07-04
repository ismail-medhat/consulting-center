@extends('admin.admin_layouts')

@section('admin_content')



    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Admin</a>
            <a class="breadcrumb-item" href="{{ route('all.user') }}">Users</a>
            <span class="breadcrumb-item active">View User Info</span>
        </nav>

        <div class="sl-pagebody">

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">User Details Page
                    <a href="{{ route('all.user') }}" class="btn btn-sm btn-warning float-right">
                        <i class="fa fa-arrow-left"> Back To All Users</i></a></h6>
                <br>
                <div class="form-layout">
                    <hr>
                    <div class="row mg-b-25">


                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">English Full Name: <span
                                        class="tx-danger">*</span></label>
                                <strong>{{ $user->en_full_name }}</strong>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Arabic Full Name: <span
                                        class="tx-danger">*</span></label>
                                <strong>{{ $user->ar_full_name }}</strong>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">User Name: <span
                                        class="tx-danger">*</span></label>
                                <strong>{{ $user->name }}</strong>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Gender: <span
                                        class="tx-danger">*</span></label>
                                <strong>{{ $user->gender }}</strong>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Nationality: <span
                                        class="tx-danger">*</span></label>
                                <strong>{{ $user->nationality }}</strong>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">National ID: <span
                                        class="tx-danger">*</span></label>
                                <strong>{{ $user->national_id }}</strong>
                            </div>
                        </div><!-- col-4 -->


                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Profile Image: <span
                                        class="tx-danger">*</span></label><br>
                                <img src="{{ URL::to('storage/'.$user->profile_photo_path) }}" style="width: 100px; height: 100px;">
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">SSN Image: <span
                                        class="tx-danger">*</span></label><br>
                                <img src="{{ URL::to($user->national_id_photo) }}" style="width: 100px; height: 100px;">
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Personal Image: <span
                                        class="tx-danger">*</span></label><br>
                                <img src="{{ URL::to($user->personal_photo) }}" style="width: 100px; height: 100px;">
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">WhatsApp Number: <span
                                        class="tx-danger">*</span></label>
                                <strong>{{ $user->phone }}</strong>
                            </div>
                        </div><!-- col-4 -->

                        

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">E-Mail: <span
                                        class="tx-danger">*</span></label>
                                <strong>{{ $user->email }}</strong>
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



