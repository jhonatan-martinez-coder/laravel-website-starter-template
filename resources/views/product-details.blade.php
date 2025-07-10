<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>Detalles del Producto | {{ env('WEBSITE_TITLE') }}</title>
    @include('partials.header')
    <link rel="stylesheet" href={{ asset('css/productdetailscarousel.css') }}>
    
</head>

<body>
    <!-- Spinner Start -->
    @include('partials.spinner')
    <!-- Spinner End -->

    <!-- Navbar Start -->
    <div class="container-fluid position-relative p-0">
        @include('partials.navbar')
    </div>
    <!-- Navbar End -->

    <!-- Blog Start --> <!---- use this for tour packages --->
    <div class="container-fluid">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-12 product-details-carousel">
                   <!-- carousel with thumbnails -->
                    <div class="synced-product-image-carousel">
                        <div id="main-image" class="owl-carousel owl-theme">
                            @foreach ($product->images as $index => $imagePath)
                                <div class="item">
                                    <img src={{ asset('/storage/' . $imagePath) }} alt="carousel-image">
                                </div>
                            @endforeach
                        </div>
                        <div id="thumbnails" class="owl-carousel owl-theme">
                            @foreach ($product->images as $index => $imagePath)
                                <div class="item">
                                    <img src={{ asset('/storage/' . $imagePath) }} alt="carousel-image">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- Carousel End -->
                <div class="col-lg-5 col-md-12">
                    <h1 class="my-4">{{$product->title}}</h1>
                    <!--- product description --->
                    <?php echo $product->description ?>
                    <!----- booking button ------->
                    <a class="btn btn-primary mt-3 text-light" href="https://api.whatsapp.com/send?phone=3177417374">
                        <i class="bi bi-whatsapp"></i>
                        Reservar</a>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Blog End -->

    @if($countRelatedProducts > 0)
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
    @endif
    
    <!---------- JAVASCRIPT ---------->
    @include('partials.footer')
    <script src={{ asset('js/productdetailscarousel.js') }} ></script>
</body>
<footer>
    @include('partials.footer-info')
</footer>

</html>