<?php

namespace Sankokai\Press;

use Carbon\Carbon;
use Illuminate\Support\Facades\File;

class PressFileParser
{
    protected $data;

    public function __construct(protected string $filename)
    {
        $this->splitFile();

        $this->explodeData();

        $this->processFields();
    }

    public function getData()
    {
        return $this->data;
    }

    public function splitFile()
    {
        preg_match(
            '/^\-{3}(.*?)\-{3}(.*)/s', 
            File::exists($this->filename) ? File::get($this->filename) : $this->filename, 
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

    public function processFields()
    {
        foreach($this->data as $field => $value) {
            if ($field === 'date') {
                // dd(Carbon::parse($value));
                $this->data[$field] = Carbon::parse($value);
            } elseif ($field === 'body') {
                $this->data[$field] = MarkdownParser::parse($value);
            }
        }
    }
}