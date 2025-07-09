<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head></head>

<body>
    <h3>Formulario de Contacto</h3>
    <p style="margin-bottom: 3rem">Este correo ha sido enviado automaticamente desde el formulario de contacto que se
        encuentra en el sitio web {{env('WEBSITE_TITLE')}}</p>

    <div style="margin-bottom: 2rem">
        <p style="margin-bottom: 1rem">A continuación, se listan los datos del usuario:</p>
        <p><strong>De:</strong> {{ $websiteContactForm['client_email'] }}</p>
        <p><strong>Nombre:</strong> {{ ucfirst($websiteContactForm['client_name']) }}</p>
        <p><strong>Asunto:</strong> {{ $websiteContactForm['subject'] }}</p>
        <p><strong>Mensaje:</strong> {{ $websiteContactForm['message'] }}</p>
    </div>

   <div style="margin-bottom: 2rem">
        <address style="margin-top: 2rem;">
           
        </address>
        <div style="padding-top: 1rem;">
            <p>Correo: </p>  
            <p>Correo: </p>
        </div>
    </div>

    @php
        $imagePath = public_path('main-website-logo.png');
        $image = file_get_contents($imagePath);
    @endphp

    <img src={{ $message->embedData($image, 'main-website-logo.png') }} alt="main-website-logo" style="width: 300px;">
</body>

</html>