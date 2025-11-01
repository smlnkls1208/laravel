<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;

class HomeController extends Controller
{

    public function index(): \Illuminate\Contracts\View\View
    {
        if(!View::exists('home.index')){
            abort(404);
        }
        return View::first(['home.index', 'home.contact', 'home.index'],  [
            'name' => 'John',
            'age' => 35,
            'title' => 'Home page']);


/*        return View::make('home.index', [
            'name' => 'John',
            'age' => 35,
            'title' => 'Home page']);*/
    }

    public function test()
    {
        $name = 'Katy';
        $age = 27;
        $title = 'Test page';
        return view('home/test', compact('name', 'age', 'title'));
    }

    public function contact()
    {
        $title = 'Title page';
        return view('home/contact')->with(['title' => $title]);
    }

}
