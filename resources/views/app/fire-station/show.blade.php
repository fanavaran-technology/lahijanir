@extends('app.fire-station.layouts.app', ['title' => "$news->title"])
@section('content')
    <section class="mt-5 min-h-screen">
        <section class="grid grid-cols-12">
            <section class="col-span-12 mt-12 md:col-span-9 md:ml-2">
                <section class="my-4 bg-gray-50  bg-opacity-50 p-4 md:p-8 text-gray-700 shadow-sm rounded">
                    <section
                        class="flex flex-wrap lg:flex-nowrap space-y-4 md:space-y-4 justify-between gap-2 items-center">
                        <section class="space-y-4 w-screen lg:w-4/6">
                            <!-- title -->
                            <section class="text-lg md:text-2xl text-gray-700 font-bold">{{ $news->title }}</section>
                            <!-- utility -->
                            <section class="flex items-center space-x-3 space-x-reverse text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mx-2" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <span class="text-sm">{{ jalaliDate($news->created_at, '%d %B، %Y') }}</span>
                            </section>
                            <section class="my-4 flex">
                                @foreach ($news->tags as $tag)
                                    <a href="{{ $tag->publicPath() }}"
                                        class="p-1 ml-2 text-sm text-gray-600 bg-white hover:bg-white border border-gray-300 rounded">#{{ $tag->title }}</a>
                                @endforeach
                            </section>
                        </section>
                        @if ($news->video)
                            <video id="news-video" class="video-js vjs-theme-forest rounded-lg"  data-setup="{}" controls preload="auto" width="540"
                                height="220"  >
                                <source src="{{ asset($news->video->video) }}" type="video/mp4" />
                            </video>
                        @else
                            <img src="{{ asset($news->image) }}" class="w-full lg:w-2/6 h-5/6 object-cover rounded-lg"
                                alt="{{ $news->title }}">
                        @endif
                    </section>
                    <article class="py-6 text-gray-600 text-sm lg:text-base leading-8 lg:leading-10">
                        {!! $news->body !!}
                    </article>
                </section>
            </section>
            <aside class="col-span-12 md:mb-0 mb-10 sidebar md:col-span-3 mx-4 md:mx-2 mt-14 space-y-4">
                <section class="overflow-y-auto px-0 bg-gray-100 shadow-sm bg-opacity-50 rounded">
                    <section class="flex text-gray-700 items-center px-2 py-4 border-b">
                        <span class="font-semibold text-sm">جدیدترین اخبار</span>
                    </section>
                    <ul class="mt-2  divide-y">
                        @foreach ($latestNewsFireStation as $lastNews)
                            <li>
                                <a href="{{ $lastNews->firePublicPath() }}"
                                    class="relative  flex items-center p-2 text-base transition-all delay-150 ease-in-out hover:bg-gray-50 border-r-2 hover:border-red-500 space-x-2 space-x-reverse">
                                    <div class="grid grid-cols-12">
                                        <div class="w-10 h-10  col-span-2">
                                            <img src="{{  asset($lastNews->image)  }}" class="object-cover w-10 h-10 rounded-lg" alt="">
                                        </div>
                                        <div class="space-y-2 col-span-10 flex items-center">
                                             <h5 class="flex-1 lg:mr-1 md:mr-5 font-bold pl-3 md:text-xs lg:text-sm text-gray-600">
                                                 {{ Str::limit($lastNews->title, 60,'...')  }}
                                             </h5>
                                            @if ($lastNews->video)
                                                <div
                                                    class="text-xs px-1 bg-indigo-400 text-gray-100 py-0.5 rounded absolute bottom-2 left-2 space-x-1 space-x-reverse flex">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                         stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                        <path stroke-linecap="round"
                                                              d="M15.75 10.5l4.72-4.72a.75.75 0 011.28.53v11.38a.75.75 0 01-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25h-9A2.25 2.25 0 002.25 7.5v9a2.25 2.25 0 002.25 2.25z" />
                                                    </svg>
                                                    <span>+ ویدئو</span>
                                                </div>
                                            @endif
                                            @if ($lastNews->gallerizable->isNotEmpty())
                                                <div
                                                    class="text-xs px-1 bg-green-400 text-gray-800 py-0.5 rounded absolute bottom-2 left-2 space-x-1 space-x-reverse flex">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                         stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
                                                    </svg>
                                                    <span>+ گالری تصاویر</span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </section>
            </aside>
        </section>
    </section>
    <main>
        <div id="container" class="container">
        </div>
    </main>
@endsection



