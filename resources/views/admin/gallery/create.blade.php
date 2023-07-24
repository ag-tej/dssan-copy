@extends('layouts.admin_layout')
@section('content')
    <div class="mb-6">
        <form method="POST" action="{{ route('gallery.store') }}" enctype="multipart/form-data" id="submitForm" class="form">
            @csrf
            <div class="mb-6">
                <label for="name" class="form-label"> Name </label>
                <input type="text" id="name" name="name" class="form-input">
                @error('name')
                    <p class="text-sm text-red-500"><small>{{ $message }}</small></p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="cover_image" class="form-label"> Image </label>
                <input type="file" id="cover_image" name="cover_image" class="form-input">
                @error('cover_image')
                    <p class="text-sm text-red-500"><small>{{ $message }}</small></p>
                @enderror
            </div>

            <button type="submit" class="button" id="create" onclick="loading()">
                <img aria-hidden="true" src="{{ asset('images/svg/loading.svg') }}"
                    class="hidden w-4 h-4 mr-2 text-white animate-spin" id="loading_icon">
                Add
            </button>
        </form>
    </div>
@endsection
