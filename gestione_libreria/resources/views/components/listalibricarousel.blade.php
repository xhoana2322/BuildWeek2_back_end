<div class="container-fluid listaLibri mt-5">
    @forelse ($categories as $category)
    @if ($books->where('category_id', $category->id)->count() > 0)
    <p class="h1 mt-3 text-center text-sm-start nome_carosello">{{ $category->CategoryName }}</p>
    <div id="carouselCategory{{ $category->id }}" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($books->where('category_id', $category->id)->chunk(4) as $index => $chunk)
            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                <div class="d-flex align-items-center justify-content-center">
                    @foreach ($chunk as $book)
                    <div class="card bg-light my-3 col-lg-2 col-md-3 col-sm-4 border rounded-2 mx-3 libroCard">
                        <img src="{{ $book->image }}" class="card-img-top border rounded-2 immagine_card" alt="{{ $book->title }}">
                        <div class="card-body">
                            <div class="mb-1 border-bottom">
                                <p class="card-title fw-bold h5">{{ $book->title }}</p>
                                <p class="card-subtitle mb-2 text-muted h6">{{ $book->author->name }}</p>
                            </div>
                            <p class="card-text">{{ substr($book->plot, 0, 20) }}<span>...</span></p>
                            <a href="books/{{ $book->id }}" class="btn btn-primary tasto_dettaglio mt-2">Read more</a>
                            <div class="mt-2 d-flex justify-content-between align-items-center">
                                <form action="{{ route('reservation.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="book_id" value="{{ $book->id }}">
                                    @if ($book->AvailableAmount > 0 && !collect($userPendingReservations)->contains($book->id))
                                        <button type="submit" class="reserveButton btn btn-outline-success">Reserve</button>
                                    @endif
                                </form>
                                <p class="text-success fw-bold">{{ $book->AvailableAmount > 0 ? 'Available' : 'Not Available' }}</p>
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