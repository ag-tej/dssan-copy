@extends('layouts.admin_layout')

@section('content')
    <div class="flex flex-row justify-between my-4">
        <p class="text-xl font-semibold">Edit User Details</p>
        <a class="button" href="{{ route('user.index') }}">Back</a>
    </div>
    <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data" id="submitForm"
        class="form">
        @csrf
        @method('PUT')
        <div class="mb-6">
            <label for="name" class="form-label">Full Name</label>
            <input type="text" id="name" class="form-input" name="name" value="{{ $user->name }}">
            @error('name')
                <script>
                    document.getElementById('name').classList.add('border-red-600')
                </script>
                <p class="text-sm text-red-500"><small>{{ $message }}</small></p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" id="email" class="form-input" name="email" value="{{ $user->email }}">
            @error('email')
                <script>
                    document.getElementById('email').classList.add('border-red-600')
                </script>
                <p class="text-sm text-red-500"><small>{{ $message }}</small></p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="role" class="form-label">Role</label>
            <select name="role" id="role" class="form-input">
                <option value="{{ $user->role }}">{{ $user->role }}</option>
                <option value="Manager" selected>Manager</option>
                <option value="Admin">Admin</option>
            </select>
            @error('role')
                <script>
                    document.getElementById('role').classList.add('border-red-600')
                </script>
                <p class="text-sm text-red-500"><small>{{ $message }}</small></p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="image" class="form-label">Upload Photo</label>
            <input type="file" id="image" class="form-input" name="image" accept="image/*"
                onchange="previewImage(event)">
            <img id="preview" class="hidden mt-2 h-20">
            <img id="oldImage" src="{{ asset('/storage/' . $user->image) }}" class="block mt-2 h-20" alt="user_image">
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
