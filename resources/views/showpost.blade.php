@if ($post)
            
    <div class="containerBlog  flex gap-4 items-center shadow-xl text-black bg-slate-100 rounded-md shadow-current">
        @if($post->image)
            <img class="w-80 h-50 ml-1.5 rounded-md" src="{{ asset('storage/' . $post->image) }}" alt="">
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