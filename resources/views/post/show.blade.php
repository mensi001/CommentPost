@extends('layouts.app')

@section('title', $post->title)

@section('content')
<div class="bg-white shadow rounded p-6 mb-6">
    <h1 class="text-3xl font-bold mb-2">{{ $post->title }}</h1>
    <p class="text-gray-700">{{ $post->content }}</p>
</div>

<hr class="my-6">

<div class="bg-white shadow rounded p-6">
    <h2 class="text-2xl font-semibold mb-4">Comments</h2>

    <!-- New top-level comment form -->
    <form method="POST" action="{{ route('comments.store') }}" class="mb-6">
        @csrf
        <input type="hidden" name="post_id" value="{{ $post->id }}">
        <textarea name="content" rows="3" class="w-full p-3 border rounded" placeholder="Leave a comment..."></textarea>
        <button type="submit" class="mt-2 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Submit Comment
        </button>
    </form>

    @include('comments.tree', ['comments' => $post->comments])
</div>
@endsection
