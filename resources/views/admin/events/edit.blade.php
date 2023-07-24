@extends('layouts.admin_layout')

@section('content')
    <div class="flex flex-row justify-between my-4">
        <p class="text-xl font-semibold">Edit Event Details</p>
        <a class="button" href="{{ route('events.index') }}">Back</a>
    </div>
    <form action="{{ route('events.update', $event->id) }}" method="POST" enctype="multipart/form-data" id="submitForm"
        class="form">
        @csrf
        @method('PUT')
        <div class="mb-6">
            <label for="event_title" class="form-label">Event Title</label>
            <input type="text" id="event_title" name="event_title" class="form-input" value="{{ $event->event_title }}">
            @error('event_title')
                <script>
                    document.getElementById('event_title').classList.add('border-red-600')
                </script>
                <p class="text-sm text-red-500"><small>{{ $message }}</small></p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="description" class="form-label">Describe in Short</label>
            <textarea id="description" rows="2" name="description" class="form-input">{{ $event->description }}</textarea>
            @error('description')
                <script>
                    document.getElementById('description').classList.add('border-red-600')
                </script>
                <p class="text-sm text-red-500"><small>{{ $message }}</small></p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="event_date_time" class="form-label">Event Date & Time</label>
            <input type="datetime-local" id="event_date_time" name="event_date_time" class="form-input"
                value="{{ $event->event_date_time }}">
            @error('event_date_time')
                <script>
                    document.getElementById('event_date_time').classList.add('border-red-600')
                </script>
                <p class="text-sm text-red-500"><small>{{ $message }}</small></p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="image" class="form-label">Upload Event Banner</label>
            <input type="file" id="image" name="image" class="form-input" accept="image/*"
                onchange="previewImage(event)">
            <img id="preview" class="hidden mt-2 h-20">
            <img id="oldImage" src="{{ asset('/storage/' . $event->image) }}" class="block mt-2 h-20" alt="news_banner">
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
