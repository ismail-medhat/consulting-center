<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Course Preview Payment
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



                    <div class="col-md-12">
                        <div class="row" style="border-radius: 20px;box-shadow: 4px 4px 10px #dddada;">
                            <div class="col-md-6" style="border-right: 2px solid #DDD;padding-top: 20px;">
                                <img src="{{ asset($course_info->photo) }}" style="height: 180px;float: left;"
                                    class="img-thumbnail">
                                <div style="margin-left:0px; ">
                                    <h3>{{ $course_info->en_name }}</h3>
                                    <h3>{{ $course_info->ar_name }}</h3>
                                    <span style="font-size: 22px;display: block;"><i class="far fa-usd-circle "
                                            style="color: red;"></i> {{ $course_info->price }} EGP</span>
                                    <span style="font-size: 22px;display: block;"><i class="far fa-clock"
                                            style="color: rgb(51, 255, 0);"></i> {{ $course_info->hour_number }}
                                        Hours</span>
                                    <span style="font-size: 22px;display: block;"><i class="fal fa-calendar-day"
                                            style="color: rgb(0, 183, 255);"></i> {{ $course_info->day_number }}
                                        Days</span>
                                </div>
                                <hr>

                                <div class="text-center">
                                    <h3>Arabic Description</h3>
                                    <p>{!! $course_info->ar_description !!}</p>
                                </div>

                            </div>

                            <div class="col-md-6" style="padding-top: 20px;">

                                <h3 class="text-center" style="padding:5px;color:#124; ">Student Info</h3>
                                <form method="POST" action="{{ route('final.pay') }}">
                                    @csrf

                                    <input type="hidden" name="course_id" value="{{ $course_info->course_id }}">
                                    <div class="row" style="margin-bottom:15px; ">
                                        <label class="col-md-4">Full Name (EN) : </label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="en_full_name"
                                                value="{{ $course_info->en_full_name }}" disabled>
                                        </div>
                                    </div>


                                    <div class="row" style="margin-bottom:15px; ">
                                        <label class="col-md-4">whatsapp number : </label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="phone"
                                                value="{{ $course_info->phone }}" disabled>
                                        </div>
                                    </div>

                                    <div class="row" style="margin-bottom:15px; ">
                                        <label class="col-md-4">Your E-Mail : </label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="national_id"
                                                value="{{ $course_info->email }}" disabled>
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="contact_form_title text-center" style="margin-bottom:10px; ">
                                        Payment By
                                    </div>

                                    <ul class="row" style="margin: auto;">
                                        <li><input type="radio"  name="payment" value="stripe"> <img
                                            src="{{ asset('media/user/mastercard.png') }}" 
                                            style="width: 100px;height: 70px;float: right;"></li>

                                            <li><input type="radio" name="payment" value="fawry"> <img
                                                src="{{ asset('media/user/fawry.jpeg') }}"
                                                style="width: 80px;height: 46px;float: right;"></li>
                                    </ul>

                                 





                                    <button class="btn btn-info btn-block" type="submit"><i class="fab fa-paypal"></i>
                                        Pay
                                        Now</button>
                                    <a class="btn btn-primary btn-block" href="{{ route('course.payment') }}"><i
                                            class="far fa-window-close"></i> Cancel</a><br>



                                </form>

                            </div>


                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>





</x-app-layout>