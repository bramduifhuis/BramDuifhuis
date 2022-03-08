<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1>{{$post->title}}</h1>
                    <p>{{$post->content}}</p>
                    <h4>made by:<br>{{$post->name}}</h4>
                    <h4>made on:<br>{{$post->created_at}}</h4>

                    @auth
                        
                    <a href="{{ route('posts.edit', $post->id)}}" class="btn btn-primary">Edit</a>
            
                    <form action="{{ route('posts.destroy', $post->id)}}" method="post" onsubmit="return confirm('Do you really want to delete the post?');">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                    @endauth
            
                </div>
            </div>
        </div>
    </div>
</x-app-layout>