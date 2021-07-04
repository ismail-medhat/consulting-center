<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Course Registered
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



                    <a class="btn btn-outline-info" href="{{ route('register.services') }}"><i
                            class="fas fa-registered"></i> Register Services</a>

                    <table class="table table-hover" style="box-shadow: 4px 4px 10px #eeebeb;margin-top: 50px;">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Course Name</th>
                                <th scope="col">Course Fees</th>
                                <th scope="col">Group Name</th>
                                <th scope="col">Start Date</th>
                                <th scope="col">Show Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i = 0;
                            @endphp
                            @if ($courses->count())

                            @foreach ($courses as $row)
                            <tr>
                                <th scope="row">{{ $i + 1 }}</th>
                                <td>{{ $row->course_name }}</td>
                                <td>{{ $row->course_price }}</td>
                                @php
                                $group = DB::table('groups')
                                ->where('id', $row->group_id)
                                ->first();
                                @endphp
                                <td>
                                    @if ($group)
                                    <span class="badge badge-primary">{{ $group->group_name }}</span>

                                    @else
                                    <span class="badge badge-info">Pendding...</span>

                                    @endif
                                </td>
                                <td>
                                    @if ($group)
                                    <span class="badge badge-secondary">{{ $group->start_date }}</span>

                                    @else
                                    <span class="badge badge-danger">Pendding...</span>

                                    @endif
                                </td>

                                <td>
                                    <a class="btn btn-outline-success btn-sm" title="show details"
                                        href="{{ route('service.course.info', $row->course_name) }}"><i
                                            class="fas fa-eye"></i></a>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <span class="text-danger text-center"> NO Course Registered Yet !</span>
                            @endif


                        </tbody>
                    </table>






                </div>
            </div>
        </div>
    </div>





</x-app-layout>