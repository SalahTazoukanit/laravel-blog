<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Models\Categorie;

class pageController extends Controller
{
    //
    public function legals(): View
    {


        return view('legals', [
            'title' => 'Legals',
            'content'=>'lorem ipsum',
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

            'posts' => Post::all(), 

        ]);
    }

    public function listeCat(): View
    {
        return view('listeCategorie',[

            'categories' => Categorie::all(), 

        ]);
    }

}
