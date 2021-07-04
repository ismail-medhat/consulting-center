<x-guest-layout>
    @php
    $courses = DB::table('courses')
    ->where('status', 1)
    ->get();
    @endphp
    <div
        class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

        <div class="container text-center">

            <div class="row">

                @foreach ($courses as $row)
                <div class="col-md-4" style="margin-bottom: 15px;box-shadow: 4px 4px 20px rgb(248, 248, 248);">
                    <div class=" pb-3">
                        <img class="img-fluid rounded" src="{{ asset($row->photo) }}" style="height: 250px;width:100%;">
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
                            href="{{ route('course.details', $row->id) }}">
                            <i class="fa fa-eye"></i> Preview
                        </a>

                    </div>
                </div>
                @endforeach

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


</x-guest-layout>