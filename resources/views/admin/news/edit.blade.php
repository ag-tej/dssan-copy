@extends('layouts.admin_layout')

@section('content')
    <div class="flex flex-row justify-between my-4">
        <p class="text-xl font-semibold">Edit News Details</p>
        <a class="button" href="{{ route('news.index') }}">Back</a>
    </div>
    <form action="{{ route('news.update', $news->id) }}" method="POST" enctype="multipart/form-data" id="submitForm"
        class="form">
        @csrf
        @method('PUT')
        <div class="mb-6">
            <label for="headline" class="form-label">Headline</label>
            <input type="text" id="headline" name="headline" class="form-input" value="{{ $news->headline }}">
            @error('headline')
                <script>
                    document.getElementById('headline').classList.add('border-red-600')
                </script>
                <p class="text-sm text-red-500"><small>{{ $message }}</small></p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="tagline" class="form-label">Tagline</label>
            <input type="text" id="tagline" name="tagline" class="form-input" value="{{ $news->tagline }}">
            @error('tagline')
                <script>
                    document.getElementById('tagline').classList.add('border-red-600')
                </script>
                <p class="text-sm text-red-500"><small>{{ $message }}</small></p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="article" class="form-label">Article</label>
            <textarea name="article" id="editor" class="form-input">{{ $news->article }}</textarea>
            @error('article')
                <script>
                    document.getElementById('article').classList.add('border-red-600')
                </script>
                <p class="text-sm text-red-500"><small>{{ $message }}</small></p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="reported_by" class="form-label">Reported By</label>
            <input type="text" id="reported_by" name="reported_by" class="form-input" value="{{ $news->reported_by }}">
            @error('reported_by')
                <script>
                    document.getElementById('reported_by').classList.add('border-red-600')
                </script>
                <p class="text-sm text-red-500"><small>{{ $message }}</small></p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="release_date" class="form-label">Release Date</label>
            <input type="date" id="release_date" name="release_date" class="form-input" value="{{ $date }}">
            @error('release_date')
                <script>
                    document.getElementById('release_date').classList.add('border-red-600')
                </script>
                <p class="text-sm text-red-500"><small>{{ $message }}</small></p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="image" class="form-label">Edit News Banner</label>
            <input type="file" id="image" name="image" class="form-input" accept="image/*"
                onchange="previewImage(event)">
            <img id="preview" class="hidden mt-2 h-20">
            <img id="oldImage" src="{{ asset('/storage/' . $news->image) }}" class="block mt-2 h-20" alt="news_banner">
            @error('image')
                <script>
                    document.getElementById('image').classList.add('border-red-600')
                </script>
                <p class="text-sm text-red-500"><small>{{ $message }}</small></p>
            @enderror
        </div>
        <button type="submit" class="button" id="create" onclick="loading()">
            <img aria-hidden="true" src="{{ asset('images/svg/loading.svg') }}"
                class="hidden w-4 h-4 mr-2 text-white animate-spin" id="loading_icon">
            Submit
        </button>
    </form>
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/super-build/ckeditor.js"></script>
    <script src="{{ asset('js/text-editor.js') }}" defer></script>
    <style>
        /* editing area */
        .ck-editor__editable[role="textbox"] {
            min-height: 200px;
        }
    </style>
@endsection
