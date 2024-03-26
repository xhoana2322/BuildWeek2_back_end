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
    &:hover::before {
        background: radial-gradient(at 85% 85%, #92372d, #F87060 75%); 
    }
    .particle:hover::before {
    background: radial-gradient(at 85% 85%, var(--hover-color, #92372d), var(--hover-color, #F87060) 75%);
}
}
</style>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Book Detail') }}
        </h2>
    </x-slot>

    <div class="d-flex h-55vh w-100 items-center justify-content-between px-10 my-4">
        <div class="max-w-4xl mx-auto px-6 px-lg-8">

        <!-- TODO:allarm mesage -->
                <div class="row">
                    <div id='book-3d' class="bg-white rounded-lg shadow-xl overflow-hidden mx-3">
                            <div class="row d-flex justify-content-evenly ps-4 pe-2 pt-5">
                                    <!-- Book Image -->
                                    <div class="col-md-6 col-lg-4">
                                    
                                    <div class="component ms-4">
                                        <ul class="align">
                                            <li>
                                                <figure class='book'>
                                                <!-- Front -->
                                                <ul class='hardcover_front'>
                                                    <li>
                                                        <div class="coverDesign blue">
                                                            <img src="{{ $book->image }}" alt="{{ $book->title }}">
                                                        </div>
                                                    </li>
                                                    <li></li>
                                                </ul>

                                                <!-- Pages -->
                                                <ul class='page'>
                                                    <li></li>
                                                    <li class="text-center">
                                                        <p class="mt-5">Accat't o' libr</p>
                                                        <p>🤡</p>
                                                    </li>
                                                    <li></li>
                                                    <li></li>
                                                    <li></li>
                                                </ul>

                                                <!-- Back -->
                                                <ul class='hardcover_back'>
                                                    <li></li>
                                                    <li></li>
                                                </ul>
                                                <ul class='book_spine'>
                                                    <li></li>
                                                    <li></li>
                                                </ul>
                                        </figure>
                                    </li>
                                </ul>
                            </div>

                    </div>
                    <!-- Book Details -->
                    <div class="col-md-5 col-lg-5">
                        <div class="row text-lg-left">
                            <div class="relative bg-clip-border text-gray-700 rounded-xl border border-white">
                                <p class="fw-bold text-blue-gray-900 lg-text-5xl !leading-snug text-3xl lg-max-w-3xl" style='font-size: 2.5rem;' >{{ $book->title ?? 'Title not available' }}</p>
                                <p class="font-sans text-xl font-normal leading-relaxed text-inherit mb-10 !text-gray-900 my-1 lh-1"><author><span class="fst-italic"> {{ $book->author->name ?? 'Author details not available' }}<span class="fst-normal">, {{$book->year}} </span> </span></author></p>
                                <div class="mt-4 mb-2">
                                    <h3 class="text-xl font-weight-bold text-gray-900 lh-1">Plot</h3>
                                    <p class="mt-2 text-base text-gray-600">{{ $book->plot ?? 'Plot details not available.' }}</p>
                                    <div class="d-flex justify-content-between text-center mt-3">
                                        <p class="font-sans font-normal leading-relaxed text-gray-900 mb-2">
                                            <span>{{ $book->category->CategoryName ?? 'Category not available' }}</span>
                                        </p>
                                        <p> | </p>
                                        <!-- <i class="bi bi-dot"></i> -->
                                        <p class="font-sans font-normal leading-relaxed text-gray-900 mb-4">
                                            <span>{{ $book->pages ?? 'Not specified' }}</span>
                                            <span class="font-weight-bold">pages</span>
                                        </p>
                                        <p> | </p>
                                        <!-- <i class="bi bi-dot"></i> -->
                                        <p class="font-sans font-normal leading-relaxed text-gray-900 mb-4">
                                            <span class="font-weight-bold">Copies available:</span>
                                            <span>{{ $book->AvailableAmount ?? 'Not specified' }}</span>
                                        </p>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">

                        @if ($book->AvailableAmount > 0 && !in_array($book->id, $userPendingReservations))
                            <form action="{{ route('reservation.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="book_id" value="{{ $book->id }}">
                            <button type="submit" class="btn btn-warning tasto_dettaglio p-2 mt-3 spec" style='width: 11rem;'>
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
                            </button>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
                
<!-- -------------------------------------------------------- -->
                <!-- flower separator -->
                <div class="d-flex justify-content-center align-items-center">
                    <div class="" style="margin-right: 0.5rem; width: 20rem;">
                        <div style="height: 0.1rem; background-color: #F87060; width: 100%;"></div>
                    </div>
                    <p class="h2 fw-light">&#x2740;</p>
                    <div class="d-flex flex-column justify-content-center align-items-center" style="margin-left: 0.5rem; width: 20rem;">
                        <div style="height: 0.1rem; background-color: #F87060; width: 100%;"></div>
                    </div>
                </div>
                
<!-- -------------------------------------------------------- -->
                <!-- you might also like section -->
                <div class="row m-3">
                    <div class="col-12 mt-2">
                        <p class="fs-4 fw-bold text-gray-900 text-center">You might also like</p>
                        <div class="container-fluid listaLibri mt-4">
                                @php
// Get books of the same category
$relatedBooks = App\Models\Book::where('category_id', $book->category_id)
    ->where('id', '!=', $book->id)
    ->take(4)
    ->get();
                                @endphp
                            @if ($relatedBooks->count() > 0)
                                <div class="d-flex justify-content-evenly">
                                    @foreach ($relatedBooks as $relatedBook)
                                        <div class="card bg-light my-3 col-lg-2 col-md-3 col-sm-4 border rounded-2 mx-3 libroCard" style='width: 10rem;'>
                                            <img src="{{ $relatedBook->image }}" class="card-img-top border rounded-2 immagine_card" alt="{{ $relatedBook->title }}">
                                            <div class="card-body">
                                                <div class="card-text mb-5">
                                                    <p class="card-title fw-bold h5">{{ $relatedBook->title }}</p>
                                                    <p class="card-subtitle mb-4 text-muted h6">{{ $relatedBook->author->name }}</p>
                                                 </div>
                                             <a href="/books/{{ $relatedBook->id }}" class="btn btn-primary tasto_dettaglio position-absolute bottom-0 mb-2">More info</a>
                                          </div>
                                       </div>
                                     @endforeach
                                   </div>
                            @else
                                <p>No similar books found.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
