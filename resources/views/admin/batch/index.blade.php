@extends('layouts.admin_layout')

@section('content')
    <div class="flex flex-row justify-between my-4">
        <div>
            <p class="text-xl font-semibold">Batch</p>
            <p class="text-sm">All batches in Deerwalk Sifal School.</p>
        </div>
        <form action="{{ route('batch.create') }}">
            <button type="submit" class="button">Add Batch</button>
        </form>
    </div>
    <div class="relative overflow-x-auto">
        <table class="w-1/2 text-sm mx-auto">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr class="border">
                    <th scope="col" class="p-3">Batch Image</th>
                    <th scope="col" class="p-3">Batch</th>
                    <th scope="col" colspan="3" class="p-3">Action</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($batches as $batch)
                    <tr class="bg-white border hover:bg-gray-50">
                        <td class="p-3">
                            <div class="h-20 aspect-3/2 object-contain bg-cover mx-auto"
                                style="background-image: url({{ asset('/storage/' . $batch->image) }})"></div>
                        </td>
                        <td class="p-3">{{ $batch->batch }}</td>
                        <td class="p-3">
                            <form id="submitForm_{{ $batch->id }}" action="{{ route('batch.destroy', $batch->id) }}"
                                method="POST" class="flex flex-col gap-1">
                                <a class="font-medium text-green-600 hover:underline"
                                    href="{{ route('batch.show', $batch->id) }}">View</a>
                                <a class="font-medium text-blue-600 hover:underline"
                                    href="{{ route('batch.edit', $batch->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="button" class="font-medium text-red-600 hover:underline"
                                    onclick="deleteBox({{ $batch->id }})">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
