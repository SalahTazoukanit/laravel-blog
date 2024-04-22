<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\View\View;
use App\Models\Categorie;


class CategorieController extends Controller
{
    public function form(){
        return view("formCategorie");
    }

    public function create(Request $request){

        $request->validate([
                    'title' => 'required|max:255',
                    'image' => 'sometimes|image|max:5000',
                    'description' => 'required',
                    ]);

        $categorie = new Categorie;
        $categorie->title = $request->title ;
        $categorie->description = $request->description ;
        $categorie->image = $request->image ;
        
        $categorie->save();

        $this->storeImage($categorie);

        return redirect()->route('listeCat')
        ->with('success', 'Post created successfully.');
    }

    
    public function showCategorie(): View
    {
        $categories = Categorie::all()->paginate(2);

        return view('listeCategorie', compact('categories'))
        ->with('success', 'Post created successfully.');
    }


    public function destroyCategorie($id)
    {
        $categories = Categorie::find($id);
        $categories->posts()->detach();
        $categories->delete();
        return redirect()->route('listeCat')
        ->with('success', 'Categorie deleted successfully');
    }


    public function updateCat(Request $request, $id)
    {
        $request->validate([
        'title' => 'required|max:255',
        'image' => 'sometimes|image|max:5000',
        'description' => 'required',
        ]);

        $categorie = Categorie::find($id);
        $categorie->title = $request->title ;
        $categorie->description = $request->description ;
        $categorie->update($request->all());
        $categorie->image = $request->image ;

        $this->storeImage($categorie);

        return redirect()->route('listeCat')
        ->with('success', 'Post updated successfully.');
    }
    
    
    public function editCat($id)
    {
      $categorie = Categorie::find($id);

      return view('editCategorie', compact('categorie'));
    }


    private function storeImage(Categorie $categorie){

        if (request('image')) {
            $categorie->update([
                "image"=> request('image')->store('images','public'),
            ]);
        }

    }
    

}
