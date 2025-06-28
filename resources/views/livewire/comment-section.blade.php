<div>
    <form wire:submit.prevent="addComment">
        <textarea wire:model="newComment" placeholder="Write a comment..."></textarea>
        <button type="submit">Add Comment</button>
    </form>

    @if (session()->has('error'))
        <div>{{ session('error') }}</div>
    @endif

    <div>
        @foreach ($comments as $comment)
            @include('components.comment', ['comment' => $comment])
        @endforeach
    </div>
</div>
