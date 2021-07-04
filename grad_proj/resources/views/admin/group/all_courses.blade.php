@extends('admin.admin_layouts')

@section('admin_content')

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

        .box a {
            font-size: 30px;
            color: rgb(107, 106, 106)
        }

        .box:hover {
            background-color: yellow;
            cursor: pointer;
        }

        .box i {
            color: #289;
        }

    </style>

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Admin</a>
            <a class="breadcrumb-item" href="{{ route('all.group') }}">Groups</a>
            <span class="breadcrumb-item active">Allocate</span>
        </nav>

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Group Allocate</h5>
            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">All Courses Available </h6><br>
                <hr>

                <div class="container">

                    <div class="row">

                        @if ($courses->count())

                            @foreach ($courses as $row)

                                @php
                                    $courseCount = DB::table('courses_payments')
                                        ->where('course_name', $row->en_name)
                                        ->get();
                                @endphp

                                <div class="col-md-5 box text-center">
                                    <i class="fal fa-books"></i>
                                    <a
                                        href="{{ route('course.applicant', $row->en_name) }}"><span>{{ $row->en_name }}</span>

                                        <span style="float: right;margin:auto;" class="badge badge-danger">{{ count($courseCount) }}</span>

                                    </a>
                                </div>
                            @endforeach
                        @else
                            <span class="text-danger"> No Courses Avaliable Yet .</span>

                        @endif




                    </div>



                </div><!-- container -->
            </div><!-- card -->





        @endsection
