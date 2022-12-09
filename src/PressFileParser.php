<?php

namespace Sankokai\Press;

use Illuminate\Support\Facades\File;

class PressFileParser
{
    protected $data;

    public function __construct(protected string $filename)
    {
        $this->splitFile();

        $this->explodeData();
    }

    public function getData()
    {
        return $this->data;
    }

    public function splitFile()
    {
        preg_match(
            '/^\-{3}(.*?)\-{3}(.*)/s', 
            File::get($this->filename), 
            $this->data
        );
        // dd($this->data);
    }

    public function explodeData()
    {
        foreach(explode("\n", trim($this->data[1])) as $fieldString) {
            preg_match('/(.*):\s?(.*)/', $fieldString, $fieldArray);
            $this->data[$fieldArray[1]] = $fieldArray[2];
        }

        $this->data['body'] = trim($this->data[2]);

    }
}