<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create a post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                        <div class="card uper">
                            <div class="card-header">
                                Add Post
                            </div>
                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div><br />
                                @endif
                            <form method="post" action="{{ route('posts.store') }}">
                                <div class="form-group">
                                    @csrf
                                    <label for="title">Post title:</label>
                                    <input type="text" class="form-control" name="title"/>
                                </div>
                                <div class="form-group">
                                    <label for="content">Post content:</label>
                                    <textarea type="text" class="form-control" name="content"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Add Post</button>
                            </form>
                        </div>
                    </div>   
                </div>
            </div>
        </div>
    </div>
</x-app-layout>