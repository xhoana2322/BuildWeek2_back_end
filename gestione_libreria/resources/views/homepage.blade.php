<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="bg-dark>
    <x-app-layout>
        <div class="hero bg-primary" style="margin-top: 3rem; height: 30rem;">
            <!-- <div>
                <p class="h5 text-white mb-3 text-center text-sm-start"></p>
            </div> -->
            <div id="carouselExample" class="carousel slide d-none d-sm-block">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="d-flex">
                            <div class="col-xs-2 col-md-2">
                                <img src="https://picsum.photos/200/300" width="400px" class="imagegrv bg-success">
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="d-flex">
                            <div class="col-xs-2 col-md-2">
                                <img src="https://picsum.photos/200/301" width="400px" class="imagegrv bg-warning">
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="d-flex">
                            <div class="col-xs-2 col-md-2">
                                <img src="https://picsum.photos/200/302" width="400px" class="imagegrv bg-dark">
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon me-5" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon ms-5" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="container-fluid listaLibri">
            <section>
                <div>
                    <p class="h5 text-white mb-3 text-center text-sm-start">Categoria 1</p>
                </div>
            <div id="carouselCategory" class="carousel slide d-none d-sm-block">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="d-flex">
                            <x-cardHome />
                            <x-cardHome />
                            <x-cardHome />
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="d-flex">
                            <x-cardHome />
                            <x-cardHome />
                            <x-cardHome />
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="d-flex">
                            <x-cardHome />
                            <x-cardHome />
                            <x-cardHome />
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev text-dark" type="button" data-bs-target="#carouselCategory"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon me-5" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next text-dark" type="button" data-bs-target="#carouselCategory"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon ms-5" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            </section>
        </div>
    </x-app-layout>
    </div>
</body>

</html>
