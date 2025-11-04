<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
use App\Models\Language;
use App\Models\Post;
use http\Env\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function index()
    {
        /*$category = Category::query()->find(1);
        dump($category->toArray());

        $posts = $category->posts;
        dump($posts->toArray());*/

/*        $post = Post::query()->find(1);
        dump($post->toArray());
        dump($post->category->toArray());*/

//        $categories = Category::all();
        /*$categories = Category::with('posts')->get();
        dump($categories->toArray());

        foreach ($categories as $category) {
            echo "{$category->title}<br>";
            foreach ($category->posts as $post) {
                echo "{$post->title}<br>";
            }
            echo '<hr>';
        }*/

/*        $categories = Category::query()->withCount('posts')->get();
        dump($categories);

        foreach ($categories as $category) {
            echo "{$category->title} ({$category->posts_count})<br>";
            foreach ($category->posts as $post) {
                echo "{$post->title}<br>";
            }
        }*/

        $category = Category::query()->find(1);
//        dump($category->posts()->where('id', '<>', 4)->orderBy('id', 'desc')->limit(1)->get()->toArray());
        dump($category->posts->where('id', '<>', 4));



        return view('home.index');
    }

    public function store(Request $request)
    {
//        var_dump($request->title);
//        var_dump($request->all());
        Post::query()->create($request->all());
        return $request->all();
    }

    public function update(Request $request)
    {
        /*$post = Post::query()->find($request->id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        $post->status = $request->status;
        $post->save();*/

//        $post = Post::query()->findOrFail($request->id);
//        $post->update($request->all());

        var_dump(
            Post::query()
                ->where('id', $request->id)
        );
        return 'OK';
    }

    public function test()
    {
        return view('home.test', ['title' => 'Test page']);

    }

    public function contact()
    {

        return view('home/contact', ['title' => 'Contact page']);
    }

}
