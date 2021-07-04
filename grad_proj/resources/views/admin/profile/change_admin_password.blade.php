@extends('admin.admin_layouts')
@section('admin_content')

    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">Admin</a>
            <span class="breadcrumb-item active " >change password</span>
        </nav>

        <div class="sl-pagebody">

            <form method="post" action="{{route('change.password')}}">
                @csrf
                    <div class="container">
                        <div class="row flex-lg-nowrap">
                            <div class="col">
                                <div class="row">
                                    <div class="col mb-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="e-profile">
                                                    <ul class="nav nav-tabs">
                                                    </ul>
                                                    <div class="tab-content pt-3">
                                                        <div class="tab-pane active">
                                                            <div class="row">
                                                                <div class="col-12 col-sm-6 mb-3">
                                                                    <div class="mb-2" style="font-size: 25px;">change Admin password Information Form</div>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <div class="form-group">
                                                                                <label>Current Password : <span
                                                                                        class="tx-danger">*</span></label>
                                                                                <input name="old_password" type="password" class="form-control" value="" placeholder="Enter Old Password">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <div class="form-group">
                                                                                <label>New Password : <span
                                                                                        class="tx-danger">*</span></label>
                                                                                <input  name="password" class="form-control" type="password" placeholder="Enter New Password">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <div class="form-group">
                                                                                <label>Confirm Password : <span
                                                                                        class="tx-danger">*</span></label>
                                                                                <input  name="password_confirm" class="form-control" type="password" placeholder="Re-enter password to confirm"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col d-flex justify-content-end">
                                                                    <div class="py-3 pb-4 border-bottom">
                                                                    <button class="btn btn-primary mr-3"><i class="fa fa-save"></i> Save Changes</button>
                                                                    <a class="btn border button" href="{{route('admin.dashboard')}}"><i class="fa fa-times-circle"></i> Cancel</a> </div>
                                                                <div class="d-sm-flex align-items-center pt-3" id="deactivate"> </div>
                                                            </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>



                </form>







@endsection
