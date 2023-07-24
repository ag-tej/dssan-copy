@extends('layouts.user_layout')

@section('content')
    {{-- events calender section --}}
    <section class="w-11/12 mx-auto mt-16 mb-8 lg:mb-16">
        <div data-aos="fade-up" data-aos-duration="800" class="flex flex-col md:flex-row gap-8 lg:gap-16">
            <div class="md:w-3/5 flex flex-col gap-4 justify-between">
                <p class="font-medium text-lg leading-6">{{ $article->headline }}</p>
                <p>{{ $article->tagline }}</p>
                <div class="w-full sm:w-136 aspect-square object-contain bg-cover mx-auto rounded-uihalf"
                    style="background-image: url({{ asset('/storage/' . $article->image) }})">
                </div>
                <div class="flex justify-between items-center text-sm">
                    <p class="font-normal">{{ $article->release_date->format('d M, Y') }}</p>
                    <div class="flex gap-1">
                        <p class="font-normal">By:</p>
                        <p class="font-normal text-dwit-blue">{{ $article->reported_by }}</p>
                    </div>
                </div>
                <div>{!! $article->article !!}</div>
            </div>
            <div data-aos="fade-up" data-aos-duration="800" class="h-fit md:w-2/5 p-4 border">
                <p class="text-3xl font-semibold text-dwit-blue text-center pb-4 border-b">LATEST NEWS</p>
                <div class="my-8 flex flex-col gap-8 lg:gap-16">
                    @foreach ($latest_news as $news)
                        <a href="/article/{{ $news->slug }}">
                            <div class="flex flex-col gap-2">
                                <p class="font-medium text-lg leading-6">{{ $news->headline }}</p>
                                <div class="flex gap-1">
                                    <p class="font-normal text-sm text-black">By:</p>
                                    <p class="font-normal text-sm text-dwit-blue">{{ $news->reported_by }}</p>
                                </div>
                                <p class="font-normal text-sm text-black">{{ $news->release_date->format('d M, Y') }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
