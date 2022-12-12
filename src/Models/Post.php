<?php

namespace Sankokai\Press\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected static function newFactory()
    {
        return \Sankokai\Press\Database\Factories\PostFactory::new();
    }

    public function extra($field)
    {
        return optional(json_decode($this->extra))->$field;
    }
}
