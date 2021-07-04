@extends('admin.admin_layouts')

@section('admin_content')

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Admin</a>
            <a class="breadcrumb-item" href="{{ route('all.group') }}">Group</a>
            <a class="breadcrumb-item" href="{{ route('group.allocate') }}">Allocate</a>
            <span class="breadcrumb-item active">Applicant</span>
        </nav>

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Group Table</h5>
            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Group List
                    <a href="{{ route('group.allocate') }}"
                        style="color: #FFF;border-radius: 10px;box-shadow:4px 4px 4px rgb(199, 199, 192);"
                        class="btn btn btn-warning float-right m-1"><i class="far fa-arrow-left"> All Courses</i></a>
                    <a href="{{ route('group.applicant', $courseName) }}"
                        style="color: #FFF;border-radius: 10px;box-shadow:4px 4px 4px rgb(199, 199, 192);"
                        class="btn btn btn-info float-right m-1"><i class="fas fa-user-tie"> Group Applicant</i></a>

                </h6>

                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                            <tr>
                                <th class="wd-5p">ID</th>
                                <th class="wd-20p">Applicant Name</th>
                                <th class="wd-15p">Payment Date</th>
                                <th class="wd-10p">Payment Month</th>
                                <th class="wd-10p">Payment Year</th>
                                <th class="wd-10p">Group Status</th>
                                <th class="wd-20p">Group Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($applicant->count())
                                @foreach ($applicant as $key => $row)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $row->student_name }}</td>
                                        <td>{{ $row->pay_date }} </td>
                                        <td>{{ $row->month }} </td>
                                        <td>{{ $row->year }} </td>
                                        <td>
                                            @if($row->group_id == NULL)
                                            <span class="badge badge-danger">Unallocated</span>
                                            @else
                                            <span class="badge badge-success">Allocated</span>
                                            @endif
                                        </td>
                                        <td>



                                            <form action="{{ route('store.group.applicant') }}" method="POST">
                                                @csrf

                                                <input type="hidden" name="Id" value="{{ $row->id }}">
                                                <input type="hidden" name="userId" value="{{ $row->user_id }}">
                                                <input type="hidden" name="courseId" value="{{ $row->course_id }}">

                                                @php
                                                    $groups = DB::table('groups')->get();
                                                @endphp

                                                <select name="groupId" >
                                                    <option value="">--select--</option>
                                                    @foreach ($groups as $group)
                                                        <option value="{{ $group->id }}" <?php if($group->id == $row->group_id ) echo 'selected'; ?>  >{{ $group->group_name }}
                                                        </option>
                                                        <button type="submit" class="btn btn-sm btn-success"><i class="fas fa-check-square"></i></button>
                                                    @endforeach
                                                </select>
                                                <button type="submit" class="btn btn-sm btn-success"><i class="fas fa-check-square"></i></button>

                                            </form>

                                        </td>

                                    </tr>
                                @endforeach
                            @else
                                <span class="border text-danger"> No Applicant For This Course yet !</span>
                            @endif


                        </tbody>
                    </table>
                </div><!-- table-wrapper -->
            </div><!-- card -->

        </div><!-- sl-mainpanel -->
        <!-- ########## END: MAIN PANEL ########## -->




    @endsection
