<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class AdminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
    
        $posts = Post::all();
        return view('dashboard', compact('posts'));
        
    }
         
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'description' => 'required',
            'image' => 'required',
            ]);
            Post::create($request->all());
            return redirect()->route('dashboard')
            ->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

//function edit pur rediriger dans le formulaire
    public function edit($id)
  {
    $post = Post::find($id);
    return view('edit', compact('post'));
  }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
  {
    $request->validate([
        'title' => 'required|max:255',
        'content' => 'required',
        'description' => 'required',
        'image' => 'required',
    ]);
    $post = Post::find($id);
    $post->update($request->all());
    return redirect()->route('dashboard')
      ->with('success', 'Post updated successfully.');
  }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('dashboard')
        ->with('success', 'Post deleted successfully');
        
    }

}
