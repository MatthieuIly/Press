<?php

namespace Sankokai\Press\Tests\Feature;

use Parsedown;
use Sankokai\Press\MarkdownParser;
use Sankokai\Press\Tests\TestCase;

class MarkdownTest extends TestCase
{
    /** @test */
    public function simple_markdown_is_parsed()
    {
        $parsedown = new Parsedown();

        $this->assertEquals('<h1>Heading</h1>', MarkdownParser::parse('# Heading'));

    }
}
