<?php

namespace Sankokai\Press\Repositories;

use Illuminate\Support\Str;
use Sankokai\Press\Models\Post;

class PostRepository
{
    public function save($post)
    {
        Post::updateOrCreate([
            'identifier' => $post['identifier'],
        ],[
            'slug' => Str::slug($post['title']),
            'title' => $post['title'],
            'body' => $post['body'],
            'extra' => $post['extra'] ?? json_encode([]) ,
        ]);
    }
}
