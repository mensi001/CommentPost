<div style="margin-left: {{ $comment->depth * 20 }}px">
    <p>{{ $comment->content }}</p>
    @if ($comment->depth < 3)
        <button wire:click="$set('parentId', {{ $comment->id }})">Reply</button>
    @endif

    @foreach ($comment->replies as $reply)
        @include('components.comment', ['comment' => $reply])
    @endforeach
</div>
