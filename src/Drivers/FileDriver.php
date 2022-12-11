<?php

namespace Sankokai\Press\Drivers;

use Sankokai\Press\PressFileParser;
use Illuminate\Support\Facades\File;

class FileDriver
{
    public function fetchPosts()
    {
        $files = File::files(config('press.path'));

        // Process each files
        foreach ($files as $file) {
            $posts[] = (new PressFileParser($file->getPathname()))->getData();
        }

        return $posts ?? [];
    }
}
