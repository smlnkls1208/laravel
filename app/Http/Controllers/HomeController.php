<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;

class HomeController extends Controller
{

    public function index(): \Illuminate\Contracts\View\View
    {
        return view('home.index', ['title2' => 'Home page', 'description' => 'Test desc', 'test' => 'test value']);
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
