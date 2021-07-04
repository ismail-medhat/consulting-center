@extends('admin.admin_layouts')

@section('admin_content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Admin</a>
            <span class="breadcrumb-item active">Courses</span>
        </nav>

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Courses Table</h5>
            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">courses List
                    <a href="{{ route('add.course') }}" class="btn btn-sm btn-warning float-right">
                        <i class="fa fa-plus-circle"> Add New course</i></a>
                </h6>

                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">English Name</th>
                            <th class="wd-15p">Arabic Name</th>
                            <th class="wd-15p">Course Photo</th>
                            <th class="wd-10p">Price</th>
                            <th class="wd-10p">Days Number</th>
                            <th class="wd-10p">Hours Number</th>
                            <th class="wd-10p">Status</th>
                            <th class="wd-15p">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($course->count())
                            @foreach($course as $row)
                                <tr>
                                    <td>{{ $row->en_name }}</td>
                                    <td>{{ $row->ar_name }}</td>
                                    <td><img src="{{ URL::to($row->photo) }}" height="50px;" width="50px;"></td>
                                    <td>{{ $row->price}}</td>
                                    <td>{{ $row->day_number }}</td>
                                    <td>{{ $row->hour_number }}</td>
                                    <td>

                                        @if($row->status == 1)
                                            <span class="badge badge-pill badge-success">Active</span>
                                        @else
                                            <span class="badge badge-pill badge-warning">Inactive</span>
                                        @endif

                                    </td>
                                    <td>

                                        <a href="{{route('edit.course',$row -> id)}}"
                                           class="btn btn-sm btn-primary" title="edit">
                                            <i class="fa fa-edit"></i></a>

                                        <a href="{{route('show.course',$row -> id)}}"
                                           class="btn btn-sm btn-success" title="show">
                                            <i class="fa fa-eye"></i></a>

                                        <a href="{{route('delete.course',$row -> id)}}"
                                           class="btn btn-sm btn-danger" id="delete" title="delete">
                                            <i class="fa fa-trash"></i>
                                        </a>

                                        @if($row->status == 0)
                                            <a href="{{route('active.course',$row -> id)}}"
                                               class="btn btn-sm btn-info" title="active">
                                                <i class="fa fa-thumbs-up"></i></a>
                                        @else
                                            <a href="{{route('inactive.course',$row -> id)}}"
                                               class="btn btn-sm btn-danger" title="inactive">
                                                <i class="fa fa-thumbs-down"></i></a>
                                        @endif


                                    </td>

                                </tr>
                            @endforeach
                        @else
                            <span class="border text-danger"> No Course added yet !</span>
                        @endif

                        </tbody>
                    </table>
                </div><!-- table-wrapper -->
            </div><!-- card -->

        </div><!-- sl-mainpanel -->
        <!-- ########## END: MAIN PANEL ########## -->

@endsection


