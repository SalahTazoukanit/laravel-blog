@include("layouts.front.head")
{{-- @include("layouts.front.header") --}}

<div class="container mt-5 mb-5 h-100">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-10 col-md-8 col-lg-6">
            <div class="flex justify-center gap-20 items-center mb-5">
                <div class="flex text-2xl">Modifier le post</div>
                <a class="text-l" href="{{ route("dashboard") }}">Revenir au dashboard</a>
            </div>
            <form class="flex flex-col items-center gap-3" action="{{ route('posts.update', $post->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="title">Title</label><br>
                    <input value="{{$post->title}}" type="text" class=" w-96 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" id="title" name="title" required>
                </div>
                <div class="form-group">
                    <label for="body">Description</label><br>
                    <textarea class="w-96 overflow-y-hidden rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-10" id="body" name="description" rows="3" required>{{$post->description}}</textarea>
                </div>
                <div class="form-group">
                    <label for="body">Content</label><br>
                    <textarea class="w-96 overflow-y-hidden rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-10" id="body" name="content" rows="3" required>{{$post->content}}</textarea>
                </div>
                <div class="form-group">
                    <label for="body">Image</label><br>
                    <input class="bg-white border-0 mb-5" name="image" type="file" value="{{ $post->image }}" class="@error('image') is-invalid @enderror ">
                    @error('image')
                      <p class="invalid-feedback"> {{ $errors->first('image') }} </p> 
                    @enderror
                </div>
                <div class="form-group flex items-center gap-3">
                    @if(count($categories) > 0)
                    
                        @foreach ($categories as $categorie)
                        <input name="categories[]" type="checkbox" value="{{ $categorie->id }}" @if($post->categories->contains($categorie->id)) checked @endif > {{ $categorie->title }}  
                        @endforeach

                    @endif
                </div>
                <br>
                <button class="w-96 bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow" type="submit" class="btn btn-primary">Valider</button>
            </form>
        </div>
    </div>
</div>