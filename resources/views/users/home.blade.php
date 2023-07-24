@extends('layouts.user_layout')

@section('content')
    {{-- hero section --}}
    <section>
        <div class="w-full h-full bg-cover"
            style="background-image: url('{{ asset('images/images/graduation.png') }}'); background-attachment: fixed; filter: brightness(90%);">
            <div class="pb-32">
                <div data-aos="zoom-in" data-aos-duration="2000"
                    class="h-screen flex flex-col gap-4 justify-center items-center text-3xl xs:text-4xl sm:text-5xl md:text-7xl text-dwit-blue font-semibold">
                    <p class="drop-shadow-xl">MEETING THE MOMENT,</p>
                    <P class="drop-shadow-xl">TOGETHER</P>
                </div>
                <div data-aos="zoom-in-up" data-aos-duration="1000"
                    class="w-11/12 xs:w-10/12 sm:w-2/3 mx-auto p-6 xs:p-8 lg:p-13 xl:p-16 bg-white rounded-ui flex flex-col gap-4 lg:gap-6 xl:gap-8">
                    <div data-aos="fade-up" data-aos-duration="800">
                        <p class="text-dwit-blue font-semibold sm:text-2xl text-center">A BOLD FUTURE FOR SIFAL SCHOOL</p>
                    </div>
                    <div data-aos="fade-up" data-aos-duration="800">
                        <P class="text-justify text-sm sm:text-base">
                            Founded in 2016, Deerwalk Sifal School is determined to help our students grow as a good global
                            citizen with solid academic skill in language, math, and science. We make sure we get the best
                            out
                            of every student and help each find their strength. We focus on the following areas at every
                            level.
                            Sifal School (also known as Deerwalk Sifal School - DSS) is a grade 1 to 12 Secondary Science
                            School
                            where our graduates after (+2 Science) go to the ranges of Universities in Abroad and Nepal.
                        </P>
                    </div>
                    <div data-aos="fade-up" data-aos-duration="800"
                        class="flex flex-col sm:flex-row justify-between items-center gap-8 lg:gap-16">
                        <div id="numberAnimation"
                            class="text-center py-8 aspect-3/2 sm:w-full sm:aspect-auto bg-dwit-blue brightness-140 rounded-uihalf text-white">
                            <p class="font-medium">GRADUATES</p>
                            <p class="text-3xl font-medium mt-2" id="numberOne" data-max-number="{{ $alumni_count }}">0</p>
                        </div>
                        <div id="numberAnimation"
                            class="text-center py-8 aspect-3/2 sm:w-full sm:aspect-auto bg-dwit-blue brightness-140 rounded-uihalf text-white">
                            <p class="font-medium">BATCHES</p>
                            <p class="text-3xl font-medium mt-2" id="numberThree" data-max-number="{{ $batch_count }}">0
                            </p>
                        </div>
                        <div id="numberAnimation"
                            class="text-center py-8 aspect-3/2 sm:w-full sm:aspect-auto bg-dwit-blue brightness-140 rounded-uihalf text-white">
                            <p class="font-medium">TEAM</p>
                            <p class="text-3xl font-medium mt-2" id="numberTwo" data-max-number="{{ $team_count }}">0</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- team section --}}
    <section class="bg-ui-white mx-auto py-8 lg:py-16 text-center">
        <p data-aos="zoom-in-up" data-aos-duration="1000" class="text-3xl font-semibold text-dwit-blue">OUR TEAM</p>
        <div class="mt-8 grid sm:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-16">
            @foreach ($teams as $team)
                <div data-aos="fade-up" data-aos-duration="800"
                    class="container max-w-3xs mx-auto p-4 bg-white rounded-ui drop-shadow">
                    <div class="rounded-full bg-cover h-28 w-28 mx-auto"
                        style="background-image: url({{ asset('/storage/' . $team->image) }})">
                    </div>
                    <p class="text-center font-semibold text-xl mt-4">{{ $team->first_name }}</p>
                    <p class="text-center font-semibold text-xl mb-10">{{ $team->last_name }}</p>
                    <div class="overlay text-white text-sm rounded-uihalf p-6 drop-shadow flex flex-col">
                        <p class="text-center font-medium text-lg -mt-3">{{ $team->designation }}</p>
                        <p class="mt-2 text-justify text-sm font-light">{{ $team->statement }}</p>
                        <p class="mt-auto"><a href="{{ $team->linkedin_url }}" target="blank"><img
                                    src="{{ asset('images/icon/linkedin_white.png') }}"
                                    class="h-5 object-contain aspect-3/2" alt=""></a>
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- feedback section --}}
    <section class="mx-auto text-center my-8 lg:my-16">
        <p data-aos="zoom-in-up" data-aos-duration="1000" class="text-3xl font-semibold text-dwit-blue">TESTIMONIALS</p>
        <div class="mt-8">
            @foreach ($feedbacks as $feedback)
                <div
                    class="bg-ui-white max-w-2xs xs:max-w-xs sm:max-w-md md:max-w-md xl:w-1/3 h-fit mx-auto p-4 sm:p-8 rounded-ui drop-shadow-sm flex flex-col justify-around">
                    <div class="flex justify-center space-x-5 items-center">
                        <div class="rounded-full bg-cover h-18 w-18 sm:h-24 sm:w-24"
                            style="background-image: url({{ asset('/storage/' . $feedback->image) }})">
                        </div>
                        <div class="text-left">
                            <p class="font-bold text-2xl">{{ $feedback->full_name }}</p>
                            <p class="font-semibold text-gray-600">{{ $feedback->batch }}</p>
                        </div>
                    </div>
                    <div class="mt-4 text-sm sm:text-base text-justify">
                        {{ $feedback->message }}
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
