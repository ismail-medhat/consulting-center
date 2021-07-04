@extends('admin.admin_layouts')

@section('admin_content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Admin</a>
            <span class="breadcrumb-item active">All Users</span>
        </nav>

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Users Table</h5>
            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Users List</h6>

                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-10p">ID</th>
                            <th class="wd-25p">User Name</th>
                            <th class="wd-10p">E-mail</th>
                            <th class="wd-15p">Profile Photo</th>
                            <th class="wd-10p">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($users->count())
                            @foreach($users as $key=>$row)
                                <tr>
                                    <td>{{ $key +1 }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->email }} </td>
                                    <td>
                                        <img src="{{ URL::to('storage/'.$row->profile_photo_path) }}" style="width: 60px;height: 60px;">
                                    </td>
                                    <td>
                                        <a href="{{ route('show.user',$row->id) }}" class="btn btn-sm btn-success bol" title="show"><i
                                                class="fa fa-eye"> </i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <span class="border text-danger"> No Users added yet !</span>
                        @endif


                        </tbody>
                    </table>
                </div><!-- table-wrapper -->
            </div><!-- card -->

        </div><!-- sl-mainpanel -->
        <!-- ########## END: MAIN PANEL ########## -->

@endsection


