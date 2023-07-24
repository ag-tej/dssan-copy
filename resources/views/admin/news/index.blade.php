@extends('layouts.admin_layout')

@section('content')
    <div class="flex flex-row justify-between my-4">
        <div>
            <p class="text-xl font-semibold">News</p>
            <p class="text-sm">A list of news article by DSS Alumni.</p>
        </div>
        <form action="{{ route('news.create') }}">
            <button type="submit" class="button">Add News</button>
        </form>
    </div>
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr class="border">
                    <th scope="col" class="p-3">News Banner</th>
                    <th scope="col" class="p-3">Headline</th>
                    <th scope="col" class="p-3">Tagline</th>
                    <th scope="col" class="p-3">Reported By</th>
                    <th scope="col" class="p-3">Release Date</th>
                    <th scope="col" colspan="3" class="p-3">Action</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($news as $single_news)
                    <tr class="bg-white border hover:bg-gray-50">
                        <td class="p-3">
                            <div class="h-20 aspect-square object-contain bg-cover mx-auto"
                                style="background-image: url({{ asset('/storage/' . $single_news->image) }})"></div>
                        </td>
                        <td class="p-3">{{ $single_news->headline }}</td>
                        <td class="p-3">{{ $single_news->tagline }}</th>
                        <td class="p-3">{{ $single_news->reported_by }}</td>
                        <td class="p-3">{{ $single_news->release_date->format('d M, Y') }}</td>
                        <td class="p-3">
                            <form id="submitForm_{{ $single_news->id }}"
                                action="{{ route('news.destroy', $single_news->id) }}" method="POST"
                                class="flex flex-col gap-1">
                                <a class="font-medium text-green-600 hover:underline"
                                    href="{{ route('news.show', $single_news->id) }}">View</a>
                                <a class="font-medium text-blue-600 hover:underline"
                                    href="{{ route('news.edit', $single_news->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="button" class="font-medium text-red-600 hover:underline"
                                    onclick="deleteBox({{ $single_news->id }})">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
