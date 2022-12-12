<?php

namespace Sankokai\Press\Console;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Sankokai\Press\Models\Post;
use Sankokai\Press\Facades\Press;

class ProcessCommand extends Command
{
    protected $signature = 'press:process';

    protected $description = 'Updates blog posts.';

    public function handle() {
        if (Press::configNotPublished()) {
            return $this->warn('Please publish the config file by running ' .
                '\'php artisan vendor:publish --tag=press-config\'');
        }

        try {
            // Fetch all posts
            $posts = Press::driver()->fetchPosts();
            
            // Persis to the DB
            foreach ($posts as $post) {
                Post::Create([
                    'identifier' => $post['identifier'],
                    'slug' => Str::slug($post['title']),
                    'title' => $post['title'],
                    'body' => $post['body'],
                    'extra' => $post['extra'] ?? '' ,
                ]);
            }
        } catch(\Exception $e) {
            $this->error($e->getMessage());
        }
    }
}
