@extends('admin.admin_layouts')

@section('admin_content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Admin</a>
            <span class="breadcrumb-item active">Groups</span>
        </nav>

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Group Table</h5>
            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Group List
                    <a href="" class="btn btn-sm btn-warning float-right" data-toggle="modal" data-target="#modaldemo3"><i
                            class="fa fa-plus-circle"> Add New group</i></a>
                </h6>

                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">ID</th>
                            <th class="wd-15p">Group Name</th>
                            <th class="wd-15p">Start Date</th>
                            <th class="wd-15p">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($groups->count())
                            @foreach($groups as $key=>$row)
                                <tr>
                                    <td>{{ $key +1 }}</td>
                                    <td>{{ $row->group_name }}</td>
                                    <td>{{ \Carbon\Carbon::parse($row->start_date)->format('m/d/Y') }} </td>
                                    <td>
                                        <a href="{{ route('edit.group',$row->id) }}" class="btn btn-sm btn-info bol"><i
                                                class="fa fa-edit"> Edit</i></a>
                                        <a href="{{ route('delete.group',$row->id) }}" class="btn btn-sm btn-danger"
                                           id="delete"><i class="fa fa-trash"> Delete</i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <span class="border text-danger"> No Groups added yet !</span>
                        @endif


                        </tbody>
                    </table>
                </div><!-- table-wrapper -->
            </div><!-- card -->

        </div><!-- sl-mainpanel -->
        <!-- ########## END: MAIN PANEL ########## -->


        <!-- LARGE MODAL -->
        <div id="modaldemo3" class="modal fade">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content tx-size-sm">
                    <div class="modal-header pd-x-20">
                        <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Group Add</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="{{ route('store.group') }}" method="POST">
                        @csrf
                        <div class="modal-body pd-20">

                            <div class="form-group">
                                <label for="exampleInputEmail1">Group Name</label>
                                <input type="text" name="group_name"
                                       class="form-control @error('group_name') is-invalid @enderror"
                                       id="exampleInputEmail1"
                                       aria-describedby="emailHelp" placeholder="Enter group Name">
                                @error('group_name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Start Date</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i
                                            class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                                    <input type="text" name="start_date" class="form-control date-picker"
                                           placeholder="MM/DD/YYYY" required>

                                    @error('start_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="modal-footer">
                                <button type="submit" class="btn btn-info pd-x-10"><i class="fa fa-plus-square"> ADD</i>
                                </button>
                                <button type="button" class="btn btn-secondary pd-x-10" data-dismiss="modal"><i
                                        class="fa fa-times-circle"> Cancel</i>
                                </button>
                            </div>

                        </div><!-- modal-body -->
                    </form>
                </div>

            </div><!-- modal-dialog -->
        </div><!-- modal -->



@endsection


