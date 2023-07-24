@extends('layouts.admin_layout')

@section('content')
    <div class="flex flex-row justify-between my-4">
        <div>
            <p class="text-xl font-semibold">Alumni</p>
            <p class="text-sm">A list of students in {{ $batch->batch }}.</p>
        </div>
        <form action="{{ route('batch.alumni.create', $batch->id) }}" class="space-x-5">
            <button type="submit" class="button">Add Alumni</button>
            <a class="button" href="{{ route('batch.index') }}">Back</a>
        </form>
    </div>
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr class="border">
                    <th scope="col" class="p-3">Image</th>
                    <th scope="col" class="p-3">Full Name</th>
                    <th scope="col" class="p-3">Email</th>
                    <th scope="col" class="p-3">Address</th>
                    <th scope="col" class="p-3">Contact</th>
                    <th scope="col" class="p-3">Social Link</th>
                    <th scope="col" class="p-3">Birth Date</th>
                    <th scope="col" class="p-3">Gender</th>
                    <th scope="col" class="p-3">Current University</th>
                    <th scope="col" class="p-3">Major Subject</th>
                    <th scope="col" colspan="2" class="p-3">Action</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($alumni as $alumnus)
                    <tr class="bg-white border hover:bg-gray-50">
                        <td class="p-3">
                            @if ($alumnus->image)
                                <div class="w-20 h-20 rounded-full bg-cover mx-auto"
                                    style="background-image: url({{ asset('/storage/' . $alumnus->image) }})"></div>
                            @else
                                <div class="w-20 h-20 rounded-full bg-cover mx-auto"
                                    style="background-image: url({{ asset('images/default/default.png') }})"></div>
                            @endif
                        </td>
                        <td class="p-3">{{ $alumnus->full_name }}</td>
                        <td class="p-3">{{ $alumnus->email }}</th>
                        <td class="p-3">{{ $alumnus->address }}</td>
                        <td class="p-3">{{ $alumnus->contact }}</td>
                        <td class="p-3">
                            <a href="{{ $alumnus->social_link }}" target="blank">
                                <img src="https://img.icons8.com/material-rounded/24/null/link--v1.png" alt="Link"
                                    class="mx-auto">
                            </a>
                        </td>
                        <td class="p-3">{{ $alumnus->birth_date->format('d M, Y') }}</td>
                        <td class="p-3">{{ $alumnus->gender }}</td>
                        <td class="p-3">{{ $alumnus->current_university }}</td>
                        <td class="p-3">{{ $alumnus->major_subject }}</td>
                        <td class="p-3">
                            <form id="submitForm_{{ $alumnus->id }}" action="{{ route('alumni.destroy', $alumnus->id) }}"
                                method="POST" class="flex flex-col gap-1">
                                <a class="font-medium text-blue-600 hover:underline"
                                    href="{{ route('alumni.edit', $alumnus->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="button" class="font-medium text-red-600 hover:underline"
                                    onclick="deleteBox({{ $alumnus->id }})">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
