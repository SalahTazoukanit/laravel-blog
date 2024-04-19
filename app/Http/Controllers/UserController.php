<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Categorie;
use App\Models\Post;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view("user.index",[
            'users'=>$users,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

//function edit pur rediriger dans le formulaire
    public function edit($id)
    {
        $user = User::find($id);
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'role' => 'required',
            'email' => 'required',

        ]);
        $user = User::find($id);
        $user->update($request->all());
        return redirect()->route('user.index')
          ->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id){
    // $categories = Categorie::all();
    // dd($posts);
    
    
    $user = User::find($id);
    $posts = Post::all()->where('user_id', $id);

        $user->delete();

        foreach ($posts as $post) { 
            $post->categories()->detach();
            $post->delete();
        }
       

        return redirect()->route('user.index')
        ->with('success', 'User deleted successfully');
    }
}
