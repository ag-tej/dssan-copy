@extends('layouts.admin_layout')

@section('content')
    <div class="flex flex-row justify-between my-4">
        <div>
            <p class="text-xl font-semibold">Events</p>
            <p class="text-sm">A list of events happening for DSS Alumni.</p>
        </div>
        <form action="{{ route('events.create') }}">
            <button type="submit" class="button">Add Events</button>
        </form>
    </div>
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr class="border">
                    <th scope="col" class="p-3">Event Banner</th>
                    <th scope="col" class="p-3">Event Title</th>
                    <th scope="col" class="p-3">Description</th>
                    <th scope="col" class="p-3">Event Date</th>
                    <th scope="col" class="p-3">Event Time</th>
                    <th scope="col" colspan="2" class="p-3">Action</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($events as $event)
                    <tr class="bg-white border hover:bg-gray-50">
                        <td class="p-3">
                            <div class="h-20 aspect-square object-contain bg-cover mx-auto"
                                style="background-image: url({{ asset('/storage/' . $event->image) }})"></div>
                        </td>
                        <td class="p-3">{{ $event->event_title }}</td>
                        <td class="p-3">{{ $event->description }}</th>
                        <td class="p-3">{{ $event->event_date_time->format('d M, Y') }}</td>
                        <td class="p-3">{{ $event->event_date_time->format('h:i A') }}</td>
                        <td class="p-3">
                            <form id="submitForm_{{ $event->id }}" action="{{ route('events.destroy', $event->id) }}"
                                method="POST" class="flex flex-col gap-1">
                                <a class="font-medium text-blue-600 hover:underline"
                                    href="{{ route('events.edit', $event->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="button" class="font-medium text-red-600 hover:underline"
                                    onclick="deleteBox({{ $event->id }})">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
