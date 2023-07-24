@extends('layouts.admin_layout')

@section('content')
    <div class="flex flex-row justify-between my-4">
        <p class="text-xl font-medium">Message from:</p>
        <a class="button" href="{{ route('feedback.index') }}">Back</a>
    </div>
    <div class="w-3/5 mx-auto flex flex-col gap-4 justify-between">
        <div>
            @if ($feedback->image)
                <div class="w-20 h-20 rounded-full bg-cover mx-auto"
                    style="background-image: url({{ asset('/storage/' . $feedback->image) }})"></div>
            @else
                <div class="w-20 h-20 rounded-full bg-cover mx-auto"
                    style="background-image: url({{ asset('images/default/default.png') }})"></div>
            @endif
            <p class="text-center text-lg font-medium mt-2">{{ $feedback->full_name }}, {{ $feedback->batch }}</p>
        </div>
        <div>
            <p class="text-justify">{{ $feedback->message }}</p>
        </div>
    </div>
@endsection
