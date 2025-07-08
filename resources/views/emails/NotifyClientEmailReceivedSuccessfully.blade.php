<!DOCTYPE html>
<html lang="en">

<head></head>

<body>
    <h2 style="margin-bottom: 2rem">Hola! {{ ucfirst($websiteContactForm['client_name']) }}</h2>
    <p style="margin-bottom: 2rem">Recibimos su correo electronico, y pronto nos contactaremos contigo</p>
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