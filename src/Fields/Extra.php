<?php

namespace Sankokai\Press\Fields;

class Extra
{
    public static function process($type, $value)
    {
        return [
            'extra' => json_encode([
                $type => $value
            ]),
        ];
    }
}
