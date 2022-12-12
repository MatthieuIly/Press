<?php

namespace Sankokai\Press\Repositories;

use Illuminate\Support\Arr;
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
            'extra' => $this->extra($post) ,
        ]);
    }

    public function extra($post)
    {
        $extra = (array)json_decode($post['extra'] ?? '[]');
        //$post['extra'] ?? json_encode([]);
        $attributes = Arr::except($post, ['title', 'body', 'identifier', 'extra']);

        return json_encode(array_merge($extra, $attributes));
    }
}
