<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Your posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="collum">
                        @foreach($posts as $post)
                              {{-- {{var_dump($post)}} --}}
                            <h4>made on:<br>{{$post->created_at}}</h4>

                            <h1>{{$post->title}}</h1>
                            <p>{{$post->content}}</p>
                            <h4>made by:<br>{{$post->name}}</h4>
                            <a href="{{ route('posts.show', $post->id)}}">show more</a>
                            @if (!$loop->last)
                            <br>
                            <br>
                            <hr>
                            <br>
                            @endif
                             
                        @endforeach
                      </div>
                   
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
