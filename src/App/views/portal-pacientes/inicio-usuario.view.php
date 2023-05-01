<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil usuario</title>
    <link rel="stylesheet" href="https://unpkg.com/browse/reset-css@5.0.1/reset.css">
    <link rel="stylesheet" href="/styles/global.css">
    <link rel="stylesheet" href="https://icono-49d6.kxcdn.com/icono.min.css">
    <link rel="stylesheet" href="/styles/portal-pacientes.css">    
</head>
<body>
    
    <header>
        <a href="/home.html"><img class="icono" src="/imgs/Imagotipo_PAW_Hospitals.svg" alt="Logo de la Clinica" /></a>
        <button class="hamburguesa">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </header>

    <nav>
        <ul>
            <li>
                <a href="perfil-usuario">Mi perfil</a>
            </li>
            <li>
                <a href="historial-turnos">Historial de turnos</a>
            </li>
            <li>
                <a href="estudios-realizados">Estudios realizados</a>
            </li>
            <li>
                <a href="#">Cerrar sesión</a>
            </li>
            <a class="botonTurno" href="solicitarTurno"> Reserva tu turno</a>
        </ul>
    </nav>

    <h2>¡Hola, Juan!</h2>
    <h3>Tus próximos turnos</h3>
    <a href="/solicitarTurno.html"> Reserva tu turno</a>
    <p>Turno 20/03 19:00 Cardiología: Dr. Juan Pérez (confirmado)</p>
    <p>Turno 27/03 19:00 Cardiología: Dr. Juan Pérez</p>

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
        <li class="redSocial"><a href="https://www.facebook.com" target="_blank"><i class="icono-facebook"  alt="Logo de Facebook"></i></a></li>
        <li class="redSocial"><a href="https://www.linkedin.com" target="_blank"><i class="icono-linkedIn" alt="Logo de LinkedIn"></i></a></li>
        <li class="redSocial"><a href="https://www.instagram.com" target="_blank"><i class="icono-instagram" alt="Logo de Instagram"></i></a></li>
        </ul>
        <p>Clínica ... Todos los derechos reservados &#169;</p>   
        <a href="/trabajaconnosotros.html">Trabaja con nosotros</a>
    </footer>

    <script src="/scripts/hamburguesa.js"></script>

</body>
</html>
