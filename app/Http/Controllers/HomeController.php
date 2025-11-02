<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;

class HomeController extends Controller
{

    public function index(): \Illuminate\Contracts\View\View
    {
        return view('home.index', ['title' => 'Home page']);
    }

    public function test()
    {
        return view('home.test', ['title' => 'Test page']);

    }

    public function contact()
    {
        $data = [
            'name' => 'John',
            'age' => 20,
        ];
        return view('home/contact', ['title' => '<i>Contact page</i>', 'data' => $data]);
    }

}
