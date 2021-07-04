<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Course Statements
        </h2>
    </x-slot>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="container text-center p-5">

                    <div class="table-responsive">

                        <table class="table table-hover" style="box-shadow: 4px 4px 10px #cecaca;">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Course Name</th>
                                    <th scope="col">Statement Fees</th>
                                    <th scope="col">Month</th>
                                    <th scope="col">Year</th>
                                    <th scope="col">Group</th>
                                    <th scope="col">Show Certificate</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $payCourses = DB::table('courses_payments')->where('user_id',Auth::id())->get();
                                $i = 0;
                                @endphp
                                @if ($payCourses->count())

                                @foreach ($payCourses as $row)
                                <tr>
                                    <th scope="row">{{ $i + 1 }}</th>
                                    <td>{{ $row->course_name }}</td>
                                    <td>20 EGY</td>
                                    <td>{{ $row->month }}</td>
                                    <td>{{ $row->year }}</td>
                                    <td>
                                        @if ($row->group_id == NULL)
                                        <span class="badge badge-warning">Nnallocated</span>
                                        @else
                                        <span class="badge badge-success">Allocated</span>

                                        @endif
                                    </td>
                
                                    <td>
                                        <a class="btn btn-outline-info btn-sm" title="request" 
                                            href="{{ route('show.certificate', $row->course_id) }}"><i class="fab fa-readme"></i> Request a statement</a>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <span class="text-danger text-center"> NO Course Payment Yet !</span>
                                @endif


                            </tbody>
                        </table>

                    </div>




                </div>
            </div>
        </div>
    </div>




</x-app-layout>