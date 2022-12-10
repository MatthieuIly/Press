<?php

namespace Sankokai\Press\Fields;

use Sankokai\Press\MarkdownParser;

class Body
{
    public static function process($type, $value, $data)
    {
        return [
            $type => MarkdownParser::parse($value)
        ];
    }
}
