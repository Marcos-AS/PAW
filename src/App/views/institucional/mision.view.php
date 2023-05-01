<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mision</title>
    <link rel="stylesheet" href="https://unpkg.com/browse/reset-css@5.0.1/reset.css">
    <link rel="stylesheet" href="/assets/css/global.css">
    <link rel="stylesheet" href="https://icono-49d6.kxcdn.com/icono.min.css">
    <link rel="stylesheet" href="/assets/css/institucional.css">
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

 <!--   <nav id="menu">
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

    <nav class="nav-info-util">
        <ul>
            <li><a href="/institucional/autoridades"><p>Autoridades</p></a></li>
            <li><a href="/institucional/historia"><p>Historia</p></a></li>
            <li><a href="/institucional/mision"><p>Mision</p></a></li>
            <li><a href="/institucional/valores"><p>Valores</p></a></li>
        </ul>
    </nav>

    <nav class="breadcrumb">
        <ul>
            <li>
                <a href="/home.html">Home</a>
            </li>
            <li>
                <a href="/institucional/mision.html">Misión</a>
            </li>
        </ul>
    </nav>

    <h2>Misión</h2>

    <p class="mision primerP">En UNLu PAW, nuestra misión es brindar atención médica integral y de calidad a nuestros pacientes, promoviendo la salud y el bienestar de la comunidad. Nos comprometemos a ofrecer un enfoque holístico y centrado en el paciente, basado en la evidencia científica más actualizada, para mejorar la calidad de vida de nuestros pacientes y contribuir a su bienestar a lo largo de su vida.</p>

    <h2>Visión</h2>

    <p class="mision primerP">Nuestra visión es convertirnos en un centro de salud líder en la región, reconocido por nuestra excelencia en la atención médica, el compromiso con nuestros pacientes y la calidad de nuestros servicios. Buscamos ser referentes en la prevención y promoción de la salud, así como en el diagnóstico y tratamiento de enfermedades, con un enfoque integral y multidisciplinario.</p>

    <h2>Objetivos</h2>
    <ul class="mision">
        <li>Proporcionar una atención médica de alta calidad y centrada en el paciente, con un enfoque holístico que aborde no solo la enfermedad, sino también la prevención y promoción de la salud.</li>
        <li>Mantenernos actualizados en los avances científicos y tecnológicos en el campo de la medicina, para ofrecer diagnósticos precisos y tratamientos efectivos a nuestros pacientes.</li>
        <li>Establecer una relación cercana y de confianza con nuestros pacientes, basada en la empatía, la comunicación abierta y el respeto.</li>
        <li>Promover la educación para la salud, brindando información y asesoramiento sobre estilos de vida saludables, prevención de enfermedades y manejo de condiciones crónicas.</li>
        <li>Trabajar en colaboración con otros profesionales de la salud en la comunidad, incluyendo hospitales, laboratorios y especialistas, para garantizar una atención integral y coordinada para nuestros pacientes.</li>
        <li>Ofrecer un ambiente acogedor y confortable en nuestras instalaciones, con un equipo médico y administrativo altamente capacitado y comprometido con la excelencia en la atención al paciente.</li>
        <li>En UNLu PAW, nos dedicamos a cuidar de la salud y el bienestar de nuestros pacientes, con un enfoque integral y comprometido con la excelencia en la atención médica. Nuestros objetivos son guiados por nuestra misión y visión, y trabajamos arduamente para cumplirlos y ser referentes en la comunidad en la que servimos.</li>
    </ul>





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