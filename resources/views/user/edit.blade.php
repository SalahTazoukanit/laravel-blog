@include("layouts.front.head")
{{-- @include("layouts.front.header") --}}
<div class="flex items-center gap-10 justify-center mt-5"> 
    <p class="text-2xl">Modifier l'utilisateur</p>
    <a href="{{ route("user.index") }}" class="text-l">Revenir</a>
</div>
<div class="container h-100 mt-5 flex items-center gap-3 justify-center">
    
    <form class="flex flex-col gap-5" action="{{ route('user.update', $user->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Nom</label><br>
            <input value="{{$user->name}}" type="text" class="w-96 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" id="title" name="name" required>
        </div>
        <div class="form-group">
            <label for="body">Email</label><br>
            <textarea class="w-96 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-10" id="body" name="email" rows="3" required>{{$user->email}}</textarea>
        </div>
        <div class="form-group">
            <label for="body">Role</label><br>
            <textarea class="w-96 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-3" id="body" name="role" rows="3" required>{{$user->role}}</textarea>
        </div>
        <br>
        <button type="submit" class="w-96 bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">Valider</button>
    </form>
</div>