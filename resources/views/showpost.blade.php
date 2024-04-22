
@vite(['resources/css/app.css', 'resources/js/app.js'])
<div class="flex items-center">
    <p class="text-3xl text-red-800 m-5 ">Blog</p>
</div>
@if ($post)
    <p class="ml-5 text-6xl font-mono">{{$post->title}}</p>
@endif 
<div class="flex flex-col items-center justify-center gap-5">
    @if ($post)
        
        @if($post->image)
            <img class="imgPost w-80" src="{{ asset('storage/' . $post->image) }}" alt="">
        @endif  
        <div class="flex flex-col">
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
    @endif
</div>