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
                        
                        <h1 class="size-28">CATEGORIES</h1>
                        <div><a href="{{route('form.categorie')}}"><button>ajouter Categorie</button></a></div>
                    </div>
                    
                <div class="flex flex-col gap-11  ">

                    <div class="flex flex-col gap-2">
                        @if ($categories)
                            
                            @foreach($categories as $categorie )

                                <div class="containerBlog  flex gap-4 items-center shadow-xl text-black bg-slate-100 rounded-md shadow-current">
                                    <img src="{{$categorie->image}}" class="w-80 rounded-md">
                                    <p>{{$categorie->title}}</p>
                                    <p>{{$categorie->description}}</p>

                                    <form action="{{ route('categories.destroy', $categorie->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                    <div class="col-sm">
                                        <a href="{{ route('categorie.edit', $categorie->id) }}"
                                            class="btn btn-primary btn-sm">Modifier</a>
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