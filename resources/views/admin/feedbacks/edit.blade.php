@extends('layouts.admin_layout')

@section('content')
    <div class="flex flex-row justify-between my-4">
        <p class="text-xl font-semibold">Edit Details</p>
        <a class="button" href="{{ route('feedback.index') }}">Back</a>
    </div>
    <form action="{{ route('feedback.update', $feedback->id) }}" method="POST" enctype="multipart/form-data" id="submitForm"
        class="form">
        @csrf
        @method('PUT')
        <div class="mb-6">
            <label for="full_name" class="form-label">Full Name</label>
            <input type="text" id="full_name" name="full_name" class="form-input" value="{{ $feedback->full_name }}">
            @error('full_name')
                <script>
                    document.getElementById('full_name').classList.add('border-red-600')
                </script>
                <p class="text-sm text-red-500"><small>{{ $message }}</small></p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="email" class="form-label">Email address</label>
            <input type="email" id="email" name="email" class="form-input" value="{{ $feedback->email }}">
            @error('email')
                <script>
                    document.getElementById('email').classList.add('border-red-600')
                </script>
                <p class="text-sm text-red-500"><small>{{ $message }}</small></p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="batch" class="form-label">Batch</label>
            <input type="text" id="batch" name="batch" class="form-input" value="{{ $feedback->batch }}">
            @error('batch')
                <script>
                    document.getElementById('batch').classList.add('border-red-600')
                </script>
                <p class="text-sm text-red-500"><small>{{ $message }}</small></p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="message" class="form-label">Message</label>
            <textarea required rows="3" id="message" name="message" class="form-input">{{ $feedback->message }}</textarea>
            @error('message')
                <script>
                    document.getElementById('message').classList.add('border-red-600')
                </script>
                <p class="text-sm text-red-500"><small>{{ $message }}</small></p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="display_status" class="form-label">Display Status</label>
            <select id="display_status" name="display_status" class="form-input">
                <option value="{{ $feedback->display_status }}" selected>{{ $feedback->display_status }}</option>
                <option value="Displayed">Displayed</option>
                <option value="Hidden">Hidden</option>
            </select>
            @error('display_status')
                <script>
                    document.getElementById('display_status').classList.add('border-red-600')
                </script>
                <p class="text-sm text-red-500"><small>{{ $message }}</small></p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="image" class="form-label">Edit Photo</label>
            <input type="file" id="image" name="image" class="form-input" accept="image/*"
                onchange="previewImage(event)">
            <img id="preview" class="hidden mt-2 h-20">
            @if ($feedback->image)
                <img id="oldImage" src="{{ asset('/storage/' . $feedback->image) }}" class="block mt-2 h-20"
                    alt="user_image">
            @endif
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
    </div>
@endsection
