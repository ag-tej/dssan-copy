@extends('layouts.admin_layout')

@section('content')
    <div class="flex flex-row justify-between my-4">
        <p class="text-xl font-semibold">Add alumnus for {{ $batch->batch }}</p>
        <a class="button" href="{{ route('batch.show', $batch->id) }}">Back</a>
    </div>
    <form action="{{ route('batch.alumni.store', $batch) }}" method="POST" enctype="multipart/form-data" id="submitForm"
        class="form">
        @csrf
        <div class="mb-6">
            <label for="full_name" class="form-label">Full Name</label>
            <input type="text" id="full_name" name="full_name" class="form-input" value="{{ old('full_name') }}">
            @error('full_name')
                <script>
                    document.getElementById('full_name').classList.add('border-red-600')
                </script>
                <p class="text-sm text-red-500"><small>{{ $message }}</small></p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="email" class="form-label">Email address</label>
            <input type="email" id="email" name="email" class="form-input" value="{{ old('email') }}">
            @error('email')
                <script>
                    document.getElementById('email').classList.add('border-red-600')
                </script>
                <p class="text-sm text-red-500"><small>{{ $message }}</small></p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="address" class="form-label">Current Address</label>
            <input type="text" id="address" name="address" class="form-input" value="{{ old('address') }}">
            @error('address')
                <script>
                    document.getElementById('address').classList.add('border-red-600')
                </script>
                <p class="text-sm text-red-500"><small>{{ $message }}</small></p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="contact" class="form-label">Contact Number</label>
            <input type="text" id="contact" name="contact" class="form-input" value="{{ old('contact') }}">
            @error('contact')
                <script>
                    document.getElementById('contact').classList.add('border-red-600')
                </script>
                <p class="text-sm text-red-500"><small>{{ $message }}</small></p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="social_link" class="form-label">Social Link (url)</label>
            <input type="url" id="social_link" name="social_link" class="form-input" value="{{ old('social_link') }}">
            @error('social_link')
                <script>
                    document.getElementById('social_link').classList.add('border-red-600')
                </script>
                <p class="text-sm text-red-500"><small>{{ $message }}</small></p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="birth_date" class="form-label">Birth Date</label>
            <input type="date" id="birth_date" name="birth_date" class="form-input" value="{{ old('birth_date') }}">
            @error('birth_date')
                <script>
                    document.getElementById('birth_date').classList.add('border-red-600')
                </script>
                <p class="text-sm text-red-500"><small>{{ $message }}</small></p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="gender" class="form-label">Gender</label>
            <select id="gender" name="gender" class="form-input">
                <option value="{{ old('gender') }}">{{ old('gender') }}</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
            @error('gender')
                <script>
                    document.getElementById('gender').classList.add('border-red-600')
                </script>
                <p class="text-sm text-red-500"><small>{{ $message }}</small></p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="current_university" class="form-label">Current University</label>
            <input type="text" id="current_university" name="current_university" class="form-input"
                value="{{ old('current_university') }}">
            @error('current_university')
                <script>
                    document.getElementById('current_university').classList.add('border-red-600')
                </script>
                <p class="text-sm text-red-500"><small>{{ $message }}</small></p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="major_subject" class="form-label">Major Subject</label>
            <input type="text" id="major_subject" name="major_subject" class="form-input"
                value="{{ old('major_subject') }}">
            @error('major_subject')
                <script>
                    document.getElementById('major_subject').classList.add('border-red-600')
                </script>
                <p class="text-sm text-red-500"><small>{{ $message }}</small></p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="image" class="form-label">Upload Photo</label>
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
