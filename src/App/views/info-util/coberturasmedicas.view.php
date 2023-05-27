<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coberturas Medicas</title>
    <link rel="stylesheet" href="https://unpkg.com/browse/reset-css@5.0.1/reset.css">
    <link rel="stylesheet" href="/assets/css/global.css">
    <link rel="stylesheet" href="/assets/css/info-util.css">
    <link rel="stylesheet" href="/assets/css/submenu.css">
    <link rel="stylesheet" href="https://icono-49d6.kxcdn.com/icono.min.css">
    <script src="/assets/scripts/components/classPaw.js"></script>
    <script src="/assets/scripts/app.js"></script>
</head>
<body>

    <?php include __DIR__ . '/../parts/header.view.php' ?>

    <?php include __DIR__ . '/../parts/nav.view.php' ?>

    <nav class="breadcrumb">
        <ul>
            <li>
                <a href="/home.html">Home</a>
            </li>
            <li>
                <a href="#">Información Útil</a>
            </li>
            <li>
                <a href="/info-util/coberturasmedicas.html">Coberturas Médicas</a>
            </li>
        </ul>
    </nav>

    <nav class="nav-info-util">
        <ul>
            <li><a href="/info-util/coberturasMedicas"><p>Coberturas médicas</p></a></li>
            <li><a href="/info-util/novedades"><p>Novedades</p></a></li>
            <li><a href="/info-util/patologiasytratamientos"><p>Patologías y tratamientos</p></a></li>
        </ul>
    </nav>

    <!--Aca no se si irá una seccion o podria ser una lista o las imagenes sueltas-->
    <section class="obras-sociales">
        <ul> 
        <li><a href="https://www.galeno.com.ar" target="_blank"><img src="/assets/imgs/galeno.jpg" alt="Logo de Galeno"/></a></li>
        <li><a href="https://www.ioma.gba.gob.ar/" target="_blank"><img src="/assets/imgs/ioma.jpg" alt="Logo de IOMA"/></a></li>
        <li><a href="https://www.ospesalud.com.ar/" target="_blank"><img src="/assets/imgs/ospe.png" alt="Logo de OSPE"/></a></li>
        <li><a href="https://www.swissmedical.com.ar/prepagaclientes/" target="_blank"><img src="/assets/imgs/swissmedical.png" alt="Logo de SWISS MEDICAL"/></a></li>
        <li><a href="https://www.osde.com.ar/index.html#!homepage.html" target="_blank"><img src="/assets/imgs/osde.png" alt="Logo de OSDE"/></a></li>
        </ul>    
    </section>

    <?php include __DIR__ . '/../parts/footer.view.php' ?>

</body>
</html>