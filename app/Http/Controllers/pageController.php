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


    public function welcome(Request $request): View
    {
        
        $categories = Categorie::all();

        $categoriesAll= $request->categories;

        $query = Post::query();

        if(!empty($categoriesAll)) {
            //filtrage selon l'id de la categorie/post ;
            $query->whereHas('categories', function ($query) use ($categoriesAll) {
                $query->whereIn('categories.id', $categoriesAll);
            });

        }else if($categoriesAll === "all") { 
            
            $query->all();
        }

        $posts = $query->paginate(5);

        return view('welcome',compact('posts','categories')); 
            
        }

    public function listeCat(): View
    {
        return view('listeCategorie',[

            'categories' => Categorie::all(),

        ]);
    }

}
