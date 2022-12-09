<?php

namespace Tests\Feature;

use Parsedown;
use Orchestra\Testbench\TestCase;
use Sankokai\Press\MarkdownParser;

class MarkdownTest extends TestCase
{
    /** @test */
    public function simple_markdown_is_parsed()
    {
        $parsedown = new Parsedown();

        $this->assertEquals('<h1>Heading</h1>', MarkdownParser::parse('# Heading'));

    }
}
