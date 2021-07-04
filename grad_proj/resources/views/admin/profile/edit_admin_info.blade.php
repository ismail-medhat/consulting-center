@extends('admin.admin_layouts')
@section('admin_content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">Admin</a>
        <span class="breadcrumb-item active">Edit profile</span>
    </nav>

    <div class="sl-pagebody">

        <form method="post" action="{{route('admin.profile.update')}}" enctype="multipart/form-data">
            @csrf

            <div class="container">
                <div class="row flex-lg-nowrap">
                    <div class="col">
                        <div class="row">
                            <div class="col mb-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="e-profile">
                                            <div class="row">
                                                <div class="col-md-3 m-0">
                                                    <div class="m-3" >
                                                        
                                                            <img style="width:200px; height:200px; border-radius:15px; "
                                                                id="one"
                                                                src="{{ URL::to($admin_info->profile_photo_path)}}">
                                                    
                                                    </div>
                                                </div>


                                                <div class="col-md-4 offset-5 m-3">


                                                    @if($admin_info->profile_photo_path!='media/admin/avatar.png')

                                                        
                                                    <div class="mt-2" style="float: left;display: block;color:#FFF;">
                                                        <a class="btn btn-secondary rounded">
                                                            <i class="fa fa-fw fa-camera">
                                                            </i>
                                                            <input type="file" id="file" onchange="readURL(this);"
                                                                name="profile_photo">
                                                        </a>
                                                    </div>

                                                    <div class="mt-2" style="float: left;display: block;color:#FFF;border-radius: 10px; ">
                                                        
                                                        <a class="btn btn-danger rounded" href="{{ route('admin.delete.photo') }}">
                                                            <i class="fa fa-fw fa-close">
                                                            </i> Delete Photo
                                                            
                                                        </a>
                                                    </div>

                                                    @else

                                                    <div class="mt-2" style="float: left;display: block;color:#FFF;">
                                                        <a class="btn btn-secondary rounded">
                                                            <i class="fa fa-fw fa-camera">
                                                            </i>
                                                            <input type="file" id="file" onchange="readURL(this);"
                                                                name="profile_photo">
                                                        </a>
                                                    </div>

                                                    @endif


                                                </div>


                                           


                                            </div>
                                            <ul class="nav nav-tabs">

                                            </ul>
                                            <div class="tab-content pt-3">
                                                <div class="tab-pane active">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="row">
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <label> Name</label>
                                                                        <input class="form-control" type="text"
                                                                            name="name" placeholder="name"
                                                                            value="{{$admin_info->name}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <label>Email</label>
                                                                        <input class="form-control" type="text"
                                                                            name="email" placeholder="email"
                                                                            value="{{$admin_info->email}}">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="row">

                                                        <div class="col d-flex justify-content-end">

                                                            <div class="py-3 pb-4 border-bottom">
                                                                <button class="btn btn-primary mr-3"><i
                                                                        class="fa fa-save"></i> Save Changes
                                                                </button>
                                                                <a class="btn border button"
                                                                    href="{{route('admin.dashboard')}}"><i
                                                                        class="fa fa-times-circle"></i> Cancel</a>
                                                            </div>
                                                            <div class="d-sm-flex align-items-center pt-3"
                                                                id="deactivate"></div>
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
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>


<script type="text/javascript">
    function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#one')
                        .attr('src', e.target.result)
                        .width(200)
                        .height(200);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
</script>

@endsection