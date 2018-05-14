<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostFormRequest;
use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function store(PostFormRequest $request)
    {
        $post = new Post();

        $post->publish(request('title'), request('body'));

        return redirect('/publish');
    }
}
