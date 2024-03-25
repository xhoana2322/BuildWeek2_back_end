<style>
    @property --k {
    syntax: '<number>';
    initial-value: -1;
    inherits: true;
}

.spec {
    --m: 1;
    grid-area: 2/ 1/ span 1/ span 2;
    position: relative;
    margin: 1em;
    border: solid 2em transparent;
    padding: 1.5em 3.25em;
    border-radius: 5em;
    box-shadow: inset 0 0 1px #23429e;
    background:
        radial-gradient(#92372d, 67.5%, #F87060) padding-box,
        radial-gradient(#a0c2ed, 35%, #a0c2ed00 70%) 50% 0/ 80% 50% repeat-y;
    color: #f2fdfe;
    font: 700 1.5em/ 1 montserrat, sans-serif;

    #slow:checked ~ & {
        --m: 5;
    }
}

@keyframes k {
    0%, 33.3% {
        --k: 1;
    }
}

.particle {
    --f: 1;
    --pos-k: max(0, var(--k));
    --neg-k: max(0, -1 * var(--k));
    --low-c: min(1, 4 * (1 - var(--pos-k)));
    --abs-d: max(var(--neg-k) - .5, .5 - var(--neg-k));
    --mov-f: var(--pos-k);
    display: grid;
    position: absolute;
    left: var(--x);
    top: var(--y);
    rotate: var(--a);
    animation: k calc(var(--m) * 1.5s) linear calc(var(--m) * var(--t, 0) * 1.5s) infinite;

    @supports (scale: sqrt(4)) {
        --mov-f: sqrt(var(--pos-k));
    }

    &::before,
    &::after {
        grid-area: 1/ 1;
        width: .75em;
        aspect-ratio: 1;
    }

    &::before {
        --sa: calc(min(1, 1 - 2 * min(.5, var(--mov-f))) * 45deg);
        border-radius: calc(1.25 * min(.8, var(--mov-f)) * 50%) 50% 50%;
        transform-origin: 0 0;
        translate: calc(var(--mov-f) * var(--d));
        rotate: -45deg;
        scale: var(--f);
        transform: skew(var(--sa), var(--sa));
        opacity: var(--low-c);
        filter: Saturate(var(--low-c));
        background: radial-gradient(at 85% 85%, #bad9fa, #3e66a4 75%);
        content: '';
    }

    &::after {
        translate: -50% -50%;
        scale: calc(var(--f) * (1 - 2 * var(--abs-d)));
        text-align: center;
        filter: blur(.5px);
        content: '✦';
    }
}
</style>

<x-app-layout>
    <div class="d-flex h-55vh w-100 items-center justify-content-between px-10 my-4">
        <div class="max-w-4xl mx-auto px-6 px-lg-8">
            <div class="bg-white rounded-lg shadow-xl overflow-hidden">
                <div class="container row">
                    <!-- Book Image -->
                    <div class="col-12 col-md-6 col-lg-4 m-2 d-flex justify-content-center bg-fixed">
                        <img src="{{ $book->image }}" alt="{{ $book->title }}" loading="lazy" class="inset-0 ms-auto w-100 h-100 rounded-bottom-start object-cover object-center mx-2">
                       
                    </div>
                    <!-- Book Details -->
                    <div class="col-12 col-md-6 col-lg-6 container my-4 mx-auto mt-28">
                        <div class="row text-lg-left">
                            <div class="relative bg-clip-border text-gray-700 rounded-xl border border-white p-8">
                                <p class="font-weight-bold text-blue-gray-900 lg-text-5xl !leading-snug text-3xl lg-max-w-3xl" style='font-size: 2rem;' >{{ $book->title ?? 'Title not available' }}</p>
                                <p class="font-sans text-xl font-normal leading-relaxed text-inherit mb-10 mt-2 !text-gray-900 mb-1"><author>Author: <span class="fst-italic"> {{ $book->author->name ?? 'Author details not available' }}<span class="fst-normal">, {{$book->year}} </span> </span></author></p>
                                <!-- Rating and Reservation -->
                                <div class="mb-8 d-flex  gap-4 lg-justify-start my-3">
                                <p class="text-base text-yellow-600  lg-justify-end ">Rating: <span class="font-weight-bold">4.5</span></p>
                                    <svg  version="1.1" id="Capa_1"   
                                        viewBox="0 0 47.94 47.94" width="20" height="20">
                                        <path style="fill:#ED8A19;" d="M26.285,2.486l5.407,10.956c0.376,0.762,1.103,1.29,1.944,1.412l12.091,1.757
                                            c2.118,0.308,2.963,2.91,1.431,4.403l-8.749,8.528c-0.608,0.593-0.886,1.448-0.742,2.285l2.065,12.042
                                            c0.362,2.109-1.852,3.717-3.746,2.722l-10.814-5.685c-0.752-0.395-1.651-0.395-2.403,0l-10.814,5.685
                                            c-1.894,0.996-4.108-0.613-3.746-2.722l2.065-12.042c0.144-0.837-0.134-1.692-0.742-2.285l-8.749-8.528
                                            c-1.532-1.494-0.687-4.096,1.431-4.403l12.091-1.757c0.841-0.122,1.568-0.65,1.944-1.412l5.407-10.956
                                            C22.602,0.567,25.338,0.567,26.285,2.486z"/>
                                    </svg>
                                  
                                   
                                </div>
                                <div class="pt-3">
                                    <h3 class="text-xl font-weight-bold text-gray-900">Plot</h3>
                                    <p class="mt-2 text-base text-gray-600">{{ $book->plot ?? 'Plot details not available.' }}</p>
                                    <div class="d-flex justify-content-center align-content-center mt-6">
                                            <p class="font-sans font-normal leading-relaxed text-gray-900 mb-2">
                                                <span>{{ $book->category->CategoryName ?? 'Category not available' }}</span>
                                            </p>
                                            <p> | </p>
                                            <!-- <i class="bi bi-dot"></i> -->
                                            <p class="font-sans  font-normal leading-relaxed text-gray-900 mb-4">
                                                <span>{{ $book->pages ?? 'Not specified' }}</span>
                                                <span class="font-weight-bold">pages</span>
                                            </p>
                                            <p> | </p>
                                            <!-- <i class="bi bi-dot"></i> -->
                                            <p class="font-sans font-normal text-sm leading-relaxed text-gray-900 mb-4 ">
                                                <span class="font-weight-bold">Available:</span>
                                                <span>{{ $book->AvailableAmount ?? 'Not specified' }}</span>
                                            </p>
                                    </div>
                                   
                                </div>
                               
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <a href="#" class="btn btn-warning tasto_dettaglio w-50 p-2 mt-3 spec">
                                Reserve Now
                                <span class="wrap" aria-hidden="true">
                                    <span class="particle" style="--a: -45deg; --x: 53%; --y: 15%; --d: 4em; --f: .7; --t: .15"></span>
                                    <span class="particle" style="--a: 150deg; --x: 40%; --y: 70%; --d: 7.5em; --f: .8; --t: .08"></span>
                                    <span class="particle" style="--a: 10deg; --x: 90%; --y: 65%; --d: 7em; --f: .6; --t: .25"></span>
                                    <span class="particle" style="--a: -120deg; --x: 15%; --y: 10%; --d: 4em"></span>
                                    <span class="particle" style="--a: -175deg; --x: 10%; --y: 25%; --d: 5.25em; --f: .6; --t: .32"></span>
                                    <span class="particle" style="--a: -18deg; --x: 80%; --y: 25%; --d: 4.75em; --f: .5; --t: .4"></span>
                                    <span class="particle" style="--a: -160deg; --x: 30%; --y: 5%; --d: 9em; --f: .9; --t: .5"></span>
                                    <span class="particle" style="--a: 175deg; --x: 9%; --y: 30%; --d: 6em; --f: .95; --t: .6"></span>
                                    <span class="particle" style="--a: -10deg; --x: 89%; --y: 25%; --d: 4.5em; --f: .55; --t: .67"></span>
                                    <span class="particle" style="--a: -140deg; --x: 40%; --y: 10%; --d: 5em; --f: .85; --t: .75"></span>
                                    <span class="particle" style="--a: 90deg; --x: 45%; --y: 65%; --d: 4em; --f: .5; --t: .83"></span>
                                    <span class="particle" style="--a: 30deg; --x: 70%; --y: 80%; --d: 6.5em; --f: .75; --t: .92"></span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                 <!-- Book Plot/Description -->
<div class="row m-3">
    <div class="col-12">
        <p class="text-xl font-weight-bold text-gray-900 text-center">You might also like</p>
        <div class="container-fluid listaLibri mt-5">
                @php
                    // Get books of the same category
                    $relatedBooks = App\Models\Book::where('category_id', $book->category_id)
                                        ->where('id', '!=', $book->id) 
                                        ->get();
                @endphp
            @if ($relatedBooks->count() > 0)
                <div id="carouselRelatedBooks" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($relatedBooks->chunk(5) as $index => $chunk)
                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                <div class="d-flex justify-content-center">
                                    @foreach ($chunk as $relatedBook)
                                        <div class="card bg-light my-3 col-lg-2 col-md-3 col-sm-4 border rounded-2 mx-3 libroCard">
                                            <img src="{{ $relatedBook->image }}" class="card-img-top border rounded-2 immagine_card" alt="{{ $relatedBook->title }}">
                                            <div class="card-body">
                                                <div class="mb-1 border-bottom">
                                                    <p class="card-title fw-bold h5">{{ $relatedBook->title }}</p>
                                                    <p class="card-subtitle mb-2 text-muted h6">{{ $relatedBook->author->name }}</p>
                                                </div>
                                                <a href="books/{{ $relatedBook->id }}" class="btn btn-primary tasto_dettaglio">Scopri di più</a>
                                                <!-- Add more actions or details if needed -->
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselRelatedBooks" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselRelatedBooks" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            @else
                <p>No similar books found.</p>
            @endif
        </div>
    </div>
</div>

             
</x-app-layout>
