
@php
    $navBarOptions = DB::table('nav_bar_options')->where('parent_id', '=', null)->get();
@endphp


<nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
    <a href="/" class="navbar-brand p-0">
        
        <img src="{{ asset('trip_tours_cartagena_logo-Photoroom.png') }}" alt="cartagena_trip_tours_logo">
    </a>
    <span class="m-0 span-as-title">Cartagena Trip & Tours</span>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="fa fa-bars"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0">
            <a href={{ url('/') }} class="nav-item nav-link">Inicio</a>
            @foreach ( $navBarOptions as $option )
            <!--------- render nav item depending of the type --------->
                @switch($option->type)
                    @case('dropdown')
                    @php
                        $childrenOptions = DB::table('nav_bar_options')->where('parent_id', '=', $option->id)->get();
                    @endphp
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">{{$option->name}}</a>
                            <div class="dropdown-menu m-0 p-0">
                                @foreach ($childrenOptions as $child)
                                    <a href={{ url($child->url) }} class="dropdown-item">{{$child->name}}</a>
                                @endforeach
                            </div>
                        </div>
                        @break
                    @default
                        <a href={{ url($option->url ) }} class="nav-item nav-link">{{$option->name}}</a>
                @endswitch

            @endforeach
        </div>
        <!--- <a href="" class="btn btn-primary rounded-pill py-2 px-4 ms-lg-4">Book Now</a> --->
    </div>
</nav>