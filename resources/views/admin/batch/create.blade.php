@extends('layouts.admin_layout')

@section('content')
    <div class="flex flex-row justify-between my-4">
        <p class="text-xl font-semibold">Add New Batch</p>
        <a class="button" href="{{ route('batch.index') }}">Back</a>
    </div>
    <form action="{{ route('batch.store') }}" method="POST" enctype="multipart/form-data" id="submitForm" class="form">
        @csrf
        <div class="mb-6">
            <label for="batch" class="form-label">Class of</label>
            <input type="text" id="batch" name="batch" class="form-input" placeholder="Class of 2025"
                value="{{ old('batch') }}">
            @error('batch')
                <script>
                    document.getElementById('batch').classList.add('border-red-600')
                </script>
                <p class="text-sm text-red-500"><small>{{ $message }}</small></p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="image" class="form-label">Upload Batch Photo</label>
            <input type="file" id="image" name="image" class="form-input" accept="image/*"
                onchange="previewImage(event)">
            <img id="preview" class="hidden mt-2 h-20">
            @error('image')
                <script>
                    document.getElementById('image').classList.add('border-red-600')
                </script>
                <p class="text-sm text-red-500"><small>{{ $message }}</small></p>
            @enderror
        </div>
        <button type="submit" class="button" id="create" onclick="loading()">
            <img aria-hidden="true" src="{{ asset('images/svg/loading.svg') }}"
                class="hidden w-4 h-4 mr-2 text-white animate-spin" id="loading_icon">
            Submit
        </button>
    </form>
@endsection
