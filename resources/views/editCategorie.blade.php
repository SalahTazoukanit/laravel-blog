@include("layouts.front.head")
{{-- @include("layouts.front.header") --}}


<div class="container gap-5 flex flex-col items-center justify-center p-10 h-100 mt-5">
    <div class="flex gap-10">
        <p class="text-xl">Nouvelle categorie</p>
        <a href="{{ route("listeCat") }}">Revenir aux listes</a>
    </div>
    <form action="{{ route('categorie.update', $categorie->id) }}" enctype="multipart/form-data" method="post">
        @csrf
        @method('PUT')
        <div class="form-control ">
            <label for="title">Title</label><br>
            <input value="{{$categorie->title}}" type="text" class="w-96 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="body">Description</label><br>
            <textarea class="w-96 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-10" id="body" name="description" rows="3" required>{{$categorie->description}}</textarea>
        </div>
        <div class="form-group">
            <label for="body">Image</label><br>
            <input type="file" class="bg-white border-0 mb-5" id="body" name="image" rows="3" >
        </div>
        <br>
        <button type="submit" class="w-96 bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">Valider</button>
    </form>
</div>