<x-app-layout>
    <div class="d-flex h-55vh w-100 items-center justify-content-between px-10 my-4">
        <div class="max-w-4xl mx-auto px-6 px-lg-8">
            <div class="bg-white rounded-lg shadow-xl overflow-hidden">
                <div class="container row">
                    <!-- Book Image -->
                    <div class="col-12 col-md-6 col-lg-4 m-2 d-flex justify-content-center bg-fixed">
                        <img src="{{ $book->image }}" alt="{{ $book->title }}" loading="lazy" class="inset-0 ms-auto w-75 h-100 rounded-bottom-start object-cover object-center mx-2">
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
                                    <svg  version="1.1" id="Capa_1"   
                                        viewBox="0 0 47.94 47.94" width="20" height="20">
                                        <path style="fill:#ED8A19;" d="M26.285,2.486l5.407,10.956c0.376,0.762,1.103,1.29,1.944,1.412l12.091,1.757
                                            c2.118,0.308,2.963,2.91,1.431,4.403l-8.749,8.528c-0.608,0.593-0.886,1.448-0.742,2.285l2.065,12.042
                                            c0.362,2.109-1.852,3.717-3.746,2.722l-10.814-5.685c-0.752-0.395-1.651-0.395-2.403,0l-10.814,5.685
                                            c-1.894,0.996-4.108-0.613-3.746-2.722l2.065-12.042c0.144-0.837-0.134-1.692-0.742-2.285l-8.749-8.528
                                            c-1.532-1.494-0.687-4.096,1.431-4.403l12.091-1.757c0.841-0.122,1.568-0.65,1.944-1.412l5.407-10.956
                                            C22.602,0.567,25.338,0.567,26.285,2.486z"/>
                                    </svg>
                                    <svg  version="1.1" id="Capa_1"   
                                        viewBox="0 0 47.94 47.94" width="20" height="20">
                                        <path style="fill:#ED8A19;" d="M26.285,2.486l5.407,10.956c0.376,0.762,1.103,1.29,1.944,1.412l12.091,1.757
                                            c2.118,0.308,2.963,2.91,1.431,4.403l-8.749,8.528c-0.608,0.593-0.886,1.448-0.742,2.285l2.065,12.042
                                            c0.362,2.109-1.852,3.717-3.746,2.722l-10.814-5.685c-0.752-0.395-1.651-0.395-2.403,0l-10.814,5.685
                                            c-1.894,0.996-4.108-0.613-3.746-2.722l2.065-12.042c0.144-0.837-0.134-1.692-0.742-2.285l-8.749-8.528
                                            c-1.532-1.494-0.687-4.096,1.431-4.403l12.091-1.757c0.841-0.122,1.568-0.65,1.944-1.412l5.407-10.956
                                            C22.602,0.567,25.338,0.567,26.285,2.486z"/>
                                    </svg>
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
                                    <div class="d-flex gap-6 mt-6">
                                             <p class="font-sans font-normal leading-relaxed text-gray-900 mb-2">
                                                <span>{{ $book->category->CategoryName ?? 'Category not available' }}</span>
                                            </p>

                                            <p class="font-sans  font-normal leading-relaxed text-gray-900 mb-4">
                                            
                                            <span>{{ $book->pages ?? 'Not specified' }}</span>
                                            <span class="font-weight-bold">pages</span>
                                            </p>
                                    </div>
                                   
                                </div>
                               
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <a href="#" class="btn btn-warning tasto_dettaglio w-50 p-2 mt-3">
                            Reserve Now
                            </a>   
                        </div>
                    </div>
                </div>
                <!-- Book Plot/Description -->
                <div class="row m-3">
                    
                    <div class="col-6">
                    <p class="text-xl font-weight-bold text-gray-900">You may also like 
                        </p>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
