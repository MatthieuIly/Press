<?php

namespace Sankokai\Press\Console;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Sankokai\Press\Models\Post;
use Sankokai\Press\Facades\Press;
use Sankokai\Press\Repositories\PostRepository;

class ProcessCommand extends Command
{
    protected $signature = 'press:process';

    protected $description = 'Updates blog posts.';

    public function handle(PostRepository $postRepository) {
        if (Press::configNotPublished()) {
            return $this->warn('Please publish the config file by running ' .
                '\'php artisan vendor:publish --tag=press-config\'');
        }

        try {
            // Fetch all posts
            $posts = Press::driver()->fetchPosts();

            $this->info('Number of Posts: ' . count($posts));

            // Persis to the DB
            foreach ($posts as $post) {
                $postRepository->save($post);

                $this->info('Post: ' . $post['title']);
            }
        } catch(\Exception $e) {
            $this->error($e->getMessage());
        }
    }
}
