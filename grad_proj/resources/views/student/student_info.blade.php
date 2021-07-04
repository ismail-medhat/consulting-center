<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Student Information
        </h2>
    </x-slot>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />





    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="container text-center p-3">


                    <div style="margin-top: 10px;border:2px solid #EEE;padding:30px;box-shadow: 4px 4px 15px #d8d5d5;">


                        <div class="row" style="margin-bottom: 20px;">

                            <label for="formGroupExampleInput" class="col-md-2">User Name : </label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="name" value="{{ $user->name }}" disabled>
                            </div>

                            <label for="formGroupExampleInput" class="col-md-2">Your E-Mail : </label>
                            <div class="col-md-4">
                                <input type="email" class="form-control" name="email" value="{{ $user->email }}"
                                    disabled>
                            </div>

                        </div>

                        <form method="POST" action="{{ route('save.info') }}" enctype="multipart/form-data">
                            @csrf



                            <div class="row" style="margin-bottom: 20px;">

                                <label for="formGroupExampleInput" class="col-md-2">Full Name (EN) : </label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" value="{{ $user->en_full_name }}"
                                        name="en_full_name" <?php if ($user->national_id != null) {
                            echo 'disabled';
                            } ?> required>
                                    @error('en_full_name')
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>

                                <label for="formGroupExampleInput" class="col-md-2">Full Name (AR) : </label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" value="{{ $user->ar_full_name }}"
                                        name="ar_full_name" <?php if ($user->national_id != null) {
                            echo 'disabled';
                            } ?> required>
                                    @error('ar_full_name')
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>

                            </div>


                            <div class="row" style="margin-bottom: 20px;">

                                <label for="formGroupExampleInput" class="col-md-2">Gender : </label>
                                <div class="col-md-4">
                                    <select name="gender" class="form-control" <?php if ($user->national_id != null)
                                {
                                echo 'disabled';
                                } ?> required>
                                        @error('gender')
                                        <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                        <option value="">-- select one --</option>
                                        <option value="Male" <?php if($user->gender == 'Male') echo 'selected'; ?>>Male
                                        </option>
                                        <option value="Female" <?php if($user->gender == 'Female') echo 'selected'; ?>>
                                            Female</option>
                                    </select>
                                </div>

                                <label for="formGroupExampleInput" class="col-md-2">Nationality : </label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" value="{{ $user->nationality }}" name="nationality" <?php if ($user->national_id != null) {
                            echo 'disabled';
                            } ?> required>
                                    @error('nationality')
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>

                            </div>


                            <div class="row" style="margin-bottom: 20px;">

                                <label for="formGroupExampleInput" class="col-md-2">Whatsapp : </label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" value="{{ $user->phone }}" name="phone" <?php if ($user->national_id != null) {
                            echo 'disabled';
                            } ?> required>
                                    @error('phone')
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>

                                <label for="formGroupExampleInput" class="col-md-2">National ID : </label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" value="{{ $user->national_id }}"
                                        name="national_id" <?php if ($user->national_id != null) {
                            echo 'disabled';
                            } ?> required>
                                    @error('national_id')
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>

                            </div>


                            <div class="row" style="margin-bottom: 20px;">

                                <label for="formGroupExampleInput" class="col-md-2">Personal Photo : </label>
                                <div class="col-md-4">
                                    <input type="file" class="form-control" onchange="readURL(this);"
                                        name="personal_photo" <?php if ($user->national_id != null) {
                            echo 'disabled';
                            } ?> required>
                                    @error('personal_photo')
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                    @if ($user->national_id_photo == null)
                                    <img src="#" id="one" style="margin-top: 10px;" class="img-thumbnail">
                                    @else
                                    <img src="{{ asset($user->personal_photo) }}"
                                        style="margin-top: 10px;height: 150px;" class="img-thumbnail">

                                    @endif

                                </div>

                                <label for="formGroupExampleInput" class="col-md-2">SSN Photo : </label>
                                <div class="col-md-4">
                                    <input type="file" class="form-control" onchange="readURL2(this);"
                                        name="national_id_photo" <?php if ($user->national_id != null) {
                            echo 'disabled';
                            } ?> required>
                                    @error('national_id_photo')
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                    @if ($user->national_id_photo == null)
                                    <img src="#" id="two" style="margin-top: 10px;" class="img-thumbnail">
                                    @else
                                    <img src="{{ asset($user->national_id_photo) }}"
                                        style="margin-top: 10px;height: 150px;" class="img-thumbnail">

                                    @endif
                                </div>

                            </div>



                            <button type="submit" class="btn btn-primary btn-block">Save</button>



                        </form>

                    </div>





                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#one')
                        .attr('src', e.target.result)
                        .width(220)
                        .height(120);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

    </script>


    <script type="text/javascript">
        function readURL2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#two')
                        .attr('src', e.target.result)
                        .width(220)
                        .height(120);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

    </script>


</x-app-layout>