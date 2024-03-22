<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista Libri') }}
        </h2>
    </x-slot>
    <div class="">
    <div class="">
                @foreach($books as $book)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex my-4 mx-4">
                        <div class="col-md-2 col-sm-3">
                            <img src="{{ $book->image }}" class="w-full h-auto p-3" alt="{{ $book->title }}">
                        </div>
                        <div class="p-6 col-md-7 col-sm-7">
                            <p class="card-title font-semibold mb-2 h2">{{ $book->title }}</p>
                            <p class="card-subtitle text-gray-700 mb-2 ">{{ $book->author->name }}</p>
                            <p class="card-text text-secondary mb-2 fs-6">
                          
                            </p>
                            <div
                            class="pt-2"
                            style="border-top: 1px solid rgb(229, 231, 235);">
                                <p class="text-gray-700">{{ $book->plot }}</p>
                            </div>
                            
                            <div class="mt-2">
                                <span class="{{ $book->AvailableAmount > 0 ? 'text-success' : 'text-secondary' }}">
                                    {{ $book->AvailableAmount > 0 ? 'Available' : 'Not Available' }}
                                </span>
                            </div>

                            <div>
                                 <a href="{{ route('books.show', $book->id) }}"
                                 class="mt-4 btn btn-warning">View Details</a>
                            </div>
                        </div>
                        <div class="flex-column justify-between pt-4 col-md-3 col-sm-2">
                            
                          
                            <div style="height: 70%;"></div>
                            @if ($book->AvailableAmount  >0)
                            <div class="card-footer bg-transparent border-success text-right m-4">
                                <button class="btn btn-outline-success">Reserve</button>
                            </div>
                            @endif
                            </div>
                        </div>
                    </div>
                @endforeach
    </div>
    </div>
                <div class="d-flex justify-content-center my-4">
                    {{ $books->links() }}
                </div>
</x-app-layout>
