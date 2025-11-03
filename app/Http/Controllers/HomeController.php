<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function index(): \Illuminate\Contracts\View\View
    {
        $users = [];

//        $users = DB::table('users')->get(['id', 'name', 'email']);
//        $users = DB::table('users')->where('id', 3)->first();
//        $users = DB::table('users')->where('id', '>', 3)->get();
//        $users2 = DB::table('users')->where('id', '>', 3)->value('name');
//        dump($users2);
//        $users = DB::table('users')->where('id', '<', 10)->orderByDesc('id')->get();
//        $users2 = DB::table('users')->find(3, ['id', 'name', 'email']);
//        $users2 = DB::table('users')->pluck('name', 'email');
//        dump($users2);

//        $cities = DB::table('city')->get();

//        DB::table('city')->orderBy('ID')->chunk(100, function (Collection $cities) {
//            foreach ($cities as $city) {
//                if ($city->Name == 'Salvador') {
//                    return false;
//                }
//            }
//        });
//        $cities = DB::table('city')->select('ID', 'Name')->limit(10)->get();

/*        $cities = DB::table('city')
            ->where([['ID', '>', 3],['ID', '<', 10]])
            ->orWhere('ID', '<', 20)
            ->get();*/

/*        $cities = DB::table('city')
            ->whereRaw('(ID between ? and ? and Name != ?) or (ID = ?)', [2, 10, 'Qandahar', 1])
            ->get();*/

//        $cities = DB::table('city')->count();

//        $cities = DB::table('city')->max('Population');

//        $cities = DB::table('city')->min('Population');

        $cities = DB::table('city')
            ->orderBy('Population', 'desc')
            ->first('Population');

        dump($cities->Population);


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
