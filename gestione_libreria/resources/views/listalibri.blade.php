<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista Libri') }}
        </h2>
    </x-slot>
    @foreach($books as $book)
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex my-4 mx-4">
        <div class="col-md-2 col-sm-3">
            <img src="{{ $book->image }}" class="w-full h-auto p-3" alt="{{ $book->title }}">
        </div>
        <div class="p-6 col-md-7 col-sm-7">
            <p class="font-semibold mb-2 h2">{{ $book->title }}</p>
            <p class="text-gray-700 mb-2 ">{{ $book->author->name }}</p>
            <p class="text-secondary mb-2 fs-6">
                Category: {{ $book->category->CategoryName }}
            </p>
            <div class="pt-2" style="border-top: 1px solid rgb(229, 231, 235);">
                <p class="text-gray-700">{{ $book->plot }}</p>
            </div>
        </div>
        <div class="flex-column justify-between pt-4 col-md-3 col-sm-2">
            <div class="pe-4 text-end d-flex align-items-center justify-content-end">
                @foreach($reservations as $reservation)
                @if ($reservation->book_id === $book->id)
                @if ($reservation->status === "Available")
                <i class="fas fa-circle text-success me-1"></i>
                <span class="text-success">Libro disponibile</span>
                @elseif ($reservation->status === "Pending")
                <i class="fas fa-circle text-warning me-1"></i>
                <span class="text-warning">In attesa di risposta</span>
                @else
                <i class="fas fa-circle text-secondary me-1"></i>
                <span class="text-secondary">Non disponibile</span>
                @endif
                @endif
                @endforeach
            </div>
            <div style="height: 70%;"></div>
            @if ($book->status === "Available")
            <div class="row">
                <div class="col-8"></div>
                <button class="btn btn-outline-danger btn mr-2 mb-2 align-self-end col-3">
                    MI NASCONDO
                </button>
            </div>
            @endif
        </div>
    </div>
    @endforeach


</x-app-layout>