<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>Contacto | {{ env('WEBSITE_TITLE') }} </title>
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
    </div>
    <!-- Navbar & Hero End -->

    <div class="container py-5 d-flex justify-content-center">
        <div class="row">
            <div class="col-md-6 col-lg-5 mb-5">
                <div class="bg-light rounded p-4">
                    <div class="text-center mb-4">
                        <i class="fa fa-map-marker-alt fa-3x text-primary"></i>
                        <h4 class="text-primary">
                            <address></address>
                        </h4>
                        <p class="mb-0">address</p>
                    </div>
                    <div class="text-center">
                        <i class="fa fa-envelope-open fa-3x text-primary mb-3"></i>
                        <h4 class="text-primary">Email</h4>
                        <p class="mb-0">email@gmail.com</p>
                        <p class="mb-0"></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-7">
                <h2 class="mb-2">Contactenos</h2>
                <p class="mb-4">
                    Valoramos tu opinión y la consideramos fundamental para nuestro
                    crecimiento y mejora continua en calidad y servicio
                </p>
                <form action="{{ url('/mail/send') }}" class="contact-form" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="form-floating">
                                <input type="text" class="form-control border-0" id="name" placeholder="Your Name"
                                    name="client_name" value="{{ old('client_name') }}">
                                <label for="name">Su nombre</label>
                            </div>
                            @error('client_name')
                                <p class="text-danger my-2">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="form-floating">
                                <input type="email" class="form-control border-0" id="email" name="client_email"
                                    placeholder="Your Email" value="{{ old('client_email') }}">
                                <label for="email">Su correo</label>
                            </div>
                            @error('client_email')
                                <p class="text-danger my-2">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="col-12 mb-3">
                            <div class="form-floating">
                                <input type="text" class="form-control border-0" id="subject" placeholder="Subject"
                                    name="subject" value="{{ old('subject') }}">
                                <label for="subject">Asunto</label>
                            </div>
                            @error('subject')
                                <p class="text-danger my-2">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="col-12 mb-3">
                            <div class="form-floating">
                                <textarea class="form-control border-0" placeholder="Leave a message here"
                                    name="message" id="message" style="height: 160px">{{ old('message') }}</textarea>
                                <label for="message">Mensaje</label>
                            </div>
                            @error('message')
                                <p class="text-danger my-2">{{$message}}</p>
                            @enderror
                        </div>
                        <!------------- error validation messages ---------->
                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                <p>{{ session()->get('success') }}</p>
                            </div>
                        @endif
                        @if (session()->has('error'))
                            <div class="alert alert-danger">
                                <p>{{ session()->get('error') }}</p>
                            </div>
                        @endif
                        <!--------------- recaptcha --------------->
                        <div class="g-recaptcha mb-3" data-sitekey={{config('services.recaptcha.key')}}></div>
                        <!--------------- End recaptcha --------------->
                        <div class="col-12 mb-3">
                            <button class="btn btn-primary w-100 py-3" type="submit">Enviar Mensaje</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!---------- JAVASCRIPT ---------->
    @include('partials.footer')
</body>
<footer>
    @include('partials.footer-info')
</footer>

</html>