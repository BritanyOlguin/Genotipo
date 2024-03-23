<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upper Logistics</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body,
        html {
            height: 550px;
            margin: 0;
            font-family: 'Sarabun', sans-serif;
            font-size: 15px;
            background-image: url('/storage/Img/FondoPrincipal.jpg');
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .navbar-custom {
            background-color: transparent;
            padding-left: 25px;
        }

        .navbar-custom .navbar-nav .nav-link {
            color: white;
            margin-right: 18px;
        }

        .contact-button {
            background-color: #f26522;
            border: none;
            border-radius: 42px;
            color: white;
            padding: 5px 15px;
            font-size: 15px;
            line-height: 10px;
            margin-left: 10px;
            width: 92px;
            height: 35px;
            margin-right: 20px;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        /* Alineación vertical para iconos y texto */
        .navbar-nav {
            display: flex;
            align-items: center;
        }

        .icon-cellphone,
        .flag-mexico,
        .phone-number,
        .contact-button {
            align-items: center;
            display: flex;
        }

        .flag-mexico,
        .phone-number {
            margin-left: 5px;
        }

        .phone-number {
            color: white;
            /* Color del texto a blanco */
            margin-right: 21px;
            /* Espacio después del número telefónico */
        }

        .flag-mexico {
            margin-right: 19px;
            /* Espacio antes de la bandera */
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-custom">
        <a class="navbar-brand" href="#">
            <img src="/storage/Img/logo.png" width="183.6" height="39" alt="Logo">
        </a>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav mr-auto">
                <a class="nav-item nav-link" href="#">Inicio</a>
                <a class="nav-item nav-link" href="#">Nosotros</a>
                <a class="nav-item nav-link" href="#">Almacenaje</a>
                <a class="nav-item nav-link" href="#">Logística</a>
                <a class="nav-item nav-link" href="#">Transporte terrestre</a>
            </div>
            <div class="navbar-nav">
                <span class="icon-cellphone">
                    <img src="/storage/Img/Phone.png" width="14" height="14" alt="Icono celular">
                </span>
                <span class="phone-number">554 192 5311</span>
                <span class="flag-mexico">
                    <img src="/storage/Img/Mexico.png" width="20" height="20" alt="Bandera México">
                </span>
                <button class="contact-button">Contacto</button>
            </div>
        </div>
    </nav>
    <!-- Resto de tu HTML -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.9/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>