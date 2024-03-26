<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <x-app-layout>
        <div class="bg-dark">
            <div class="hero bg-primary" style="margin-top: 0rem; height: 30rem;">
                <!-- Carosello -->
                <div id="carouselExample" class="carousel slide d-none d-sm-block" style="overflow: hidden; height: 30rem; position: relative;" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="https://w7.pngwing.com/pngs/413/139/png-transparent-books-background-books-retro-library.png" class="d-block img-fluid w-100" alt="...">
            <div class="overlay">
                <h2>Discover BestBooks!</h2>
                <div class="divDescriptionHero d-flex flex-column justify-content-center align-items-center">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="" style="margin-right: 0.5rem; width: 20rem;">
                            <div style="height: 0.1rem; background-color: #F87060; width: 100%;"></div>
                        </div>
                        <p class="h2 fw-light">&#x2740;</p>
                        <div class="d-flex flex-column justify-content-center align-items-center" style="margin-left: 0.5rem; width: 20rem;">
                            <div style="height: 0.1rem; background-color: #F87060; width: 100%;"></div>
                        </div>
                    </div>
                    <p class="descriptionHero">Find your next favorite book!</p>
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="" style="margin-right: 0.5rem; width: 20rem;">
                            <div style="height: 0.1rem; background-color: #F87060; width: 100%;"></div>
                        </div>
                        <p class="h2 fw-light">&#x2740;</p>
                        <div class="d-flex flex-column justify-content-center align-items-center" style="margin-left: 0.5rem; width: 20rem;">
                            <div style="height: 0.1rem; background-color: #F87060; width: 100%;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://images5.alphacoders.com/133/thumb-1920-1338186.png" class="d-block img-fluid w-100" alt="...">
            <div class="overlay">
                <h2>New Books every week!</h2>
                <div class="divDescriptionHero d-flex flex-column justify-content-center align-items-center">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="" style="margin-right: 0.5rem; width: 20rem;">
                            <div style="height: 0.1rem; background-color: #F87060; width: 100%;"></div>
                        </div>
                        <p class="h2 fw-light">&#x2740;</p>
                        <div class="d-flex flex-column justify-content-center align-items-center" style="margin-left: 0.5rem; width: 20rem;">
                            <div style="height: 0.1rem; background-color: #F87060; width: 100%;"></div>
                        </div>
                    </div>
                    <p class="descriptionHero">The best books of the year every time you want!</p>
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="" style="margin-right: 0.5rem; width: 20rem;">
                            <div style="height: 0.1rem; background-color: #F87060; width: 100%;"></div>
                        </div>
                        <p class="h2 fw-light">&#x2740;</p>
                        <div class="d-flex flex-column justify-content-center align-items-center" style="margin-left: 0.5rem; width: 20rem;">
                            <div style="height: 0.1rem; background-color: #F87060; width: 100%;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://images.yourstory.com/cs/2/96eabe90392211eb93f18319e8c07a74/NucleusAIbillgatesa147904f-7309-40f9-89b4-0bc26910756a-1703146344405.png" class="d-block img-fluid w-100" alt="...">
            <div class="overlay">
                <h2>A selection of the best authors!</h2>
                <div class="divDescriptionHero d-flex flex-column justify-content-center align-items-center">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="" style="margin-right: 0.5rem; width: 20rem;">
                            <div style="height: 0.1rem; background-color: #F87060; width: 100%;"></div>
                        </div>
                        <p class="h2 fw-light">&#x2740;</p>
                        <div class="d-flex flex-column justify-content-center align-items-center" style="margin-left: 0.5rem; width: 20rem;">
                            <div style="height: 0.1rem; background-color: #F87060; width: 100%;"></div>
                        </div>
                    </div>
                    <p class="descriptionHero">We have the best authors in the world!</p>
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="" style="margin-right: 0.5rem; width: 20rem;">
                            <div style="height: 0.1rem; background-color: #F87060; width: 100%;"></div>
                        </div>
                        <p class="h2 fw-light">&#x2740;</p>
                        <div class="d-flex flex-column justify-content-center align-items-center" style="margin-left: 0.5rem; width: 20rem;">
                            <div style="height: 0.1rem; background-color: #F87060; width: 100%;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon me-5" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon ms-5" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
            </div>

            <!-- Lista dei libri -->
            <div class="container-fluid listaLibri mt-5">
                @forelse ($categories as $category)
                    @if ($books->where('category_id', $category->id)->count() > 0)
                        <p class="h1 mt-3 text-center text-sm-start nome_carosello">{{ $category->CategoryName }}</p>
                        <div id="carouselCategory{{ $category->id }}" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($books->where('category_id', $category->id)->chunk(5) as $index => $chunk)
                                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                        <div class="d-flex">
                                            @foreach ($chunk as $book)
                                                <div class="card bg-light my-3 col-lg-2 col-md-3 col-sm-4 border rounded-2 mx-3 libroCard">
                                                    <img src="{{ $book->image }}" class="card-img-top border rounded-2 immagine_card" alt="{{ $book->title }}">
                                                    <div class="card-body">
                                                        <div class="mb-1 border-bottom">
                                                            <p class="card-title fw-bold h5">{{ $book->title }}</p>
                                                            <p class="card-subtitle mb-2 text-muted h6">{{ $book->author->name }}</p>
                                                        </div>
                                                        <p class="card-text">{{ substr($book->plot, 0, 20) }}<span>...</span></p>
                                                        <a href="books/{{ $book->id }}" class="btn btn-primary tasto_dettaglio">Scopri di più</a>
                                                        <div class="mt-2 d-flex justify-content-between align-items-center">
                                                            <a href="#" class="btn btn-primary tasto_prenota">Prenota</a>
                                                            <p class="text-success fw-bold">Disponibile</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                @empty
                    <p>Nessuna categoria disponibile</p>
                @endforelse
            </div>
        </div>
    </x-app-layout>
</body>

</html>
