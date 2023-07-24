@extends('layouts.admin_layout')
@section('content')
    <section class="w-11/12 mx-auto mt-16 mb-8 lg:mb-16">
        <div data-aos="zoom-in-up" data-aos-duration="500">
            <p class="text-3xl font-semibold text-dwit-blue">{{ $gallery->name }}</p>
            <hr class="mt-2">
        </div>

        <div class="mt-2 block">
            <form method="POST" action="{{ route('gallery.image.store', $gallery) }}" enctype="multipart/form-data"
                id="submitForm" class="form">
                @csrf
                <div class="mb-6">
                    <label for="images[]" class="form-label"> Add Images </label>
                    <input type="file" id="images[]" name="images[]" class="form-input" multiple>

                </div>
                <button type="submit" class="button" id="create" onclick="loading()">
                    <img aria-hidden="true" src="{{ asset('images/svg/loading.svg') }}"
                        class="hidden w-4 h-4 mr-2 text-white animate-spin" id="loading_icon">
                    Add Images
                </button>
                @if ($errors->any())
                    <div class="text-sm text-red-500">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </form>
        </div>

        <div class="mt-8 grid sm:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-16">
            @foreach ($images as $image)
                @if ($image->gallery_id == $gallery->id)
                    <a href="{{ route('image.edit', $image->id) }}" target="blank">
                        <div data-aos="fade-up" data-aos-duration="800"
                            class="relative border rounded-uihalf drop-shadow-sm">
                            <div class="mx-auto aspect-3/2 object-contain rounded-uihalf">
                                <img src="{{ asset('/storage/' . $image->image) }}" alt="images"
                                    class="mx-auto aspect-3/2 object-center object-contain rounded-uihalf">
                            </div>
                        </div>
                    </a>
                @endif
            @endforeach
        </div>
    </section>
@endsection
