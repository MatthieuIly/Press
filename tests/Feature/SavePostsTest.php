<?php

namespace Sankokai\Press\Tests\Feature;

use Sankokai\Press\Post;
use Sankokai\Press\Tests\TestCase;

class SavePostTest extends TestCase
{
    /** @test */
    public function a_post_can_be_created_with_the_factory()
    {
        $post = Post::factory()->create();

        $this->assertCount(1, $post::all());
    }
}
