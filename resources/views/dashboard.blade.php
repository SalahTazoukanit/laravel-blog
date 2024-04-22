<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="">
                        <h1 class="flex justify-center items-center"> POSTS</h1>

                        <form class="flex p-5 mb-5 gap-5 flex-wrap items-center justify-center" method="get">
                            <input type="checkbox" value="all"> Toutes les categories<br>

                            @foreach ($categories as $categorie )
                            <p><input name="categories[]" value="{{ $categorie->id }}" type="checkbox"> {{ $categorie->title }}</p> 
                            @endforeach
                            <input class="bg-red rounded border-b-4 border-slate-700 hover:opacity-50" type="submit">
                        </form>
                    </div>  
                    <div class="flex flex-col flex-wrap gap-5 ">
                        @if ($posts)
                            @foreach ($posts as $post )                
                                <a href="{{ route('post.show', $post) }}" >
                                    <div class="containerBlog w-200 h-80 flex gap-10 items-center shadow-xl text-black bg-slate-100 rounded-md shadow-current">
                                        @if($post->image)
                                            <img class="w-60 h-50 ml-1.5 rounded-md" src="{{ asset('storage/' . $post->image) }}" alt="">
                                            @else <img src="" class="w-60 h-50 ml-1.5 rounded-md" alt="">
                                        @endif
                                        <div class="h-30 max-w-100 ">
                                            <h2>{{$post->title}}</h2>
                                            <p>{{$post->user->name}}</p>  
                                            <p>{{$post->description}}</p>
                                            {{-- pour afficher ou pas afficher categorie  --}}
                                            @if ( $post->categories->count() !== 0)
                                                categorie:
                                            @endif
                                            @foreach ($post->categories as $categories)
                                                {{ $categories->title }}
                                            @endforeach
                                        </div>   
                                    </div>
                                    <div class="flex justify-center gap-10 ">
                                        <div class=" col-sm">
                                            <a href="{{ route('posts.edit', $post->id) }}"
                                                class="btn btn-primary btn-sm">Modifier</a>
                                        </div>
                                        <div class="col-sm">
                                            <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                                            </form>
                                        </div>
                                    </div>
                                </a>
                            @endforeach  
                        @endif
                    </div>
                    {{   $posts->WithqueryString()->links() }}               
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

