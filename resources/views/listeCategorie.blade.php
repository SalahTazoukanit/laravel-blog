<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg"> --}}
                <div class="flex justify-around text-gray-700 dark:text-gray-100">
                    <h1 class="size-28">CATEGORIES</h1>
                    <a class="size-28 hover:text-sky-900" href="{{route('form.categorie')}}"><button>AJOUTER UNE CATEGORIE</button></a>
                </div> 
                <div class="flex flex-col gap-11">

                    <div class="flex flex-col gap-2">
                        @if ($categories)
                            
                            @foreach($categories as $categorie )

                                <div class="containerBlog w-200 h-32 flex gap-10 items-center shadow-xl text-white bg-slate-800 rounded-md ">
                                   @if ($categorie->image)
                                   <img class="w-60 h-28 ml-1.5 rounded-md" src="{{ asset('storage/' . $categorie->image) }}" alt="">
                                   @endif
                                    <p>Categorie :<br>{{$categorie->title}}</p>
                                    <p>Description :<br>{{$categorie->description}}</p>
                                    <div class="col-sm">
                                        <a href="{{ route('categorie.edit', $categorie->id) }}" class="btn btn-primary btn-sm">Modifier</a>
                                    </div> 
                                    <form action="{{ route('categories.destroy', $categorie->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                                    </form>
                                </div>   
                              
                            @endforeach

                        @endif
                    </div>
                    {{-- {{ $categories->links() }} --}}
                </div>
               
            </div>
        </div>
    </div>
</x-app-layout>