<div class="container-fluid listaLibri mt-5">
    @forelse ($categories as $category)
    @if ($books->where('category_id', $category->id)->count() > 0)
    <p class="h1 mt-3 text-center text-sm-start nome_carosello">{{ $category->CategoryName }}</p>
    <div id="carouselCategory{{ $category->id }}" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($books->where('category_id', $category->id)->chunk(4) as $index => $chunk)
            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                <div class="d-flex justify-content-center">
                    @foreach ($chunk as $book)
                    <div class="card bg-light my-3 col-lg-2 col-md-3 col-sm-4 border rounded-2 mx-1 libroCard">
                        <img src="{{ $book->image }}" class="card-img-top border rounded-2 immagine_card" alt="{{ $book->title }}">
                        <div class="card-body">
                            <div class="mb-1 d-flex flex-column"
                            style="border-bottom: 1px solid #F87060 !important;">
                                <p class="card-title fw-bold h5"
                                    style="color: #468189 !important;"
                                >{{ $book->title }}</p>
                                <p class="card-subtitle mb-2 text-muted h6"
                                    style="color: rgba(70, 129, 137, 0.80) !important;"
                                >{{ $book->author->name }}</p>
                            </div>
                            <p class="card-text" style=" color: #102542 !important;">{{ substr($book->plot, 0, 20) }}<span>...</span></p>
                            <div class="d-flex align-items-center gap-2 mt-4 mb-3">
                                <i class="bi bi-circle-fill fs-6 text-success" style="font-size: 0.5rem !important;"></i>
                                <p class="text-success fw-bold fs-6 fw-light" style="font-size: 1rem !important;"> Available</p>
                            </div>
                            <div class="mt-2 gap-2 d-flex flex-column justify-content-between align-items-end">
                            @if ($book->AvailableAmount > 0 && !in_array($book->id, $userPendingReservations))
                            <form action="{{ route('reservation.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="book_id" value="{{ $book->id }}">
                                <button type="submit" class="btn btn-outline-success tasto_prenota">Reserve</button>
                            </form>
                        @endif
                                <a href="books/{{ $book->id }}" class="btn btn-primary tasto_dettaglio">View Details</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselCategory{{ $category->id }}" data-bs-slide="prev">
            <span class="carousel-control-prev-icon me-5" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselCategory{{ $category->id }}" data-bs-slide="next">
            <span class="carousel-control-next-icon ms-5" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    @endif
    @empty
    <p>Nessuna categoria disponibile</p>
    @endforelse
</div>