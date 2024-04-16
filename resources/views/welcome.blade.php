@include("layouts.front.head")
@include("layouts.front.header")

<div class="flex flex-col gap-11  ">
@if ($posts)
    @foreach ($posts as $post )

        @if ($post->user)
            
            <div class="containerBlog  flex gap-4 items-center shadow-xl text-black bg-slate-100 rounded-md shadow-current">
                <img class="w-80 rounded-md" src="{{$post->image}}" alt="">
                <div>
                    <p>{{$post->title}}</p>
                    <p>{{$post->user->name}}</p>
                    <p>{{$post->description}}</p>
                    <p>Categorie :
                        @foreach ($post->categories as $categories)
                            {{ $categories->title }}
                        @endforeach
                    </p>
                </div>
            </div>
        @endif

    @endforeach 
@endif
</div>


@include("layouts.front.footer")
