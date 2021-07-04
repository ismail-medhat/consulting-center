<x-guest-layout>
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900  py-4 sm:pt-0">

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="grid grid-cols-1 md:grid-cols-2">
                    <div class="p-6">


                        <div class="ml-12">
                            <img src="{{ asset('/media/aboute1.jpg') }}" class="img-img-thumbnail"
                                style="height: 280px;width:100%;border-radius:10px;padding:3px;border:2px solid #EEE;">
                        </div>
                    </div>

                    @php
                    $settings = DB::table('settings')->first();
                    @endphp

                    <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l"
                        style="margin-top: 30px;">
                        <div class="flex items-center" style="margin-bottom:15px;">
                            <i class="far fa-street-view" style="font-size: 35px;color:#a8a1a1"></i>
                            <div class="ml-4 text-lg leading-7 font-semibold"><a
                                    href="{{ $settings->address }}"
                                    class="underline text-gray-900 dark:text-white">ميدان الزراعة ‏‎Az Zagazig‎‏، ‏‎Al
                                    Sharqia Governorate‎‏، ‏‎Egypt‎‏</a></div>
                        </div>
                        <div class="flex items-center" style="margin-bottom:15px;">
                            <i class="fab fa-facebook-square" style="font-size: 35px;color:blue"></i>
                            <div class="ml-4 text-lg leading-7 font-semibold"><a
                                    href="{{ $settings->face_link }}"
                                    class="underline text-gray-900 dark:text-white"> Facebook Page </a></div>
                        </div>
                        <div class="flex items-center" style="margin-bottom:15px;">
                            <i class="fas fa-phone-square-alt" style="font-size: 35px;color:red"></i>
                            <div class="ml-4 text-lg leading-7 font-semibold"><a
                                    class="underline text-gray-900 dark:text-white"> Phone Number : {{ $settings->phone1 }} , {{ $settings->phone2 }} </a>
                            </div>
                        </div>
                        
                        <div class="flex items-center" style="margin-bottom:15px;">
                            <i class="fas fa-envelope" style="font-size: 35px;color:#ffa600"></i>
                            <div class="ml-4 text-lg leading-7 font-semibold"><a
                                    class="underline text-gray-900 dark:text-white"> {{ $settings->email }}
                                </a></div>
                        </div>
                        
                        <div class="flex items-center" style="margin-bottom:15px;">
                            <i class="far fa-clock" style="font-size: 35px;color:#00b7ff"></i>
                            <div class="ml-4 text-lg leading-7 font-semibold"><a
                                    class="underline text-gray-900 dark:text-white"> Available From 9:00 AM To 1:30 PM
                                </a></div>
                        </div>


                    </div>

                    <div class="p-6 border-t border-gray-200 dark:border-gray-700">

                        <div class="ml-12">
                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm"
                                style="font-size: 30px;text-align: center;line-height: 40px;">
                                وحدة ذات طابع خاص تتبع كلية الحاسبات والمعلومات جامعة الزقازيق - لتنظيم دورات تدريبية
                                تطبيقية للطلاب والخريجين للتدريب علي كل ما هو حديث فى مجال تكنولوجيا المعلومات
                            </div>
                        </div>
                    </div>

                    <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-l">
                        <div class="flex items-center">

                            <img src="{{ asset('/media/aboute3.jpg') }}" class="img-img-thumbnail"
                                style="height: 280px;width:100%;border-radius:10px;padding:3px;border:2px solid #EEE;">
                        </div>


                    </div>
                </div>
            </div>

        </div>
    </div>
</x-guest-layout>