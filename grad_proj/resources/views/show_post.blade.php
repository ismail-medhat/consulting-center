<x-guest-layout>
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900  py-4 sm:pt-0">

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="grid grid-cols-1 md:grid-cols-2">
                    <div class="p-6">


                        <div class="ml-12">
                            <img src="{{ asset($post->photo) }}" class="img-img-thumbnail"
                                style="height: 280px;width:100%;border-radius:10px;padding:3px;border:2px solid #EEE;">
                        </div>

                        <div class="ml-12" style="margin:50px;text-align: center; ">
                            <span style="font-size: 30px;">{{ $post->name }}</span><br><br>
                            <span  style="font-size: 22px;">Post Date : <span class="badge badge-secondary">{{ Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</span></span>
                        </div>

                        <a href="{{ route('view.posts') }}" class="btn btn-success" style="margin:0px 180px; ">
                            <i class="fas fa-long-arrow-left"></i> All Blogs
                        </a>

                    </div>

                    <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l" style="margin-top: 30px;">
                        
                        
                        
                        <div class="ml-12">
                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm" style="font-size: 30px;text-align: center;line-height: 40px;">
                                {!! $post->description !!}
                            </div>
                        </div>

                      
                    </div>

                </div>
            </div>

        </div>
    </div>
</x-guest-layout>