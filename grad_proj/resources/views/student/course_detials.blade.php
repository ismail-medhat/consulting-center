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



    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

        <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
            <div class="grid grid-cols-1 md:grid-cols-2">
                <div class="p-6">


                    <div class="ml-12">
                        <img src="{{ asset($course->photo) }}" class="img-img-thumbnail"
                            style="height: 280px;width:100%;border-radius:10px;padding:3px;border:2px solid #EEE;">
                    </div>

                    <div class="ml-12" style="margin:50px;text-align: center; ">
                        <span style="font-size: 30px;">{{ $course->en_name }}</span><br><br>
                        <span style="font-size: 22px;">Post Date : <span
                                class="badge badge-secondary">{{ Carbon\Carbon::parse($course->created_at)->diffForHumans() }}</span></span>
                    </div>

                    <hr>

                    <div class="row text-center">
                        <span class="col-md-4" style="font-size: 22px;"><i class="far fa-usd-circle mr-1 my-2"
                                style="color: red;"></i>{{ $course->price }} EGP</span>
                        <span class="col-md-4" style="font-size: 22px;"><i class="far fa-clock  mr-1"
                                style="color: rgb(51, 255, 0);"></i>{{ $course->hour_number }} Hours</span>
                        <span class="col-md-4" style="font-size: 22px;"><i class="fal fa-calendar-day  mr-1"
                                style="color: rgb(0, 183, 255);"></i>{{ $course->day_number }} Days</span>
                    </div>

                    <hr>

                    <a href="{{ route('dashboard') }}" class="btn btn-success" style="margin:0px 180px; ">
                        <i class="fas fa-long-arrow-left"></i> All Courses
                    </a>

                </div>

                <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l"
                    style="margin-top: 30px;">



                    <div class="ml-12">
                        <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm"
                            style="font-size: 30px;text-align: center;line-height: 40px;">
                            {!! $course->ar_description !!}
                        </div>
                    </div>


                </div>

            </div>
        </div>

    </div>





</x-app-layout>