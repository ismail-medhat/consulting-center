<x-guest-layout>
    @php
    $posts = DB::table('posts')
    ->where('status', 1)
    ->get();
    @endphp
    <div
        class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 py-4 sm:pt-0" >

        <div class="container text-center" style="margin-top: 40px;">
       
            <div class="row">

                <!-- Display active posts -->

                @foreach ($posts as $row)
                <div class="col-md-4" style="margin-bottom: 15px;box-shadow: 4px 4px 20px rgb(248, 248, 248);">
                    <div class=" pb-3">
                        <img class="img-fluid rounded" src="{{ asset($row->photo) }}" style="height: 250px;width:100%;">
                        <h3 class="my-2">{{ $row->name }}</h3>
                        <p class="py-1">
                            {!! Str::limit($row->description, 100) !!}

                        </p>

                        <a class="courseRegister btn btn-info text-white" href="{{ route('show.post.user',$row->id) }}"
                            style="margin-bottom: 10px;">
                            <i class="fas fa-registered"></i> Read More
                        </a>
                        &nbsp;&nbsp;&nbsp;&nbsp;


                    </div>
                </div>
                @endforeach

            </div>
        </div>


    </div>

</x-guest-layout>