@extends('layouts.user_layout')

@section('content')
    {{-- latest news section --}}
    <section class="w-11/12 mx-auto mt-16">
        <div data-aos="zoom-in-up" data-aos-duration="500">
            <p class="text-3xl font-semibold text-dwit-blue">LATEST NEWS</p>
            <hr class="mt-2">
        </div>
        <div class="mt-8 grid sm:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-16">
            @foreach ($news as $single_news)
                <a href="/article/{{ $single_news->slug }}">
                    <div data-aos="fade-up" data-aos-duration="800" class="border rounded-uihalf drop-shadow-sm">
                        <div class="mx-auto aspect-square object-contain bg-cover rounded-uihalf"
                            style="background-image: url({{ asset('/storage/' . $single_news->image) }})">
                        </div>
                        <div class="p-4 flex flex-col gap-2 justify-between">
                            <p class="font-medium text-lg leading-6">{{ $single_news->headline }}</p>
                            <p class="font-normal text-base">{{ $single_news->release_date->format('d M, Y') }}</p>
                            <p class="font-light text-sm">{{ $single_news->tagline }}</p>
                            <div class="flex gap-1">
                                <p class="font-normal text-sm">By:</p>
                                <p class="font-normal text-sm text-dwit-blue">{{ $single_news->reported_by }}</p>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
        <a href="/all_news">
            <p data-aos="fade-up" data-aos-duration="800"
                class="text-sm py-2 px-5 w-fit border border-dwit-blue mt-8 active:text-white active:bg-dwit-blue hover:text-white hover:bg-dwit-blue cursor-pointer">
                View All News</p>
        </a>
    </section>

    {{-- upcoming events section --}}
    <section class="w-11/12 mx-auto my-8 lg:my-16">
        <div data-aos="zoom-in-up" data-aos-duration="500">
            <p class="text-3xl font-semibold text-dwit-blue">UPCOMING EVENTS</p>
            <hr class="mt-2">
        </div>
        <div class="mt-8 grid sm:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-16">
            @foreach ($events as $event)
                <div data-aos="fade-up" data-aos-duration="800" class="flex gap-4 p-4 border rounded-uihalf drop-shadow-sm">
                    <div class="flex flex-col gap-1 text-right pr-4 border-r-2">
                        <p class="font-medium">{{ $event->event_date_time->format('D') }}</p>
                        <p class="font-semibold">{{ $event->event_date_time->format('d M') }}</p>
                        <p class="font-medium">{{ $event->event_date_time->format('Y') }}</p>
                    </div>
                    <div class="flex flex-col justify-between">
                        <p class="font-semibold text-xl">{{ $event->event_title }}</p>
                        <div class="flex gap-1 items-center">
                            <img src="{{ asset('images/icon/time.png') }}" class="h-5 object-contain aspect-square">
                            <p class="font-medium">{{ $event->event_date_time->format('h:i A') }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <a href="/all_events">
            <p data-aos="fade-up" data-aos-duration="800"
                class="text-sm py-2 px-5 w-fit border border-dwit-blue mt-8 active:text-white active:bg-dwit-blue hover:text-white hover:bg-dwit-blue cursor-pointer">
                View All Events</p>
        </a>
    </section>
@endsection
