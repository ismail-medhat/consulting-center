<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    @php
    $courses = DB::table('courses')
    ->where('status', 1)
    ->get();
    @endphp

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">


                <div class="container text-center">

                    <div class="row">

                        @foreach ($courses as $row)
                        <div class="col-md-4 " style="margin: 15px auto;box-shadow: 4px 4px 20px rgb(248, 248, 248);">
                            <div class=" pb-3">
                                <img class="img-fluid rounded" src="{{ asset($row->photo) }}"
                                    style="height: 250px;width:100%;">
                                <h3 class="my-2">{{ $row->en_name }}</h3>
                                <p class="py-1">
                                    {!! Str::limit($row->en_description, 80) !!}

                                </p>


                                <button class="courseRegister btn btn-danger text-white" data-id="{{ $row->id }}"
                                    style="margin-bottom: 10px;">
                                    <i class="fas fa-registered"></i> Register Now
                                </button>
                                &nbsp;&nbsp;&nbsp;&nbsp;

                                <a class="btn btn-info text-white" style="margin-bottom: 10px;"
                                    href="{{ route('student.course.details', $row->id) }}">
                                    <i class="fa fa-eye"></i> Preview
                                </a>


                            </div>
                        </div>
                        @endforeach



                    </div>
                </div>


            </div>


        </div>
    </div>
    </div>



    <script>
        $(document).ready(function () {
            $('.courseRegister').on('click', function () {
                var id = $(this).data('id');
                if (id) {
                    $.ajax({
                        url: "{{ url('register/course/') }}/" + id,
                        type: "Get",
                        datatype: "json",
                        success: function (data) {
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.addEventListener('mouseenter', Swal.stopTimer)
                                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                                }
                            })

                            if ($.isEmptyObject(data.error)) {
                                Toast.fire({
                                    icon: 'success',
                                    title: data.success
                                })
                            } else {
                                Toast.fire({
                                    icon: 'error',
                                    title: data.error
                                })
                            }

                        },
                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>

</x-app-layout>