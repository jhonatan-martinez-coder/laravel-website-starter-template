<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ env('WEBSITE_TITLE') }} | Inicio</title>
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

    <section>
        <div class="container py-5 d-flex justify-content-center">
            <div class="row align-items-center">
                <div class="col-lg-4">
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
                <div class="col-lg-8">
                    <h2 class="mb-2">Contactenos</h2>
                    <p class="mb-4">
                        Valoramos tu opinión y la consideramos fundamental para nuestro
                        crecimiento y mejora continua en calidad y servicio
                    </p>
                    <form class="contact-form">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control border-0" id="name" placeholder="Your Name">
                                    <label for="name">Su nombre</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="email" class="form-control border-0" id="email"
                                        placeholder="Your Email">
                                    <label for="email">Su correo</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control border-0" id="subject" placeholder="Subject">
                                    <label for="subject">Asunto</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control border-0" placeholder="Leave a message here"
                                        id="message" style="height: 160px"></textarea>
                                    <label for="message">Mensaje</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Enviar Mensaje</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </section>

    <!---------- JAVASCRIPT ---------->
    @include('partials.footer')
</body>
<footer>
    @include('partials.footer-info')
</footer>

</html>