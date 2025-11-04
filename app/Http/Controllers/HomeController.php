<?php

namespace App\Http\Controllers;

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
        $users = [];
        $cities = [];

/*        $country = Country::query()->find('AFG');
        dump('country');
        dump($country->toArray());*/

/*        dump('Count: ' . Country::query()->count());
        dump('Count: ' . Country::query()->where('Population', '>', 1000000)->count());
        dump('Max: ' . Country::query()->max('Population'));
        dump('Min: ' . Country::query()->min('Population'));
        dump('Avg: ' . Country::query()->avg('Population'));*/

/*        $country = Country::query()->find('AFG2');
        if(!'country') {
            abort(404);
        };*/

/*        $country = Country::query()->findOrFail('AFG');
        dump($country);*/

/*        $post = new Post();
        $post->title = 'Post 4';
        $post->content = 'Post 4 content';
        $post->category_id = rand(1, 2);
        dump($post->save());
        dump($post->id);*/

        /*dump(Post::query()->create([
            'title' => 'Post 6',
            'content' => 'Post 6 content',
            'category_id' => 1,
            'status' => 0,
        ]));*/

//        $post = Post::query()->find(2);
//        dump($post->delete());
//        dump(Post::destroy(3));
        dump(Post::destroy(7, 9));

        return view('home.index', compact('users'));
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
