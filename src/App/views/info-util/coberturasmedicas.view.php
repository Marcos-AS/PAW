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
    <link rel="stylesheet" href="https://icono-49d6.kxcdn.com/icono.min.css">
    <link rel="stylesheet" href="/assets/css/submenu.css">
</head>
<body>
    <header>
        <a class="icono" href="/"></a>
        <button class="hamburguesa">
            <span></span>
            <span></span>
            <span></span>
        </button>
        <a class="botonTurno" href="../solicitarTurno"> Reserva tu turno</a>
    </header> 

    <?php include __DIR__ . '/../parts/nav.view.php' ?>

    <!--  <nav id="menu">
        <ul>
            <li class="dropdown">
                <a href="#">Institucional<span><i id="desplegable1" class="icono-caretDown" aria-hidden="true"></i></span></a>             
                <ul class="dropdown-menu sub-menu">
                    <li><a href="/institucional/directorio.html">Autoridades</a></li>
                    <li><a href="/institucional/historia.html">Historia</a></li>
                    <li><a href="/institucional/mision.html">Misión</a></li>
                    <li><a href="/institucional/valores.html">Valores</a></li>                
                </ul>
            </li> 
            <li><a href="/portal-pacientes/login.html">Portal Pacientes</a></li>
            <li><a href="/profyesp.html">Profesionales y Especialidades</a></li>
            <li class="dropdown">
                <a href="#">Información Útil<span><i id="desplegable2" class="icono-caretDown" aria-hidden="true"></i></span></a>
                <ul class="dropdown-menu sub-menu">
                    <li><a href="/info-util/coberturasmedicas.html">Coberturas médicas</a></li>
                    <li><a href="/info-util/novedades.html">Novedades</a></li>
                    <li><a href="/info-util/patologiasytratamientos.html">Patologías y tratamientos</a></li>
                </ul>   
            </li>
        </ul>
    </nav>
    -->

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

    <footer >
            <ul>
                <li><h4>Teléfonos</h4></li>
                <li>
                    <a href="tel: +5408009999999">0-800-999-9999</a>
                </li>
                <li>
                    <a href="tel: +54123456">123456</a>
                </li>
            </ul>
            <p>Lunes a viernes de 8 a 21 hs.</p>
            <ul>
                <li class="redSocial"><a href="https://www.facebook.com.ar" target="_blank"><i class="icono-facebook"  alt="Logo de Facebook"></i></a></li>
                <li class="redSocial"><a href="https://www.linkedin.com.ar" target="_blank"><i class="icono-linkedIn" alt="Logo de LinkedIn"></i></a></li>
                <li class="redSocial"><a href="https://www.instagram.com.ar" target="_blank"><i class="icono-instagram" alt="Logo de Instagram"></i></a></li>
            </ul>
            <p>Clínica ... Todos los derechos reservados &#169;</p>   
            <a href="/trabajaconnosotros">Trabaja con nosotros</a>
    </footer>

    <script src="/assets/scripts/hamburguesa.js"></script>
    <script src="/assets/scripts/submenu.js"></script>

</body>
</html>