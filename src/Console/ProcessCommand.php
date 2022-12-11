<?php

namespace Sankokai\Press\Console;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Sankokai\Press\Models\Post;
use Sankokai\Press\PressFileParser;
use Illuminate\Support\Facades\File;

class ProcessCommand extends Command
{
    protected $signature = 'press:process';

    protected $description = 'Updates blog posts.';

    public function handle() {
        if (is_null(config('press'))) {
            return $this->warn('Please publish the config file by running ' .
                '\'php artisan vendor:publish --tag=press-config\'');
        }

        // Fetch all posts
        $files = File::files(config('press.path'));

        // Process each files
        foreach ($files as $file) {
            $post = (new PressFileParser($file->getPathname()))->getData();
        }

        // Persis to the DB
        Post::Create([
            'identifier' => Str::random(),
            'slug' => Str::slug($post->title),
            'title' => $post['title'],
            'body' => $post['body'],
            'extra' => $post['extra'] ?? [] ,
        ]);
    }
}
