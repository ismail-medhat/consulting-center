@extends('admin.admin_layouts')

@section('admin_content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Admin</a>
            <span class="breadcrumb-item active">Posts</span>
        </nav>

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Posts Table</h5>
            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Posts List
                    <a href="{{ route('add.post') }}" class="btn btn-sm btn-warning float-right">
                        <i class="fa fa-plus-circle"> Add New post</i></a>
                </h6>

                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">ID</th>
                            <th class="wd-20p">Post Name</th>
                            <th class="wd-20p">Post Photo</th>
                            <th class="wd-15p">Created At</th>
                            <th class="wd-10p">Status</th>
                            <th class="wd-20p">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($post->count())
                            @foreach($post as $kay=>$row)
                                <tr>
                                    <td>{{ $kay +1 }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td><img src="{{ URL::to($row->photo) }}" height="50px;" width="50px;"></td>
                                    <td>
                                        @if($row->created_at == NULL)
                                            <span class="text-danger">No Date Set</span>
                                        @else
                                            <span
                                                class="badge badge-info badge-info p-2">{{Carbon\Carbon::parse($row->created_at)->diffForHumans()}}</span>
                                        @endif
                                    </td>
                                    <td>

                                        @if($row->status == 1)
                                            <span class="badge badge-pill badge-success">Active</span>
                                        @else
                                            <span class="badge badge-pill badge-warning">Inactive</span>
                                        @endif

                                    </td>
                                    <td>

                                        <a href="{{route('edit.post',$row -> id)}}"
                                           class="btn btn-sm btn-primary" title="edit">
                                            <i class="fa fa-edit"></i></a>

                                        <a href="{{route('show.post',$row -> id)}}"
                                           class="btn btn-sm btn-success" title="show">
                                            <i class="fa fa-eye"></i></a>

                                        <a href="{{route('delete.post',$row -> id)}}"
                                           class="btn btn-sm btn-danger" id="delete" title="delete">
                                            <i class="fa fa-trash"></i>
                                        </a>

                                        @if($row->status == 0)
                                            <a href="{{route('active.post',$row -> id)}}"
                                               class="btn btn-sm btn-info" title="active">
                                                <i class="fa fa-thumbs-up"></i></a>
                                        @else
                                            <a href="{{route('inactive.post',$row -> id)}}"
                                               class="btn btn-sm btn-danger" title="inactive">
                                                <i class="fa fa-thumbs-down"></i></a>
                                        @endif


                                    </td>

                                </tr>
                            @endforeach
                        @else
                            <span class="border text-danger"> No Post added yet !</span>
                        @endif

                        </tbody>
                    </table>
                </div><!-- table-wrapper -->
            </div><!-- card -->

        </div><!-- sl-mainpanel -->
        <!-- ########## END: MAIN PANEL ########## -->

@endsection



