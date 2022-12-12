<?php

namespace Sankokai\Press\Fields;

use Sankokai\Press\MarkdownParser;

class Body extends FieldContract
{
    public static function process($fieldType, $fieldValue, $data)
    {
        return [
            $fieldType => MarkdownParser::parse($fieldValue)
        ];
    }
}
