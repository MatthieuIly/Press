<?php

namespace Sankokai\Press\Drivers;

use Illuminate\Support\Str;
use Sankokai\Press\PressFileParser;

abstract class Driver
{
    /**
     * Summary of config
     * @var mixed|\Illuminate\Config\Repository
     */
    protected $config;
    protected $posts = [];

    public function __construct()
    {
        $this->setConfig();
        // dd($this->config);
        $this->validateSource();
    }

    public abstract function fetchPosts();

    public function setConfig()
    {
        $this->config = config('press.' . config('press.driver'));
    }

    protected function validateSource()
    {
        return true;
    }

    protected function parse($content, $identifier)
    {
        $this->posts[] = array_merge(
            (new PressFileParser($content))->getData(),
            ['identifier' => Str::slug($identifier)]
        );
    }
}
