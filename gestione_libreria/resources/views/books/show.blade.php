<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $book->title ? $book->title . __(' Detail Page') : ' Book Detail Unavaliable' }}
        </h2>
    </x-slot>

    <div class="container my-5">
        <div class="d-flex ">

            <!--  Book Image -->
            <div class="col-md-3 mb-4">
                <img src="{{ $book->image}}" alt="{{ $book->title }} " class="img-fluid shadow">
            </div>

            <div class="col-md-9 col-sm-12 ms-2">
                <h1 class="fs-5 mb-3"><strong>{{ $book->title ?? 'Title not avaliable' }}</strong></h1>

                <p class="mb-3"><strong>Author:</strong> {{ $book->author->name ?? 'Author details not available' }}</p>

                <p class="mb-3"><strong>Available copies:</strong> {{ $book->AvailableAmount ?? 'Not specified' }}</p>

                @if ($book->AvailableAmount <= 0)
                    <a href="#" class="btn btn-primary btn-sm disabled">Reserve</a>
                @else
                    <form action="{{ route('book.reserve', $book->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary btn-sm">Reserve</button>
                    </form>
                @endif

                @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{(session('success'))}}
                </div>
                @endif

            </div>
        </div>
        <div class="mt-4">
            <h2><strong>Plot</strong></h2>
            <p> {{ $book->plot }} </p>
        </div>
    </div>


</x-app-layout>