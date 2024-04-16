@include("layouts.front.head")
@include("layouts.front.header")

<div class="container h-100 mt-5">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-10 col-md-8 col-lg-6">
            <h3>Edit a Post</h3>
            <form action="{{ route('user.update', $user->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">name</label>
                    <input value="{{$user->name}}" type="text" class="form-control" id="title" name="name" required>
                </div>
                <div class="form-group">
                    <label for="body">email</label>
                    <textarea class="form-control" id="body" name="email" rows="3" required>{{$user->email}}</textarea>
                </div>
                <div class="form-group">
                    <label for="body">role</label>
                    <textarea class="form-control" id="body" name="role" rows="3" required>{{$user->role}}</textarea>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Valider</button>
            </form>
        </div>
    </div>
</div>