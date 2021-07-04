<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Course Services
        </h2>
    </x-slot>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />



    <style>
        .box {
            border: 2px solid #DDD;
            padding: 20px;
            border-radius: 20px;
            box-shadow: 1px 4px 8px #999;
            margin: 15px;
            font-size: 30px;
        }

        .inbox {
            border: 2px solid #DDD;
            padding: 20px;
            border-radius: 20px;
            box-shadow: 1px 4px 8px #999;
            margin: 40px;
            font-size: 30px;
        }

        .inbox a {
            font-size: 30px;
            text-decoration: none;
            color: rgb(107, 106, 106)
        }

        .inbox:hover {
            background-color: yellow;
            cursor: pointer;
        }

        .inbox i {
            color: #289;
        }
    </style>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="container text-center p-3">



                    <a class="btn btn-outline-info" href="{{ route('course.services') }}"><i
                            class="fal fa-books"></i>
                        Register Services Courses</a>

                    <div class="container" style="box-shadow: 1px 4px 8px #dad5d5;margin:30px;padding:40px;">

                        <h3>{{ $course->en_name }} Course Details</h3><br>


                        <div class="row box" style="border-right: 2px solid #DDD;">
                            <div class="col-md-3" style="border-right: 2px solid #DDD;">
                                <img src="{{ asset($course->photo) }}" alt="" class="img-thumbnail">
                            </div>
                            <div class="col-md-6" style="border-right: 2px solid #DDD;">
                                <span>Name (EN) : {{ $course->en_name }}</span><br>
                                <span>Name (AR) : {{ $course->ar_name }}</span><br>
                                <span>Price : <i class="fas fa-money-bill-wave"
                                        style="color: rgb(0, 255, 0);font-size:25px;"></i>
                                    {{ $course->price }}</span><br>
                                <span>Hours : <i class="far fa-clock"
                                        style="color: rgb(255, 157, 0);font-size:25px;"></i>
                                    {{ $course->hour_number }}</span><br>
                                <span>Days : <i class="fal fa-calendar-alt"
                                        style="color: rgb(0, 204, 255);font-size:25px;"></i>
                                    {{ $course->day_number }}</span><br>
                            </div>
                            <div class="col-md-3">

                                @php
                                $group = DB::table('groups')
                                ->where('id', $course_pay->group_id)
                                ->first();
                                @endphp

                                <span>Group Name</span><br>
                                @if ($group)
                                <span class="badge badge-primary">{{ $group->group_name }}</span><br>

                                @else
                                <span class="badge badge-info">Pendding...</span><br>

                                @endif

                                <span>Start Date</span><br>
                                @if ($group)
                                <span class="badge badge-primary">{{ $group->start_date }}</span><br>

                                @else
                                <span class="badge badge-info">Pendding...</span><br>

                                @endif
                            </div>

                        </div>




                    </div>





                </div>
            </div>
        </div>
    </div>





</x-app-layout>