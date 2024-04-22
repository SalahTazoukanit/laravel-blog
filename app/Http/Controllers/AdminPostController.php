<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models;
use App\Models\Categorie;
use Illuminate\Support\Facades\Auth;

class AdminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request){

      
        //pour filtrer les categories
        $categories = Categorie::all();
        
        $categoriesAll= $request->categories;

        $query = Post::query();

        if(auth()->user()->role === 'admin') {

            if(!empty($categoriesAll)) {
                //filtrage selon l'id de la categorie/post ;
                $query->whereHas('categories', function ($query) use ($categoriesAll) {
                    $query->whereIn('categories.id', $categoriesAll);
                });

            }else if($categoriesAll === "all") { 
                //posts = Post::all();
                $query->all();
            }
            //execute la requette;
            $posts = $query->paginate(4);

        }//si ce n'est pas admin (dans le dashboard je vois que mes posts) et le champs pour filtrer est vide ;
        else if(auth()->user()->role !== 'admin' && empty($categoriesAll) ) {
            //recuperer que ses propre posts ;
            $posts = Post::where('user_id', Auth::user()->id)->paginate(4) ;

        }else if(auth()->user()->role !== 'admin' && !empty($categoriesAll) ){
            
            $query->where('user_id', Auth::user()->id);

            $query->whereHas('categories', function ($query) use ($categoriesAll) {
                $query->whereIn('categories.id', $categoriesAll); 

            });
            //execute la requette ;
            $posts = $query->paginate(4);          
            
        }
        
        return view('dashboard', compact('posts','categories'));
    }
         
    public function create()
    {
        $categories = Categorie::all();
        return view('create',[
            'categories'=>$categories,
        ]);
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
            'image' => 'nullable|image|max:5000',
        ]);

            $post = new POST ;
            $post->title = $request->title ;
            $post->content = $request->content ;
            $post->description = $request->description ;
            $post->user_id = Auth::id();
            $post->image = $request->image ;
           
            $post->save();

            //pour lier le post à un categorie_id ..la fonction categorie est dans la relations model Post;
            $post->categories()->attach($request->categories);
            
            $this->storeImage($post);

            return redirect()->route('dashboard')
            ->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        // $users = User::all();
        // $singlepost = Post::findOrFail($post);
        // dd($posts);
        return view("showpost",compact('post'));

    }

//function edit pur rediriger dans le formulaire
    public function edit($id)
  {
    $categories = Categorie::all();
    $post = Post::find($id);
    return view('edit', compact('post','categories'));
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
        'image' => 'sometimes|image|max:5000',
    ]);

    $catgories = Categorie::all();
    $post = Post::find($id);
    $post->update($request->all());

    $this->storeImage($post);

    return redirect()->route('dashboard')
      ->with('success', 'Post updated successfully.');
  }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {   
        // dd($request);

        $post = Post::find($id);
        $post->categories()->detach();
        $path = public_path('storage/'. $post->image);
        unlink($path);
        $post->delete();
        
        return redirect()->route('dashboard')
        ->with('success', 'Post deleted successfully');
        
    }


    private function storeImage(Post $post){

        if (request('image')) {
            $post->update([
                "image"=> request('image')->store('images','public'),
            ]);
        }

    }


    // private function validator(){
        
    //     return $request->validate([
    //         'title' => 'required|max:255',
    //         'content' => 'required',
    //         'description' => 'required',
    //         'image' => 'required',
    //         ]);

    // }
}
