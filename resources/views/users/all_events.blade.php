@extends('layouts.user_layout')

@section('content')
    {{-- events calender section --}}
    <section class="w-11/12 lg:w-9/12 mx-auto mt-16 mb-8 lg:mb-16">
        <div data-aos="zoom-in-up" data-aos-duration="500">
            <p class="text-3xl font-semibold text-dwit-blue">EVENTS</p>
            <hr class="mt-2">
        </div>
        <div class="mt-8 flex flex-col gap-8 lg:gap-16">
            @foreach ($all_events as $event)
                <div data-aos="fade-up" data-aos-duration="800"
                    class="flex flex-col-reverse sm:flex-row justify-between items-center sm:items-start border rounded-uihalf drop-shadow-sm">
                    <div class="flex gap-4 p-4">
                        <div class="w-24 flex flex-col gap-2 text-right pr-4 border-r-2">
                            <p class="font-medium">{{ $event->event_date_time->format('D') }}</p>
                            <p class="font-semibold">{{ $event->event_date_time->format('d M') }}</p>
                            <p class="font-medium">{{ $event->event_date_time->format('Y') }}</p>
                        </div>
                        <div class="flex flex-col gap-2">
                            <p class="font-semibold sm:text-xl">{{ $event->event_title }}</p>
                            <div class="flex gap-1 items-center">
                                <img src="{{ asset('images/icon/time.png') }}" class="h-5 object-contain aspect-square">
                                <p class="font-medium">{{ $event->event_date_time->format('h:i A') }}</p>
                            </div>
                            <p class="font-light text-xs sm:text-sm text-justify w-4/5">{{ $event->description }}</p>
                        </div>
                    </div>
                    <div class="w-68 aspect-square object-contain bg-cover rounded-uihalf"
                        style="background-image: url({{ asset('/storage/' . $event->image) }})">
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
