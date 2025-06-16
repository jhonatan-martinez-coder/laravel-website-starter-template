<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Trip Tours Cartagena | Information de Paquetes</title>
    @include('partials.header')
</head>

<body>
    <!-- Spinner Start -->
    @include('partials.spinner')
    <!-- Spinner End -->

    <!-- Navbar Start -->
    <div class="container-fluid position-relative p-0">
        @include('partials.navbar')
        <!--- just for placing a background color ---->
        <div class="container-fluid p-0"
            style="background-color:var(--bs-light); width: 100%; height: 99px; color: black">
            <!---- no content goes here --->
        </div>
    </div>
    <!-- Navbar End -->

    <!-- Blog Start --> <!---- use this for tour packages --->
    <div class="container-fluid">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-6 col-md-12">
                    <!-- Carousel Start -->
                    <div id="carouselId" class="carousel slide mb-5" data-bs-ride="carousel">
                        <ol class="carousel-indicators">
                            @foreach ($product->images as $index => $imagePath)
                                @if ($index == 0)
                                    <li data-bs-target="#carouselId" data-bs-slide-to="{{ $index }}" class="active"></li>
                                @else
                                    <li data-bs-target="#carouselId" data-bs-slide-to="{{ $index }}"></li>
                                @endif
                            @endforeach
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            <!------------- list of images for use into the carousel from the product images list ------------->
                            @foreach ($product->images as $index => $imagePath)
                            @if ($index == 0)
                            <div class="carousel-item active">
                                <img src={{ asset('/storage/' . $imagePath) }} alt="carousel-image"
                                    class="rounded mx-auto d-block"
                                    style="object-fit: contain; max-width: 100%; height: 20rem;">
                            </div>
                            @else
                            <div class="carousel-item">
                                <img src={{ asset('/storage/' . $imagePath) }} alt="carousel-image"
                                    class="rounded mx-auto d-block"
                                    style="object-fit: contain; max-width: 100%; height: 20rem;">
                            </div>
                            @endif
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselId"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon btn bg-primary" aria-hidden="false"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselId"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon btn bg-primary" aria-hidden="false"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <!-- Carousel End -->
                <div class="col-lg-5 col-md-6 col-md-12" style="margin-left: 1rem">
                    <h1 class="my-4">{{$product->title}}</h1>
                    <!--- product description --->
                    <?php echo $product->description ?>
                    <!----- booking button ------->
                    <a class="btn btn-primary mt-3 text-light" href="#">
                        <i class="bi bi-whatsapp"></i>
                        Reservar</a>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Blog End -->

    <!-------- related product to category of current product details --------->
    <div class="container-fluid product py-2">
        <div class="container">
            <!------------ category section title ------------>
            <div class="mb-3">
                <h2>Relacionados</h2>
            </div>
            @foreach ($relatedProductsGroupByCategory as $categorizedProducts)
            <!------------ grouped products by category ------------>
            <div class="row" id={{ strtolower($categorizedProducts['categoryName']) }}>
                @foreach ($categorizedProducts['products'] as $product)
                    <div class="col-lg-4 col-md-6">
                        <div class="product-item">
                            <div class="product-img">
                                <div class="product-img-inner">
                                    <img class="img-fluid w-100 rounded-top" src={{ asset('/storage/' . $product->thumbnail)}}
                                        alt="Image" style="height: 300px;">
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
                                    class="btn btn-primary rounded-pill py-2 px-4 mt-3 text-light" style="width:
                                            100%;">Mas
                                    Información</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!------------ End of grouped products by category ------------>
            @endforeach
        </div>
    </div>
    <!-------- End of related product to category of current product details --------->

    <!---------- JAVASCRIPT ---------->
    @include('partials.footer')
</body>
<footer>
    @include('partials.footer-info')
</footer>

</html>