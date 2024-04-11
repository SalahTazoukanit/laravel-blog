@include("layouts.front.head")
@include("layouts.front.header")

<div class="container h-100 mt-5">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-10 col-md-8 col-lg-6">
            <h3>Edit a Post</h3>
            <form action="{{ route('posts.update', $post->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Title</label>
                    <input value="{{$post->title}}" type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="form-group">
                    <label for="body">Description</label>
                    <textarea class="form-control" id="body" name="description" rows="3" required>{{$post->description}}</textarea>
                </div>
                <div class="form-group">
                    <label for="body">Content</label>
                    <textarea class="form-control" id="body" name="content" rows="3" required>{{$post->content}}</textarea>
                </div>
                <div class="form-group">
                    <label for="body">Image</label>
                    <textarea class="form-control" id="body" name="image" rows="3" required></textarea>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Valider</button>
            </form>
        </div>
    </div>
</div>