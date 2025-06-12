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

    <!-- Topbar Start -->
  
    <!-- Topbar End -->

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
                                        class="rounded mx-auto d-block" style="object-fit: contain; max-width: 100%; height: 20rem;">
                                </div>
                                @else
                                <div class="carousel-item">
                                    <img src={{ asset('/storage/' . $imagePath) }} alt="carousel-image"
                                        class="rounded mx-auto d-block" style="object-fit: contain; max-width: 100%; height: 20rem;">
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

    <!---------- JAVASCRIPT ---------->
    @include('partials.footer')
</body>
<footer>
    @include('partials.footer-info')
</footer>

</html>