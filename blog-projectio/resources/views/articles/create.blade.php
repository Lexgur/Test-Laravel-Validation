<!-- resources/views/articles/form.blade.php -->
@extends('layouts.app')

@section('title', isset($article) ? 'Edit Article' : 'Create Article')

@section('content')
    <h2>{{ isset($article) ? 'Edit Article' : 'Create Article' }}</h2>

    <form action="{{ isset($article) ? route('articles.update', $article->id) : route('articles.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($article))
            @method('PUT')
        @endif

        <div class="mb-4">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" value="{{ old('title', $article->title ?? '') }}" required>
        </div>

        <div class="mb-4">
            <label for="category_id">Category:</label>
            <select name="category_id" id="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ isset($article) && $article->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="tags">Tags:</label>
            <select name="tags[]" id="tags" multiple>
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}" {{ isset($article) && $article->tags->contains($tag->id) ? 'selected' : '' }}>
                        {{ $tag->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="full_text">Content:</label>
            <textarea name="full_text" id="full_text" rows="5" required>{{ old('full_text', $article->full_text ?? '') }}</textarea>
        </div>

        <div class="mb-4">
            <label for="image">Image:</label>
            <input type="file" name="image" id="image">
        </div>

        <button type="submit">{{ isset($article) ? 'Update' : 'Create' }}</button>
    </form>
@endsection
