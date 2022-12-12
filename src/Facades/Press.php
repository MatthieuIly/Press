<?php

namespace Sankokai\Press\Facades;
use Illuminate\Support\Facades\Facade;

class Press extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'Press';
    }
}
