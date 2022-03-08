<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Welcome to my blog page <br>

                    @if ($stats["messageCount"] ==1)
                    There is {{$stats["messageCount"]}} post <br>
                        
                    @else
                    There are {{$stats["messageCount"]}} posts <br>
                        
                    @endif
                    
                    
                    @if ($stats["userCount"]==1)
                    There is {{$stats["userCount"]}} user <br>
                        
                    @else
                    There are {{$stats["userCount"]}} users <br>

                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>