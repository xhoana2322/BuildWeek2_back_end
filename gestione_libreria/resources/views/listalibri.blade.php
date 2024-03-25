<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Books') }}
        </h2>
    </x-slot>
    <div class="">
    <div class="">
                @foreach($books as $book)
                    <div class="cardBook bg-white overflow-hidden shadow-sm sm:rounded-lg flex my-2 mx-4">
                    <div class="col-md-2 col-sm-3">
                        @php
                            $image_url = $book->image;
                            $image_info = @getimagesize($image_url);
                        @endphp

                        @if ($image_info !== false)
                            <img src="{{ $image_url }}" class="w-full h-auto p-3" alt="{{ $book->title }}">
                        @endif
                    </div>
                        <div class="p-6 col-md-7 col-sm-7">
                            <p class="card-title font-semibold mb-2 h2">{{ $book->title }}</p>
                            <p class="card-subtitle text-gray-700 mb-2 ">{{ $book->author->name }}</p>
                            <p class="card-text text-secondary mb-2 fs-6">
                          
                            </p>
                            <div
                            class="pt-2"
                            style="border-top: 1px solid #F87060;">
                                <p class="plotText text-gray-700">{{ $book->plot }}</p>
                            </div>
                            
                            <div class="availableText mt-2">
                                <p class="{{ $book->AvailableAmount > 0 ? 'text-success' : 'text-secondary' }} d-flex align-items-center">
                                     <span class="h1">&bull;</span> <span>{{ $book->AvailableAmount > 0 ? 'Available' : 'Not Available' }}</span>
                                </p>
                            </div>

                            <div>
                                 <a href="{{ route('books.show', $book->id) }}"
                                 class="detailButton mt-4 btn btn-warning">View Details</a>
                            </div>
                        </div>
                        <div class="flex-column justify-between pt-4 col-md-3 col-sm-2">
                            
                          
                            <div style="height: 70%;"></div>
                            @if ($book->AvailableAmount  >0)
                            <div class="card-footer bg-transparent border-success text-right m-4">
                                <button class="reserveButton btn btn-outline-success">Reserve</button>
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

