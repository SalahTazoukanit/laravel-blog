<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class pageController extends Controller
{
    //
    public function legals(): View
    {

        $items = [
            "item1",
            "item2",
            "item3",
            "item4",
        ];


        return view('legals', [
            'title' => 'Legals',
            'content'=>'lorem ipsum',
            "items"=>$items,
        ]);
    }

    public function about(): View
    {
        return view('about',[
            'title' => 'About Us',
            'content'=>'lorem ipsum 2',
        ]);
    }


    public function welcome(): View
    {
        return view('welcome',[
            'title' => 'Welcome to te jungle',
            'content'=>'lorem ipsum 2',
        ]);
    }
}
