<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                <div class="flex">
                    <h1 class="size-28">MES POSTS</h1>
                    @if (Auth::user()->role === "admin")
                        <a href="{{route("listeCat")}}"><h1 class="size-28">CATEGORIES</h1></a>
                    @endif
                </div>  
    <div class="flex flex-col gap-11  ">

        <div><a href="{{route('posts.create')}}">ajouter</a></div>
       

            @if (Auth::user()->role === "admin")
                <a href="{{route('form.categorie')}}"><button>ajouter Categorie</button></a>
            @endif
        

    @if ($posts)
        @foreach ($posts as $post )                
            
                <div class="containerBlog  flex gap-4 items-center shadow-xl text-black bg-slate-100 rounded-md shadow-current">
                    <img class="w-80 rounded-md" src="{{$post->image}}" alt="">
                    <div>
                        <p>{{$post->title}}</p>
                        <p>{{$post->user->name}}</p>
                        <p>{{$post->description}}</p>
                        {{-- <div class="categories">Categorie:{{$post->categories}}</div> --}}
                       <p>Categorie :
                            @foreach ($post->categories as $categories)
                            {{ $categories->title }}
                            @endforeach
                        </p> 
                    </div>
                    <div class="col-sm">
                        <a href="{{ route('posts.edit', $post->id) }}"
                            class="btn btn-primary btn-sm">Modifier</a>
                    </div>
                    <div class="col-sm">
                        <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </div>

        @endforeach  
    @endif
    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

