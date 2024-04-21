@include("layouts.front.head")
@include("layouts.front.header")


    <form class="flex p-5" method="get">
        <div class="flex gap-11 flex-wrap">
            <label for=""><input type="checkbox" value="all"> Toutes les categories</label>
            @foreach ($categories as $categorie )
                <p> <input name="categories[]" value="{{ $categorie->id }}" type="checkbox"> {{ $categorie->title }} </p> 
            @endforeach
            
            <input class="bg-red border-solid rounded border-2 border-white" type="submit">
        </div>
    </form>

<div class="flex flex-col flex-wrap gap-5">
    @if ($posts)
        @foreach ($posts as $post )

            <a href="{{ route('post.show', $post ) }}">
                @if ($post->user)
                    
                    <div class="containerBlog h-50 flex gap-9 items-center shadow-xl text-black bg-slate-100 rounded-md shadow-current">

                        @if($post->image)
                            <img class="w-60 h-50 ml-1.5 rounded-md" src="{{ asset('storage/' . $post->image) }}" alt="">
                        @endif
                        <div>
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
        {{ $posts->WithqueryString()->links() }}
</div>


@include("layouts.front.footer")
