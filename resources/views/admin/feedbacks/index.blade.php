@extends('layouts.admin_layout')

@section('content')
    <div class="flex flex-row justify-between my-4">
        <div>
            <p class="text-xl font-semibold">Feedback</p>
            <p class="text-sm">Feedback messages received from users.</p>
        </div>
    </div>
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr class="border">
                    <th scope="col" class="p-3">Image</th>
                    <th scope="col" class="p-3">Name</th>
                    <th scope="col" class="p-3">Email address</th>
                    <th scope="col" class="p-3">Batch</th>
                    <th scope="col" class="p-3">Display Status</th>
                    <th scope="col" colspan="2" class="p-3">Action</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($feedbacks as $feedback)
                    <tr class="bg-white border hover:bg-gray-50">
                        <td class="p-3">
                            @if ($feedback->image)
                                <div class="w-20 h-20 rounded-full bg-cover mx-auto"
                                    style="background-image: url({{ asset('/storage/' . $feedback->image) }})"></div>
                            @else
                                <div class="w-20 h-20 rounded-full bg-cover mx-auto"
                                    style="background-image: url({{ asset('images/default/default.png') }})"></div>
                            @endif
                        </td>
                        <td class="p-3">{{ $feedback->full_name }}</td>
                        <td class="p-3">{{ $feedback->email }}</th>
                        <td class="p-3">{{ $feedback->batch }}</td>
                        <td class="p-3">{{ $feedback->display_status }}</td>
                        <td class="p-3">
                            <form id="submitForm_{{ $feedback->id }}"
                                action="{{ route('feedback.destroy', $feedback->id) }}" method="POST"
                                class="flex flex-col gap-1">
                                <a class="font-medium text-green-600 hover:underline"
                                    href="{{ route('feedback.show', $feedback->id) }}">View</a>
                                <a class="font-medium text-blue-600 hover:underline"
                                    href="{{ route('feedback.edit', $feedback->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="button" class="font-medium text-red-600 hover:underline"
                                    onclick="deleteBox({{ $feedback->id }})">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
