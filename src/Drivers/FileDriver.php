<?php

namespace Sankokai\Press\Drivers;

use Exceptions\FileDriverDirectoryNotFoundException;
use Illuminate\Support\Facades\File;

class FileDriver extends Driver
{
    public function fetchPosts()
    {
        $files = File::files($this->config('path'));

        // Process each files
        foreach ($files as $file) {
            // $$this->posts[] = (new PressFileParser($file->getPathname()))->getData();
            $this->parse($file->getPathname(), $file->getFilename());
        }

        return $this->posts ?? [];
    }

    protected function validateSource()
    {
        if (! File::exists($this->config('path'))) {
            throw new FileDriverDirectoryNotFoundException(
                'Directory at \'' . $this->config['path'] . '\' does not exist' .
                'Check the directory path in the config file.'
            );
        }
    }
}
