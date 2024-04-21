@include("layouts.front.head")
{{-- @include("layouts.front.header") --}}

<div class="container h-100 mt-5">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-10 col-md-8 col-lg-6">
            <h3>Edit a Post</h3>
            <form action="{{ route('categorie.update', $categorie->id) }}" enctype="multipart/form-data" method="post">
                @csrf
                @method('PUT')
                <div class="form-control ">
                    <label for="title">Title</label>
                    <input value="{{$categorie->title}}" type="text" class="form-control flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md" id="title" name="title" required>
                </div>
                <div class="form-group">
                    <label for="body">Description</label>
                    <textarea class="form-control flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 w-2/5 h-40" id="body" name="description" rows="3" required>{{$categorie->description}}</textarea>
                </div>
                <div class="form-group">
                    <label for="body">Image</label>
                    <input type="file" class="form-control flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 w-2/5 h-20" id="body" name="image" rows="3" required>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Valider</button>
            </form>
        </div>
    </div>
</div>