
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
                
    <div class="flex flex-col gap-11  ">

    @foreach ($users as $user)

        <div class="flex gap-4">
            <p>{{ $user->name }}</p>
            <p>{{ $user->role }}</p>
            <p>{{ $user->email }}</p>
            <div class="flex gap-3">
                <a href="{{ route('user.edit',$user->id) }}">Modifier</a>
                <a href="{{ route('user.edit',$user->id) }}">Supprimer</a>
            </div>
        </div>
            
    @endforeach
       

    
    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

