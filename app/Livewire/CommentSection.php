<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Comment;
use App\Models\Post;

class CommentSection extends Component
{
    public $post;
    public $newComment = '';
    public $parentId = null;

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function addComment()
    {
        $parent = $this->parentId ? Comment::find($this->parentId) : null;
        $depth = $parent ? $parent->depth + 1 : 1;

        if ($depth > 3) {
            session()->flash('error', 'Maximum depth reached.');
            return;
        }

        Comment::create([
            'content' => $this->newComment,
            'post_id' => $this->post->id,
            'parent_comment_id' => $this->parentId,
            'depth' => $depth,
        ]);

        $this->newComment = '';
        $this->parentId = null;
    }

    public function render()
    {
        $comments = $this->post->comments()->with('replies')->get();
        return view('livewire.comment-section', compact('comments'));
    }
}
    
