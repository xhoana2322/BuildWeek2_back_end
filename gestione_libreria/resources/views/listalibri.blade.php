<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista Libri') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8"> 
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-4">
                @foreach($books as $book)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex">
                        <div class="w-full">
                            <img src="{{ $book->image }}" class="w-full h-auto" alt="{{ $book->title }}">
                        </div>
                        <div class="w-full p-6">
                            <h3 class="text-xl font-semibold mb-2">{{ $book->title }}</h3>
                            <p class="text-gray-700 mb-2">Author: {{ $book->author->name }}</p>
                            <p class="text-gray-700 mb-2">Categories:
                                @foreach($book->categories as $category)
                                    {{ $category->name }}@if(!$loop->last),@endif
                                @endforeach
                            </p>
                            <p class="text-gray-700">{{ $book->plot }}</p>
                        </div>
                        <div class="w-full flex-column items-center justify-between pt-4">
                            <div class="text-end pe-4">
                                @if ($book->status === "Available")
                                    <span>tuo</span>
                                    <i class="fas fa-circle text-success"></i>
                                @else
                                    <span>suca</span>
                                    <i class="fas fa-circle text-danger"></i>
                                @endif
                            </div>

                            <button class="btn btn-primary btn-sm mr-2 mb-2 w-full text-center hover:bg-blue-800 align-self-end">
                                Button
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
