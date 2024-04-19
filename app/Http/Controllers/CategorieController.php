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

        Categorie::create($request->all());

        // $categorie->posts()->attach($request->post);
        // $categorie->save();

        return redirect()->route('listeCat')
        ->with('success', 'Post created successfully.');
    }

    
    public function showCategorie(): View
    {
        $categories = Categorie::all();

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
        'image' => 'required',
        'description' => 'required',
        ]);
        $categorie = Categorie::find($id);
        $categorie->update($request->all());
        return redirect()->route('listeCat')
        ->with('success', 'Post updated successfully.');
    }
    
    
    public function editCat($id)
    {
      $categorie = Categorie::find($id);
      return view('editCategorie', compact('categorie'));
    }

    

}
