<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Trip Tours Cartagena | {{$page->title}}</title>
    @include('partials.header')
</head>

<body>

    <!-- Spinner Start -->
    @include('partials.spinner')
    <!-- Spinner End -->

    <!-- Topbar Start -->
  
    <!-- Topbar End -->

    <div class="container-fluid position-relative p-0">
        <!-- Navbar Start -->
        @include('partials.navbar')
        <!-- Navbar End -->
    </div>

    <!-- Blocks Start -->
    
    <!-- Blocks End -->

    @foreach ($page->blocks as $c)
        @switch($c->type)
            @case('intro')
                <div class="container-fluid py-3">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <?php echo $c->data->blocks?>
                            </div>
                                <div class="col-lg-6">
                                <img src={{ asset('/storage/' . $c->data->url) }} alt="intro_image" class="rounded" style="max-height: 20rem; width: 100%; object-fit: contain;">
                            </div>
                        </div>
                    </div>
                </div>
                    @break
            @case('heading')
                <div class="container-fluid py-2">
                    <div class="mx-auto text-center" style="max-width: 900px;">
                            <{{ $c->data->level }} class="my-3 text-primary">{{$c->data->blocks}}</{{ $c->data->level }}>
                            <!-----  <h3 class="section-title px-3 my-3">somet sample text</h3> ---------->
                            <!-----   <h1 class="mb-4">Destinos Disponibles</h1> ---------->
                    </div>
                </div>
                @break
            @case('paragraph')
                <div class="container-fluid py-4">
                    <div class="container">
                        <?php echo $c->data->blocks ?>
                    </div>
                </div>
                @break
            @case('mark_down_paragraph')
                <!------------------ markdown content Start ------------------>
                <div class="container-fluid py-2">
                    <div class="container">
                        <?php echo $c->data->blocks ?>
                    </div>
                </div>
                <!------------------ markdown content End ------------------>
                @break
            @case('image')
                    <div class="container-fluid py-2">
                        <div class="container text-{{  $c->data->alignment }}">
                            <img src={{ asset('/storage/' . $c->data->url) }} alt="{{ $c->data->alt }}" class="rounded img-fluid my-3">
                        </div>
                    </div>
                @break
            @case('two_columns_paragraph')
                <div class="container-fluid py-2">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <?php echo $c->data->column_1 ?>
                            </div>
                           <div class="col-lg-6">
                                <?php echo $c->data->column_2 ?>
                            </div>
                        </div>
                    </div>
                </div>
            @break
            @case('image_row')
                <div class="container-fluid py-2">
                    <div class="container">
                        <div class="row my-5 align-items-center">
                            @foreach ($c->data->urls as $index => $image_url)
                                <div class="col-lg-3 col-md-4 col-sm-12 mb-3 mx-auto">
                                    <img class="img-fluid rounded" style="max-height: 20rem; width: 100%; object-fit: contain; padding-top: auto; padding-bottom: auto;" src={{ asset('/storage/' . $image_url) }} alt="list-image-{{ $index }}">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @break
            @case('link')
                <div class="container-fluid py-2">
                    <div class="container" style="display: flex; justify-content: {{ $c->data->alignment }}">
                        <a class='btn btn-primary text-light btn-md mb-3' href={{ $c->data->url }} target="_blanck" style="display: flex; height: 3rem; width: 10rem;; justify-content: center; align-items: center;">{{ $c->data->text }}</a>
                    </div>
                </div>
            @break

        @endswitch   
    @endforeach

    <!------------ JAVASCRIPT ---------->
    @include('partials.footer')
</body>
<footer>
    @include('partials.footer-info')
</footer>

</html>