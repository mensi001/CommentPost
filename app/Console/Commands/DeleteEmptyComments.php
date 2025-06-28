<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Comment;

class DeleteEmptyComments extends Command
{
    protected $signature = 'comments:cleanup-empty';
    protected $description = 'Deletes comments with empty content';

    public function handle()
    {
        \Log::info("DeleteEmptyComments command is running.");

        $count = Comment::whereNull('content')->orWhere('content', '')->delete();

        $this->info("Deleted $count empty comments.");
    }
}

