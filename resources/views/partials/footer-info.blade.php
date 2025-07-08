<!-- Footer Start -->
<div class="container-fluid footer py-5">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-md-7 col-lg-7 col-xl-4">
                <div class="footer-item d-flex flex-column">
                    <h4 class="mb-4">Comunicate con Nosotros</h4>
                    <p href=""><i class="fas fa-home me-2"></i>address</p>
                    <p href=""><i class="fas fa-envelope me-2"></i> example@hotmail.com</p>
                    <p href="" class="mb-3"><i class="fas fa-phone me-2"></i> 555-555-555</p>
                    <p href=""><i class="fas fa-phone me-2"></i> 555-555-555</p>
                </div>
            </div>
            <div class="col-md-5 col-lg-5 col-xl-4">
                <div class="footer-item d-flex flex-column">
                    <a class="btn-square btn btn-primary rounded-circle mx-1 my-1" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn-square btn btn-primary rounded-circle mx-1 my-1" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn-square btn btn-primary rounded-circle mx-1 my-1" href=""><i class="fab fa-instagram"></i></a>
                    <a class="btn-square btn btn-primary rounded-circle mx-1 my-1" href=""><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->

<!-- Copyright Start -->
<div class="container-fluid copyright text-body py-4">
    <div class="container">
        <div class="row g-4 align-items-center">
            <div class="col-md-6 text-center text-md-end mb-md-0">
                <i class="fas fa-copyright me-2"></i><a class="text-white" href="#">{{env('WEBSITE_TITLE')}}</a>, All right
                reserved.
            </div>
            <div class="col-md-6 text-center text-md-start">Developed By <a class="text-white"
                    href="https://new.webandnet.us/" target="_blank">Web And Net</a></div>
        </div>
    </div>
</div>
</div>
<!-- Copyright End -->

<!-- whatsapp button link -->
<a href="https://api.whatsapp.com/send?phone={{ env('MAIN_WHATSAPP_PHONE_NUMBER') }}" class="whatsapp-button">
    <img src={{ asset('icons/whatsapp-icon.png') }} alt="whatsapp-icon-img">
</a>
<!-- Back to Top -->
<a href="#" class="btn btn-primary btn-primary-outline-0 btn-md-square back-to-top">
    <i class="fa fa-arrow-up"></i>
</a>