@extends('layouts.admin_layout')

@section('content')
    <div class="flex flex-row justify-between my-4">
        <div>
            <p class="text-xl font-semibold">Admin User</p>
            <p class="text-sm">A list of members who can access DSSAN admin panel.</p>
        </div>
        <form action="{{ route('user.create') }}">
            <button type="submit" class="button">Add User</button>
        </form>
    </div>
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr class="border">
                    <th scope="col" class="p-3">Image</th>
                    <th scope="col" class="p-3">Full Name</th>
                    <th scope="col" class="p-3">Email</th>
                    <th scope="col" class="p-3">Role</th>
                    <th scope="col" colspan="2" class="p-3">Action</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($users as $user)
                    <tr class="bg-white border hover:bg-gray-50">
                        <td class="p-3">
                            @if ($user->role == 'Admin')
                                <div class="w-20 h-20 rounded-full bg-cover mx-auto"
                                    style="background-image: url({{ asset('images/logo/deerlogo.png') }})"></div>
                            @else
                                <div class="w-20 h-20 rounded-full bg-cover mx-auto"
                                    style="background-image: url({{ asset('/storage/' . $user->image) }})"></div>
                            @endif
                        </td>
                        <td class="p-3">{{ $user->name }}</td>
                        <td class="p-3">{{ $user->email }}</th>
                        <td class="p-3">{{ $user->role }}</td>
                        <td class="p-3">
                            <form id="submitForm_{{ $user->id }}" action="{{ route('user.destroy', $user->id) }}"
                                method="POST" class="flex flex-col gap-1">
                                <a class="font-medium text-blue-600 hover:underline"
                                    href="{{ route('user.edit', $user->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                @if ($user->id != Auth::user()->id)
                                    <button type="button" class="font-medium text-red-600 hover:underline"
                                        onclick="deleteBox({{ $user->id }})">Delete</button>
                                @endif
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
