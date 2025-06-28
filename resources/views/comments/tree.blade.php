@foreach($comments as $comment)
    <div class="ml-{{ $comment->depth * 4 }} p-4 border-l-2 border-gray-300 mb-4">
        <p class="mb-2">{{ $comment->content ?: '⚠️ (Empty comment)' }}</p>

        @if(session('error_' . $comment->id))
            <p class="text-red-500">{{ session('error_' . $comment->id) }}</p>
        @endif

        @if($comment->canReply())
            <form method="POST" action="{{ route('comments.store') }}" class="mb-4">
                @csrf
                <input type="hidden" name="post_id" value="{{ $comment->post_id }}">
                <input type="hidden" name="parent_comment_id" value="{{ $comment->id }}">
                <textarea name="content" rows="2" class="w-full p-2 border rounded" placeholder="Reply to this comment..."></textarea>
                <button type="submit" class="mt-2 bg-gray-600 text-white px-3 py-1 rounded hover:bg-gray-700">
                    Reply
                </button>
            </form>
        @endif

        @if($comment->replies->count())
            @include('comments.tree', ['comments' => $comment->replies])
        @endif
    </div>
@endforeach
