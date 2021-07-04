<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Course Payment
        </h2>
    </x-slot>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <div class=" py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="container text-center p-5">

                    <div class="table-responsive">

                        <table class="table table-hover" style="box-shadow: 4px 4px 10px #bdbaba;">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Course Name</th>
                                    <th scope="col">Course Fees</th>
                                    <th scope="col">Rgistration Date</th>
                                    <th scope="col">Payment</th>
                                    <th scope="col">Pay Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i = 0;
                                @endphp
                                @if ($all_course_register->count())

                                @foreach ($all_course_register as $row)
                                <tr>
                                    <th scope="row">{{ $i + 1 }}</th>
                                    <td>{{ $row->en_name }}</td>
                                    <td>{{ $row->price }}</td>
                                    <td>{{ $row->date_registerd }}</td>
                                    <td>
                                        @if ($row->payment_status == 0)
                                        <span class="badge badge-warning">Not Commpleted</span>
                                        @else
                                        <span class="badge badge-success">Commpleted</span>

                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-outline-info btn-sm" title="pay"
                                            href="{{ route('course.pay', $row->id) }}"><i class="fab fa-paypal"></i>
                                            Pay Now</a>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <span class="text-danger text-center"> NO Course Payment Registered Yet !</span>
                                @endif


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>








</x-app-layout>