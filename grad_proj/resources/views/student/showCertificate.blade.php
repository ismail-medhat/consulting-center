<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Course Certificates
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


                    <h2>Course Name : <span style="color: brown;font-weight: bold">{{ $payCourse->course_name }}</span></h2><br>

                    <div class="row">
                        <div class="col-md-4">
                            <strong>Satus Bar Of Certificate Process : </strong>
                        </div>
                        <div class="col-md-8">
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 15%" aria-valuenow="85"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div><br>
                            <span style="color: red;">You haven't finished the course yet</span>
                        </div>
                        <a class="btn btn-success" style="color: #FFF;font-weight: bold;margin-left: 50px;" href="{{ route('register.services') }}"><i class="fas fa-long-arrow-left"></i> Back To Services</a>
                    </div>

            




                </div>
            </div>
        </div>
    </div>




</x-app-layout>