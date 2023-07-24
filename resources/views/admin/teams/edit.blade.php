@extends('layouts.admin_layout')

@section('content')
    <div class="flex flex-row justify-between my-4">
        <p class="text-xl font-semibold">Edit Member Details</p>
        <a class="button" href="{{ route('team.index') }}">Back</a>
    </div>
    <form action="{{ route('team.update', $team->id) }}" method="POST" enctype="multipart/form-data" id="submitForm"
        class="form">
        @csrf
        @method('PUT')
        <div class="mb-6">
            <label for="first_name" class="form-label">First Name</label>
            <input type="text" id="first_name" name="first_name" class="form-input" value="{{ $team->first_name }}">
            @error('first_name')
                <script>
                    document.getElementById('first_name').classList.add('border-red-600')
                </script>
                <p class="text-sm text-red-500"><small>{{ $message }}</small></p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="last_name" class="form-label">Last Name</label>
            <input type="text" id="last_name" name="last_name" class="form-input" value="{{ $team->last_name }}">
            @error('last_name')
                <script>
                    document.getElementById('last_name').classList.add('border-red-600')
                </script>
                <p class="text-sm text-red-500"><small>{{ $message }}</small></p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="designation" class="form-label">Designation</label>
            <input type="text" id="designation" name="designation" class="form-input" value="{{ $team->designation }}">
            @error('designation')
                <script>
                    document.getElementById('designation').classList.add('border-red-600')
                </script>
                <p class="text-sm text-red-500"><small>{{ $message }}</small></p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="position" class="form-label">Position</label>
            <input type="integer" id="position" name="position" class="form-input" value="{{ $team->position }}">
            @error('position')
                <script>
                    document.getElementById('position').classList.add('border-red-600')
                </script>
                <p class="text-sm text-red-500"><small>{{ $message }}</small></p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="statement" class="form-label">Statement</label>
            <textarea rows="3" id="statement" name="statement" class="form-input">{{ $team->statement }}</textarea>
            @error('statement')
                <script>
                    document.getElementById('statement').classList.add('border-red-600')
                </script>
                <p class="text-sm text-red-500"><small>{{ $message }}</small></p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="linkedin_url" class="form-label">LinkedIn Url</label>
            <input type="url" id="linkedin_url" name="linkedin_url" class="form-input"
                value="{{ $team->linkedin_url }}">
            @error('linkedin_url')
                <script>
                    document.getElementById('linkedin_url').classList.add('border-red-600')
                </script>
                <p class="text-sm text-red-500"><small>{{ $message }}</small></p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="image" class="form-label">Edit Photo</label>
            <input type="file" id="image" name="image" class="form-input" accept="image/*"
                onchange="previewImage(event)">
            <img id="preview" class="hidden mt-2 h-20">
            <img id="oldImage" src="{{ asset('/storage/' . $team->image) }}" class="block mt-2 h-20" alt="team">
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
