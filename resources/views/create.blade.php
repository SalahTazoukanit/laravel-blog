@include("layouts.front.head")
{{-- @include("layouts.front.header") --}}

<div class="container flex flex-col ">
    <div class=" row h-100 justify-content-center align-items-center">
        <div class="col-10 col-md-8 col-lg-6">
            <h3>AJOUTER UN POST</h3>
            <form action="{{ route('posts.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class=" form-control flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md" id="title" name="title" required>
                </div>
                <div class="form-group">
                    <label for="body">Description</label>
                    <textarea class="form-control flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 w-2/5 h-40" id="body" name="description" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="body">Content</label>
                    <textarea class="  form-control flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 w-2/5 h-40" id="body" name="content" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="body">Image</label>
                    <textarea class=" form-control flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 w-2/5 h-20" id="body" name="image" rows="3" required></textarea>
                </div>
                <div class="form-group">
                
                    @foreach ($categories as $categorie)
                        <input type="checkbox" name="categories[]" id="" value="{{ $categorie->title }}">{{ $categorie->title }}</input>
                    @endforeach
                    
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Ajouter le Post</button>
            </form>
        </div>
    </div>
</div>