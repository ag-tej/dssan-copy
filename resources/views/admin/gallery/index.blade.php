@extends('layouts.admin_layout')

@section('content')
    {{-- gallery section --}}
    <section class="w-11/12 mx-auto mt-16 mb-8 lg:mb-16">
        <div data-aos="zoom-in-up" data-aos-duration="500">
            <p class="text-3xl font-semibold text-dwit-blue">Gallery</p>

        </div>
        <div class="mt-8 grid sm:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-16">
            @foreach ($galleries as $gallery)
                <div class="flex flex-col">
                    <a href="{{ route('gallery.image.create', $gallery) }}" target="blank">
                        <div data-aos="fade-up" data-aos-duration="800" class="relative border rounded-uihalf drop-shadow-sm">
                            <div>
                                <div class="mx-auto aspect-3/2 object-contain bg-cover rounded-uihalf"
                                    style="background-image: url({{ asset('/storage/' . $gallery->cover_image) }})">
                                </div>

                                <div
                                    class="opacity-0 hover:opacity-100 duration-300 absolute inset-0 z-10 flex flex-col justify-center items-center space-y-5">
                                    <div>
                                        <a href="{{ route('gallery.image.create', $gallery) }}">
                                            <button type="submit" class="button inline-block" id="create"
                                                onclick="loading()">
                                                <img aria-hidden="true" src="{{ asset('images/svg/loading.svg') }}"
                                                    class="hidden w-4 h-4 mr-2 text-white animate-spin" id="loading_icon">
                                                Show
                                            </button>
                                        </a>
                                    </div>
                                    <div>
                                        <a href="{{ route('gallery.edit', $gallery->id) }}">
                                            <button type="submit" class="button inline-block" id="create"
                                                onclick="loading()">
                                                <img aria-hidden="true" src="{{ asset('images/svg/loading.svg') }}"
                                                    class="hidden w-4 h-4 mr-2 text-white animate-spin" id="loading_icon">
                                                Edit
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="absolute bg-black top-0 w-full h-full opacity-20"></div>
                            <div class="absolute bottom-4 left-4 flex flex-col gap-2 text-white">
                                <p class="text-xl font-medium drop-shadow-sm">{{ $gallery->name }}</p>
                                <p class="font-medium drop-shadow-sm">
                                    @php
                                        $i = 0;
                                        foreach ($images as $image) {
                                            if ($gallery->id == $image->gallery_id) {
                                                ++$i;
                                            }
                                        }
                                    @endphp
                                    Total Photos: {{ $i }}
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
            <a href="{{ route('gallery.create') }}">
                <div data-aos="fade-up" data-aos-duration="800" class="relative border rounded-uihalf drop-shadow-sm">
                    <div class="mx-auto aspect-3/2  bg-cover bg-center  rounded-uihalf "
                        style="background-image: url({{ 'images/images/add_logo.png' }})">
                    </div>
                    <div class="absolute bg-black top-0 w-full h-full opacity-20"></div>
                </div>
            </a>
    </section>
@endsection
