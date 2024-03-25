<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('I miei libri') }}
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
        <div class="pt-4 col-md-3 col-sm-2">
            <div class="d-flex flex-col pe-4 text-end">
                @foreach($reservations as $reservation)
                @if ($reservation->book_id === $book->id)
                @if ($reservation->status === "Available")
                <div class="mb-5">
                    <i class="fas fa-circle text-success"></i>
                    <span class="text-success">Available</span>
                </div>
                @elseif ($reservation->status === "Pending")
                <div class="mb-5">
                    <i class="fas fa-circle text-warning"></i>
                    <span class="text-warning">Pending</span>
                </div>
                @else
                <div class="mb-5">
                    <i class="fas fa-circle text-secondary"></i>
                    <span class="text-secondary">Not available</span>
                </div>
                @endif

                @if ($reservation->status === "Available")
                <div class="mt-5">
                    <form action="{{ route('reservation.return', $reservation->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger btn-sm">
                            Return book
                        </button>
                    </form>
                </div>
                @elseif ($reservation->status === "Pending")
                <div class="mt-5">
                    <form action="{{ route('reservation.return', $reservation->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger btn-sm">
                            Cancel request
                        </button>
                    </form>
                </div>
                @endif
                @endif
                @endforeach
            </div>
            <div style="height: 70%;"></div>
        </div>
    </div>
    @endforeach


</x-app-layout>