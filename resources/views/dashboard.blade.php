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
                    
                    <h1 class="size-28">MES POSTS</h1>
    <div class="flex flex-col gap-11  ">
    @if ($posts)
        @foreach ($posts as $post )
    
            <div class="containerBlog  flex gap-4 items-center shadow-xl text-black bg-slate-100 rounded-md shadow-current">
                <img class="w-80 rounded-md" src="{{$post->image}}" alt="">
                <div>
                    <p>{{$post->title}}</p>
                    <p>{{$post->description}}</p>
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

