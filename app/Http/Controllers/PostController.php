<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function create()
    {
        return view('posts.create', ['title' => 'Add Post']);
    }

    public function store(StorePostRequest $request)
    {
       /* $validated = $request->validate([
            'title' => ['required', 'max:255'],
            'slug' => ['required', 'max:255', 'unique:posts'],
            'content' => ['required'],
            'category_id' => ['required', 'exists:categories,id']
            ], [
                'title.required' => ':attribute required.',
                'title.max' => ':attribute max',
        ]);*/
        Post::query()->create($request->all());
        return redirect()->route('posts.create')->with('success', 'Post saved');
    }
}
