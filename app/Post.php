<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'body'];

    public static function publish($title, $message)
    {
       return self::create([
            'title' => $title,
            'body' => $message
        ]);
    }
}
