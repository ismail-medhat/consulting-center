<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Register Services
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
            margin: 5px;
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

                <div class="container text-center p-5">



                    <div class="container" style="margin-top:10px; ">
                        <div class="row box">
                            @php
                            $courseCount = DB::table('users_courses')
                            ->where('user_id', Auth::id())
                            ->where('payment_status', 1)
                            ->get();
                            @endphp
                            <div class="col-md-3 inbox">
                                <i class="fad fa-books"></i>
                                <a href="{{ route('course.services') }}">
                                    <span>Courses</span><br>
                                    <span class="badge badge-danger">{{ count($courseCount) }}</span>
                                </a>
                            </div>
                            @php
                            $statmentCount = DB::table('users_courses')
                            ->where('user_id', Auth::id())
                            ->where('statment_status', 1)
                            ->get();
                            @endphp
                            <div class="col-md-3 inbox">
                                <i class="far fa-diploma"></i>
                                <a href="{{ route('course.statement') }}">
                                    <span>Statement</span><br>
                                    <span class="badge badge-danger">{{ count($statmentCount) }}</span>
                                </a>
                            </div>
                            @php
                            $certificateCount = DB::table('users_courses')
                            ->where('user_id', Auth::id())
                            ->where('certificate_status', 1)
                            ->get();
                            @endphp
                            <div class="col-md-3 inbox">
                                <i class="fad fa-file-certificate"></i>
                                <a href="{{ route('course.certificate') }}">
                                    <span>Certificate</span><br>
                                    <span class="badge badge-danger">{{ count($certificateCount) }}</span>

                                </a>
                            </div>
                        </div>
                    </div>





                </div>
            </div>
        </div>
    </div>



</x-app-layout>