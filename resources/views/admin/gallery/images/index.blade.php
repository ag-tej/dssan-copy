@extends('layouts.admin_layout')
@section('content')
    <section class="w-11/12 mx-auto mt-16 mb-8 lg:mb-16">
        <div data-aos="zoom-in-up" data-aos-duration="500">
            <p class="text-3xl font-semibold text-dwit-blue">Images</p>
            <hr class="mt-2">
        </div>
        <div class="mt-8 grid sm:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-16">
            <a href="{{ route('gallery.image.create', $gallery) }}">
                <button type="submit" class="button" id="create" onclick="loading()">
                    <img aria-hidden="true" src="{{ asset('images/svg/loading.svg') }}"
                        class="hidden w-4 h-4 mr-2 text-white animate-spin" id="loading_icon">
                    Add Images
                </button>
            </a>
        </div>
        <div class="mt-8 grid sm:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-16">
            @foreach ($images as $image)
                <div>
                    <div class="mx-auto aspect-3/2 object-contain bg-cover rounded-uihalf"
                        style="background-image: url({{ asset('/storage/' . $gallery->cover_image) }})">
                    </div>

                    <div
                        class="opacity-0 hover:opacity-100 duration-300 absolute inset-0 z-10 flex flex-col justify-center items-center space-y-5">
                        <div>
                            <a href="{{ route('gallery.image.create', $gallery) }}">
                                <button type="submit" class="button inline-block" id="create" onclick="loading()">
                                    <img aria-hidden="true" src="{{ asset('images/svg/loading.svg') }}"
                                        class="hidden w-4 h-4 mr-2 text-white animate-spin" id="loading_icon">
                                    Show
                                </button>
                            </a>
                        </div>
                        <div>
                            <a href="{{ route('gallery.edit', $gallery->id) }}">
                                <button type="submit" class="button inline-block" id="create" onclick="loading()">
                                    <img aria-hidden="true" src="{{ asset('images/svg/loading.svg') }}"
                                        class="hidden w-4 h-4 mr-2 text-white animate-spin" id="loading_icon">
                                    Edit
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
                <a href="{{ route('image.edit', $image->id) }}" target="blank">
                    <div data-aos="fade-up" data-aos-duration="800" class="relative border rounded-uihalf drop-shadow-sm">
                        <div class="mx-auto aspect-3/2 object-contain rounded-uihalf">
                            <img src="{{ asset('/storage/' . $image->image) }}" alt="images"
                                class="mx-auto aspect-3/2 object-center object-contain rounded-uihalf">
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </section>
@endsection
