@extends('layouts.user_layout')

@section('content')
    {{-- events calender section --}}
    <section class="w-11/12 lg:w-9/12 mx-auto mt-16 mb-8 lg:mb-16">
        <div data-aos="zoom-in-up" data-aos-duration="500">
            <p class="text-3xl font-semibold text-dwit-blue">NEWS</p>
            <hr class="mt-2">
        </div>
        <div class="mt-8 flex flex-col gap-8 lg:gap-16">
            @foreach ($all_news as $news)
                <a href="/article/{{ $news->slug }}">
                    <div data-aos="fade-up" data-aos-duration="800"
                        class="flex flex-col-reverse sm:flex-row justify-between items-center sm:items-start border rounded-uihalf drop-shadow-sm">
                        <div class="p-4 flex flex-col gap-4">
                            <p class="font-medium text-lg leading-6">{{ $news->headline }}</p>
                            <p class="font-normal text-base">{{ $news->release_date->format('d M, Y') }}</p>
                            <p class="font-light text-sm">{{ $news->tagline }}</p>
                            <div class="flex gap-1">
                                <p class="font-normal text-sm">By:</p>
                                <p class="font-normal text-sm text-dwit-blue">{{ $news->reported_by }}</p>
                            </div>
                        </div>
                        <div class="w-68 aspect-square object-contain bg-cover rounded-uihalf"
                            style="background-image: url({{ asset('/storage/' . $news->image) }})">
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </section>
@endsection
