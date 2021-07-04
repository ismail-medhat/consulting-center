@extends('admin.admin_layouts')
@section('admin_content')



<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Admin</a>
        <span class="breadcrumb-item active ">Website Settings</span>
    </nav>

    <div class="sl-pagebody">


        <div class="container" style="padding: 30px;box-shadow: 4px 4px 4px #FFF , -4px -4px 4px #FFF;">

            @php
            $setting = DB::table('settings')->first();
            @endphp

            <form method="post" action=" {{ route('store.setting') }} " enctype="multipart/form-data">
                @csrf



                @if (!empty($setting))

                <div>
                    <h4>Edit Setting Information <a href="{{ route('edit.settings') }}"
                            style="text-decoration: underline;"> Click Her</a></h4>
                </div><br>
                <hr>

                <div class="row">


                    <div class="form-group col-md-4">
                        <label>Phone Number 1</label>
                        <input type="text" name="phone1" value="{{ $setting->phone1 }}" class="form-control" disabled>
                    </div>

                    <div class="form-group col-md-4">
                        <label>Phone Number 2</label>
                        <input type="text" name="phone2" value="{{ $setting->phone2 }}" class="form-control" disabled>
                    </div>

                    <div class="form-group col-md-4">
                        <label>E-Mail</label>
                        <input type="text" name="email" value="{{ $setting->email }}" class="form-control" disabled>
                    </div>

                </div>


                <div class="row">


                    <div class="form-group col-md-6">
                        <label>Facebook Link</label>
                        <input type="text" name="face_link" value="{{ $setting->face_link }}" class="form-control"
                            disabled>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Center Address</label>
                        <input type="text" name="address" value="{{ $setting->address }}" class="form-control" disabled>
                    </div>


                </div>
                <hr>


                <div class="row">

                    <div class="form-group col-md-5 " style="border-right: 2px solid #FFF;margin: auto;">
                        <h3>Instruction Video</h3><br>
                        <video controls width="300" height="170px;"
                            style="border-radius: 5px;padding:2.5px;border:3px solid #FFF;">

                            <source src="{{ asset($setting->video_link) }}">
                            Sorry, your browser doesn't support embedded videos.
                        </video>

                    </div>

                    <div class="form-group  col-md-5 ">
                        <h3>Wesite Logo</h3><br>
                        <img src="{{ asset($setting->logo) }}" alt="LOGO"
                            style="width: 170px;height: 170px;padding:2.5px;border:3px solid #FFF;"
                            class="img-thumbnail">

                    </div>



                </div>



                @else


                <div class="row">

                    <div class="form-group col-md-4">
                        <label>Phone Number 1</label>
                        <input type="text" name="phone1" class="form-control" required>
                    </div>

                    <div class="form-group col-md-4">
                        <label>Phone Number 2</label>
                        <input type="text" name="phone2" class="form-control" required>
                    </div>

                    <div class="form-group col-md-4">
                        <label>E-Mail</label>
                        <input type="text" name="email" class="form-control" required>
                    </div>

                </div>






                <div class="row">


                    <div class="form-group col-md-6">
                        <label>Facebook Link</label>
                        <input type="text" name="face_link" class="form-control" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Center Address</label>
                        <input type="text" name="address" class="form-control" required>
                    </div>


                </div>


                <div class="form-group">
                    <label>Upload Video</label>
                    <input type="file" name="video_link" class="form-control" required>
                </div>

                <div class="row">

                    <div class="form-group col-md-6 offset-2">
                        <label>Upload Logo</label>
                        <input type="file" onchange="readURL(this);" name="logo" class="form-control" required>
                    </div>

                    <div class="form-group col-md-2">
                        <img src="#" id="one" style="padding:2.5px;border:3px solid #FFF;">
                    </div>

                    <div class="form-group col-md-2">
                        <br>
                        <button type="submit" style="padding:10px 25px;">submit</button>
                    </div>

                </div>





                @endif









            </form>

        </div>




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