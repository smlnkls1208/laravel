<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{

    public function index(): \Illuminate\Contracts\View\View
    {
        $users = json_decode(file_get_contents('https://jsonplaceholder.typicode.com/users'), true);
//        $users = Http::get('https://jsonplaceholder.typicode.com/users')->json();
//        dump($users);

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
