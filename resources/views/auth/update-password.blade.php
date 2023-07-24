@extends('layouts.admin_layout')
@section('content')
    <div class="flex flex-row justify-between my-4">
        <p class="text-xl font-semibold">Update Password</p>
    </div>
    <form action="/user/password" method="POST" enctype="multipart/form-data" id="submitForm" class="form">
        @csrf
        @method('PUT')
        <div class="mb-6">
            <label for="current_password" class="form-label">Current Password</label>
            <input type="password" id="current_password" name="current_password" class="form-input">
            @error('current_password')
                <script>
                    document.getElementById('current_password').classList.add('border-red-600')
                </script>
                <p class="text-sm text-red-500"><small>{{ $message }}</small></p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="password" class="form-label">New Password</label>
            <input type="password" id="password" name="password" class="form-input">
            @error('password')
                <script>
                    document.getElementById('password').classList.add('border-red-600')
                </script>
                <p class="text-sm text-red-500"><small>{{ $message }}</small></p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="password_confirmation" class="form-label">Confirm New Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-input">
            @error('password_confirmation')
                <script>
                    document.getElementById('password_confirmation').classList.add('border-red-600')
                </script>
                <p class="text-sm text-red-500"><small>{{ $message }}</small></p>
            @enderror
        </div>
        <div class="mb-4">
            <button type="submit" class="button" id="create" onclick="loading()">
                <img aria-hidden="true" src="{{ asset('images/svg/loading.svg') }}"
                    class="hidden w-4 h-4 mr-2 text-white animate-spin" id="loading_icon">
                Update Password
            </button>
        </div>
    </form>
@endsection
