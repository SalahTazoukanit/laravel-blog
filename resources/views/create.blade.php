@include("layouts.front.head")
@include("layouts.front.header")

<div class="container h-100 mt-5 ">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-10 col-md-8 col-lg-6">
            <h3>Add a Post</h3>
            <form action="{{ route('posts.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="form-group">
                    <label for="body">Description</label>
                    <textarea class="form-control" id="body" name="description" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="body">Content</label>
                    <textarea class="form-control" id="body" name="content" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="body">Image</label>
                    <textarea class="form-control" id="body" name="image" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    {{-- <input name="categories[]" value="1" type="checkbox">1
                    <input name="categories[]" value="2" type="checkbox">2
                    <input name="categories[]" value="3" type="checkbox">3
                    <input name="categories[]" value="4" type="checkbox">4
                    <input name="categories[]" value="5" type="checkbox">5 --}}
                   

                    @foreach ($categories as $categorie)
                        <input type="checkbox" name="categories[]" id="" value="">{{ $categorie->title }}</input>
                    @endforeach
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Create Post</button>
            </form>
        </div>
    </div>
</div>