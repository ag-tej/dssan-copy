@extends('layouts.auth_layout')
@section('content')
    <div class="relative bg-cover" style="background-image: url({{ asset('images/loginBG.png') }})">
        <div class="bg-black w-full h-screen opacity-40">
        </div>
    </div>
    <div class="absolute top-0 h-screen w-full flex justify-center items-center">
        <div class="bg-ui-white p-6 rounded-lg">
            <p class="text-center mb-6 font-medium">Sign in to your account</p>
            <form id="submitForm" action="/login" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="email" class="text-gray-700">Email address</label>
                    <input type="email" name="email"
                        class="w-full px-4 py-2 text-gray-700 bg-white border border-solid border-gray-300 rounded focus:border-blue-600 focus:outline-none">
                    @error('email')
                        <p class="text-sm text-red-500"><small>{{ $message }}</small></p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="password" class="text-gray-700">Password</label>
                    <input type="password" name="password"
                        class="w-full px-4 py-2 text-gray-700 bg-white border border-solid border-gray-300 rounded focus:border-blue-600 focus:outline-none">
                    @error('password')
                        <p class="text-sm text-red-500"><small>{{ $message }}</small></p>
                    @enderror
                </div>
                <div class="mb-4">
                    <button type="sumbit"
                        class="w-full py-3 bg-blue-600 text-white font-medium rounded shadow-sm hover:bg-blue-700"
                        id="create" onclick="loading()"><svg aria-hidden="true" role="status"
                            class="hidden w-4 h-4 mr-2 text-white animate-spin" id="loading_icon" viewBox="0 0 100 101"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                fill="#E5E7EB" />
                            <path
                                d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                fill="currentColor" />
                        </svg>
                        Log in
                    </button>
                </div>
                <p class="text-blue-600 hover:text-blue-700 text-center hover:underline">
                    <a href="/forgot-password">Forgot password?</a>
                </p>
            </form>
        </div>
    </div>
@endsection
