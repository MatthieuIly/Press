<?php

namespace Sankokai\Press\Fields;

use Sankokai\Press\MarkdownParser;

class Body
{
    public static function process($type, $value)
    {
        return [
            $type => MarkdownParser::parse($value)
        ];
    }
}
