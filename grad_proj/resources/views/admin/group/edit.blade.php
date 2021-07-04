@extends('admin.admin_layouts')

@section('admin_content')


    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Admin</a>
            <a class="breadcrumb-item" href="{{ route('all.group') }}">Product</a>
            <span class="breadcrumb-item active">Edit Post</span>
        </nav>

        <div class="sl-pagebody">

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Post Edit Page
                    <a href="{{ route('all.group') }}" class="btn btn-sm btn-warning float-right">
                        <i class="fa fa-arrow-left"> Back To posts</i></a>
                </h6>
                <p class="mg-b-20 mg-sm-b-30">Update Post Information Form.</p>

                <form method="POST" action="{{ route('update.group',$group->id) }}">
                    @csrf
                    <div class="form-layout">


                        <div class="row mg-b-25">


                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Group Name: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control @error('name') is-invalid @enderror" type="text"
                                           name="group_name"
                                           placeholder="Enter Post Name" required
                                           value="{{ $group->group_name }}">

                                </div>
                            </div><!-- col-6 -->


                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Start Date: <span
                                            class="tx-danger">*</span></label>
                                    <div class="input-group">
                                    <span class="input-group-addon"><i
                                            class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                                        <input type="text" name="start_date" class="form-control date-picker"
                                               placeholder="MM-DD-YYYY" required
                                               value="{{ \Carbon\Carbon::parse($group->start_date)->format('m/d/Y') }}">
                                    </div>
                                </div>
                            </div><!-- col-6 -->


                        </div><!-- row -->

                        <br>


                        <div class="form-layout-footer">
                            <button type="submit" class="btn btn-info mg-r-5">Update Group</button>
                        </div><!-- form-layout-footer -->
                    </div><!-- form-layout -->
                </form>
            </div><!-- card -->

        </div><!-- row -->

        <!-- ##################### Second Form Image ################################################ -->


    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->



@endsection



