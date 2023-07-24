@extends('layouts.admin_layout')

@section('content')
    <div class="flex flex-row justify-end my-4">
        <a class="button" href="{{ route('news.index') }}">Back</a>
    </div>
    <div class="pb-16 w-3/5 mx-auto flex flex-col gap-4 justify-between">
        <p class="font-medium text-center text-lg leading-6">{{ $news->headline }}</p>
        <div class="h-104 aspect-square object-contain bg-cover mx-auto"
            style="background-image: url({{ asset('/storage/' . $news->image) }})">
        </div>
        <div class="flex justify-between items-center text-sm">
            <p class="font-normal">{{ $news->release_date->format('d M, Y') }}</p>
            <div class="flex gap-1">
                <p class="font-normal">By:</p>
                <p class="font-normal text-dwit-blue">{{ $news->reported_by }}</p>
            </div>
        </div>
        <div>{!! $news->article !!}</div>
    </div>
@endsection
