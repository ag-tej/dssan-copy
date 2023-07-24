@extends('layouts.admin_layout')

@section('content')
    <div class="flex flex-row justify-between my-4">
        <div>
            <p class="text-xl font-semibold">Teams</p>
            <p class="text-sm">A list of current team members in DSSAN.</p>
        </div>
        <form action="{{ route('team.create') }}">
            <button type="submit" class="button">Add Member</button>
        </form>
    </div>
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr class="border">
                    <th scope="col" class="p-3">Image</th>
                    <th scope="col" class="p-3">First Name</th>
                    <th scope="col" class="p-3">Last Name</th>
                    <th scope="col" class="p-3">Designation</th>
                    <th scope="col" class="p-3">Position</th>
                    <th scope="col" class="p-3">Statement</th>
                    <th scope="col" class="p-3">LinkedIn url</th>
                    <th scope="col" colspan="2" class="p-3">Action</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($teams as $team)
                    <tr class="bg-white border hover:bg-gray-50">
                        <td class="p-3">
                            <div class="w-20 h-20 rounded-full bg-cover mx-auto"
                                style="background-image: url({{ asset('/storage/' . $team->image) }})"></div>
                        </td>
                        <td class="p-3">{{ $team->first_name }}</td>
                        <td class="p-3">{{ $team->last_name }}</th>
                        <td class="p-3">{{ $team->designation }}</td>
                        <td class="p-3">{{ $team->position }}</td>
                        <td class="p-3">{{ $team->statement }}</td>
                        <td class="p-3">
                            <a href="{{ $team->linkedin_url }}" target="blank">
                                <img src="https://img.icons8.com/material-rounded/24/null/link--v1.png" alt="Link"
                                    class="mx-auto">
                            </a>
                        </td>
                        <td class="p-3">
                            <form id="submitForm_{{ $team->id }}" action="{{ route('team.destroy', $team->id) }}"
                                method="POST" class="flex flex-col gap-1">
                                <a class="font-medium text-blue-600 hover:underline"
                                    href="{{ route('team.edit', $team->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="button" class="font-medium text-red-600 hover:underline"
                                    onclick="deleteBox({{ $team->id }})">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
