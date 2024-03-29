@extends('app.layouts.app', ['title' => 'شهرداری لاهیجان | فراخوان عمومی'])

@section('head-tag')
    <link rel="stylesheet" href="{{ asset('assets/app/plugins/datepicker/datepicker.min.css') }}">
@endsection

@section('content')
    <section class="container mt-5 min-h-screen">
        <section class="text-xl sm:text-2xl md:text-2xl font-bold mt-10 text-gray-700">
            فراخوان عمومی
        </section>
        <!-- news -->
        <section class="grid grid-cols-12 gap-6">
            @foreach ($publicCalls as $publicCall)
                <section
                    class="col-span-12 sm:col-span-6 lg:col-span-4 rounded-lg flex justify-between flex-col  p-3 sm:p-4 md:p-6 shadow transition-all hover:shadow-lg mt-4">

                    <a href="{{ $publicCall->publicPath() }}">
                        <img class="rounded-lg w-full h-44 object-cover" src="{{ asset($publicCall->image) }}"
                             alt="{{ $publicCall->title }}" />
                        <h5 class="text-gray-900 text-base md:text-base lg:text-lg font-medium my-4">
                            {{ Str::limit($publicCall->title, 100, '...') }}
                        </h5>
                    </a>
                    <section class="flex justify-between items-center">
                        <div class="flex flex-col sm:flex-row justify-center items-center sm:space-x-4">
                            </div>
                        </div>
                        <a href="{{ $publicCall->publicPath() }}" class="flex items-center">
                            <span
                                class="text-green-600 text-sm sm:text-base transition-all hover:text-green-700 hover:mx-2">بیشتر
                                بخوانید</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mt-1     text-blue-500">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
                            </svg>
                        </a>
                    </section>
                    </div>
                </section>
            @endforeach
        </section>
        <section class="overflow-x-hidden mt-10 flex justify-center">
            {{ $publicCalls->appends($_GET)->render('vendor.pagination.tailwind') }}
        </section>
    </section>
@endsection

@section('script')
    <script src="{{ asset('assets/app/plugins/datepicker/datepicker.min.js') }}"></script>
    <script>
        jalaliDatepicker.startWatch({
            maxDate: 'today',
            selector: ".datepicker",
            time: false
        });
    </script>

@endsection
