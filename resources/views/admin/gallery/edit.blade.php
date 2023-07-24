@extends('layouts.admin_layout')
@section('content')
    <form method="POST" action="{{ route('gallery.update', $gallery->id) }}" enctype="multipart/form-data" id="submitForm"
        class="form">
        @csrf
        @method('PUT')

        <div class="mb-6">
            <div class="mb-6">
                <label for="name" class="form-label"> Name </label>
                <input type="text" id="name" name="name" class="form-input" value="{{ $gallery->name }}">
            </div>
            <div class="mb-6">
                <label for="cover_image" class="form-label"> Image </label>
                <input type="file" name="cover_image" class="form-input" accept="image/*" onchange="previewImage(event)">
                <img id="preview" class="hidden mt-2 h-20">
                <img id="oldImage" src="{{ asset('/storage/' . $gallery->cover_image) }}" class="block mt-2 h-20">
            </div>

        </div>
        <div class="flex space-x-4 mt-4">
            <button type="submit" class="button" id="edit" onclick="loading()">
                <img aria-hidden="true" src="{{ asset('images/svg/loading.svg') }}"
                    class="hidden w-4 h-4 mr-2 text-white animate-spin" id="loading_icon">
                Edit
            </button>
    </form>
    <form method="POST" action="{{ route('gallery.destroy', $gallery->id) }}">
        @csrf
        @method('DELETE')
        <button type="submit" class="button" id="edit" onclick="loading()">
            <img aria-hidden="true" src="{{ asset('images/svg/loading.svg') }}"
                class="hidden w-4 h-4 mr-2 text-white animate-spin" id="loading_icon">
            Delete
        </button>
        </div>
    </form>
@endsection
