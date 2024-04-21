@include("layouts.front.head")
@include("layouts.front.header")


<form class="flex p-5" method="get">
    <div class="flex gap-11 flex-wrap">
        <label for=""><input type="checkbox" value="all"> Toutes les categories</label>
        @foreach ($categories as $categorie )
            <p> <input name="categories[]" value="{{ $categorie->id }}" type="checkbox"> {{ $categorie->title }} </p> 
        @endforeach
        
        <input class="bg-red rounded border-b-4 border-slate-700 text-red-700 hover:opacity-50" value="Envoyer" type="submit">
    </div>
</form>
<div class="flex flex-col flex-wrap gap-10">
    @if ($posts)
        @foreach ($posts as $post )

            <a href="{{ route('post.show', $post ) }}">
                @if ($post->user)
                    
                    <div class="containerBlog w-200 h-80 flex gap-10 items-center shadow-md text-black border-t-4 border-r-4  rounded-md hover:opacity-70">

                        @if($post->image)
                            <img class="w-60 h-50 ml-1.5 rounded-md" src="{{ asset('storage/' . $post->image) }}" alt="">
                        @else <img src="" class="w-60 h-50 ml-1.5 rounded-md" alt="">
                        @endif
                        <div class="max-h-30 overflow-y-auto">
                            <p>{{$post->title}}</p>
                            <p>{{$post->user->name}}</p>
                            <p>{{$post->description}}</p>
                            <p> 
                                @if ( $post->categories->count() !== 0)
                                    categorie:
                                @endif
                                @foreach ($post->categories as $categories)
                                    {{ $categories->title }}
                                @endforeach
                            </p>
                        </div>
                    </div>
                @endif
            </a>

        @endforeach 
    @endif
       <div class="">{{ $posts->WithqueryString()->links() }}</div> 
</div>


@include("layouts.front.footer")
