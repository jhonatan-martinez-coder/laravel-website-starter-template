<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Trip Tours Cartagena | Inicio</title>
    @include('partials.header')
</head>

<body>
    <!-- Spinner Start -->
    @include('partials.spinner')
    <!-- Spinner End -->

    <!-- Navbar & Hero Start -->
    <div class="container-fluid p-0">
        <!-- Navbar Start -->
        @include('partials.navbar')
        <!-- Navbar End -->
        <!--- just for placing a background color --->
        <div class="container-fluid p-0"
            style="background-color:var(--bs-light); width: 100%; height: 99px; color: black">
            <!--- no content goes here --->
        </div>
    </div>
    <!-- Navbar & Hero End -->
    <!-- Carousel Start -->
    <div class="carousel-header">
        <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img src={{ asset('img/carousel/places_33.jpeg') }} class="img-fluid d-block w-100" alt="Image">
                </div>
                <div class="carousel-item">
                    <img src={{ asset('img/carousel/places_10.jpeg') }} class="img-fluid d-block w-100" alt="Image">
                </div>
                <div class="carousel-item">
                    <img src={{ asset('img/carousel/places_27.jpeg') }} class="img-fluid d-block w-100" alt="Image">
                </div>
                <div class="carousel-item">
                    <img src={{ asset('img/carousel/places_7.jpeg') }} class="img-fluid d-block w-100" alt="Image">
                </div>
                <div class="carousel-item">
                    <img src={{ asset('img/carousel/slide_1.jpeg') }} class="img-fluid d-block w-100" alt="Image">
                </div>
            </div>
            <div class="carousel-caption" style="top: 10rem;">
                <h1 class="text-light">Sample text</h1>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                    Fugit, praesentium. Fuga eveniet quidem ut temporibus vitae
                    unde aspernatur tenetur quam velit perferendis.
                    Ipsa minus perspiciatis fugit? Assumenda recusandae ipsam
                    delectus!</p>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                <span class="carousel-control-prev-icon btn bg-primary" aria-hidden="false"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                <span class="carousel-control-next-icon btn bg-primary" aria-hidden="false"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->

    <!-------- sectin of products grouped by category --------->
    @foreach ($listOfCategorizedProducts as $productCategory)
    <section style="padding-top: 4rem" id={{ strtolower($productCategory['name']) }} >
        <div class="container-fluid product pt-3 pb-1 mt-3">
            <div class="container-lg">
                <!------------ category section title ------------>
                <div class="mx-auto text-center mb-3">
                    <h3 class="section-title px-3">{{ $productCategory['name'] }}</h3>
                </div>
            
                <div class="row g-4 justify-content-center">
                    @foreach ($productCategory['products'] as $product)
                    <!---product---->
                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="product-item">
                            <div class="product-img">
                                <div class="product-img-inner">
                                    <img class="custom-product-image" src={{ asset('/storage/' . $product->thumbnail) }}
                                            alt="Image">
                                    <div class="product-icon">
                                        <a href={{ url('/products/' . $product->id . '/details') }} class="my-auto"><i
                                                    class="fas fa-link fa-2x text-white"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content border border-top-0 rounded-bottom p-4">
                                <a href={{ url('/products/' . $product->id . '/details') }} class="h4 mb-5"
                                    style="width: 100%;">{{ $product->title}}</a>
                                <a href={{ url('/products/' . $product->id . '/details') }}
                                    class="btn btn-primary rounded-pill py-2 px-4 mt-3 text-light" style="width: 100%;">Mas
                                    Información</a>
                            </div>
                        </div>
                    </div>
                    <!--- End product---->
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @endforeach
    <!-------- sectin of products grouped by category --------->

    <!-- Testimonial Start -->
    <div class="container-fluid testimonial py-5">
        <div class="container py-5">
            <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                <h5 class="section-title px-3">Testimonios</h5>
                <h1 class="mb-0">Que Dicen Nuestros Clientes!!!</h1>
            </div>
            <div class="testimonial-carousel owl-carousel">
                <div class="testimonial-item text-center rounded pb-4">
                    <div class="testimonial-comment bg-light rounded p-4">
                        <p class="text-center mb-5">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quis
                            nostrum cupiditate, eligendi repellendus saepe illum earum architecto dicta quisquam quasi
                            porro officiis. Vero reiciendis,
                        </p>
                    </div>
                    <div class="testimonial-img p-1">
                        <img src="img/testimonial-1.jpg" class="img-fluid rounded-circle" alt="Image">
                    </div>
                    <div style="margin-top: -35px;">
                        <h5 class="mb-0">John Abraham</h5>
                        <p class="mb-0">New York, USA</p>
                        <div class="d-flex justify-content-center">
                            <i class="fas fa-star text-primary"></i>
                            <i class="fas fa-star text-primary"></i>
                            <i class="fas fa-star text-primary"></i>
                            <i class="fas fa-star text-primary"></i>
                            <i class="fas fa-star text-primary"></i>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item text-center rounded pb-4">
                    <div class="testimonial-comment bg-light rounded p-4">
                        <p class="text-center mb-5">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quis
                            nostrum cupiditate, eligendi repellendus saepe illum earum architecto dicta quisquam quasi
                            porro officiis. Vero reiciendis,
                        </p>
                    </div>
                    <div class="testimonial-img p-1">
                        <img src="img/testimonial-2.jpg" class="img-fluid rounded-circle" alt="Image">
                    </div>
                    <div style="margin-top: -35px;">
                        <h5 class="mb-0">John Abraham</h5>
                        <p class="mb-0">New York, USA</p>
                        <div class="d-flex justify-content-center">
                            <i class="fas fa-star text-primary"></i>
                            <i class="fas fa-star text-primary"></i>
                            <i class="fas fa-star text-primary"></i>
                            <i class="fas fa-star text-primary"></i>
                            <i class="fas fa-star text-primary"></i>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item text-center rounded pb-4">
                    <div class="testimonial-comment bg-light rounded p-4">
                        <p class="text-center mb-5">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quis
                            nostrum cupiditate, eligendi repellendus saepe illum earum architecto dicta quisquam quasi
                            porro officiis. Vero reiciendis,
                        </p>
                    </div>
                    <div class="testimonial-img p-1">
                        <img src="img/testimonial-3.jpg" class="img-fluid rounded-circle" alt="Image">
                    </div>
                    <div style="margin-top: -35px;">
                        <h5 class="mb-0">John Abraham</h5>
                        <p class="mb-0">New York, USA</p>
                        <div class="d-flex justify-content-center">
                            <i class="fas fa-star text-primary"></i>
                            <i class="fas fa-star text-primary"></i>
                            <i class="fas fa-star text-primary"></i>
                            <i class="fas fa-star text-primary"></i>
                            <i class="fas fa-star text-primary"></i>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item text-center rounded pb-4">
                    <div class="testimonial-comment bg-light rounded p-4">
                        <p class="text-center mb-5">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quis
                            nostrum cupiditate, eligendi repellendus saepe illum earum architecto dicta quisquam quasi
                            porro officiis. Vero reiciendis,
                        </p>
                    </div>
                    <div class="testimonial-img p-1">
                        <img src="img/testimonial-4.jpg" class="img-fluid rounded-circle" alt="Image">
                    </div>
                    <div style="margin-top: -35px;">
                        <h5 class="mb-0">John Abraham</h5>
                        <p class="mb-0">New York, USA</p>
                        <div class="d-flex justify-content-center">
                            <i class="fas fa-star text-primary"></i>
                            <i class="fas fa-star text-primary"></i>
                            <i class="fas fa-star text-primary"></i>
                            <i class="fas fa-star text-primary"></i>
                            <i class="fas fa-star text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->

    <!---------- JAVASCRIPT ---------->
    @include('partials.footer')
</body>
<footer>
    @include('partials.footer-info')
</footer>

</html>