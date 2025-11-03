<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Language;
use App\Models\Post;
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

/*        $posts = Post::all()->toArray();
        dump($posts);*/

/*        $posts = Post::query()->first()->toArray();
        dump($posts);*/

/*        $posts = Post::query()->find(2, ['id', 'slug'])->toArray();
        dump($posts);*/

/*        $countries = Country::all(['Code', 'Name','Population'])->toArray();
        dump($countries);*/

/*        $countries = Country::query()
            ->where("Population", '>', 100000000)
            ->orderBy('Population', 'desc')
            ->limit(5)
            ->get(['Code', 'Name', 'Population']);*/
//        dump($countries);
//        return $countries->toJson();
//        return response()->json($countries);

//        $country = Country::query()->first();
        $country = Country::query()->find('AFG');

        dump($country->toArray());
        /*dump($country->Name);*/

/*        $lang = Language::query()->first();
        dump($lang)->toArray();
        dump($lang);
        dump($lang->id);
        dump($lang->title);*/








        return view('home.index', compact('users'));
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
