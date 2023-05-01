<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estudios realizados</title>
</head>
<body>
    
    <header>
        <h1>Clínica ...</h1>
        <a href="/home.html"><img src="/imgs/icono clinica.png" alt="Logo de la Clinica" /></a>
    </header>

    <nav id="menu">
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

    <h2>Estudios realizados</h2>
    <a href="/./solicitarTurno.html"> Reserva tu turno</a>
    
    <nav>
        <ul>
            <li>
                <a href="perfil-usuario.html">Mi perfil</a>
            </li>
            <li>
                <a href="historial-turnos.html">Historial de turnos</a>
            </li>
            <li>
                <a href="estudios-realizados.html">Estudios realizados</a>
            </li>
            <li>
                <a href="#">Cerrar sesión</a>
            </li>
        </ul>
    </nav>

    <form>
        <label for="inputFDesde">
            Fecha desde:
            <input type="date" name="inputFDesde">
        </label>
        <label for="inputFHasta">
            Fecha hasta:
            <input type="date" name="inputFHasta">
        </label>
        <label for="inputSubmit">
            Filtrar
            <input type="submit" name="inputSubmit">
        </label>
    </form>

    <form method="post" action="/guardar-estudio" enctype="multipart/form-data">
        <label for="archivo">Adjuntar estudio:</label>
        <input type="file" id="archivo" name="archivo" accept=".pdf,.jpg,.png" required>
        <button type="submit">Guardar estudio</button>
        <?php if ($procesado) : ?>
            <div>
                Su peticion fue procesada con exito.
            </div>
        <?php endif; ?>
    </form>


    <table>
        <thead>
            <tr>
                <th><label for="h1">Fecha</label></th>
                <th><label for="h2">Hora</label></th>
                <th><label for="h3">Médico</label></th>
                <th><label for="h4">Motivo</label></th>
                <th><label for="h5">Servicio</label></th>
                <th><label for="h6">Monto</label></th>
                <th><label for="h7">Resultados</label></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>20/03/2023</td>
                <td>10:15</td>
                <td>Pérez, Juan</td>
                <td>Consulta</td>
                <td>Otorrinolaringología</td>
                <td>$1000,00</td>
                <td><a href="#">Resultado</a></td>
            </tr>
            <tr>
                <td>22/03/2023</td>
                <td>11:15</td>
                <td>Pérez, Juan</td>
                <td>Consulta</td>
                <td>Otorrinolaringología</td>
                <td>$1100,00</td>
                <td><a href="#">Resultado</a></td>
            </tr>
        </tbody>
    </table>

    <footer>
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
        <a href="https://www.facebook.com.ar" target="_blank"><img src="/imgs/facebook.png" alt="Logo de Facebook"/></a>
        <a href="https://www.linkedin.com.ar" target="_blank"><img src="/imgs/linkedin.png" alt="Logo de LinkedIn"/></a>
        <a href="https://www.instagram.com.ar" target="_blank"><img src="/imgs/instagram.jpg" alt="Logo de Instagram"/></a>
        <p>Clínica ... Todos los derechos reservados &#169;</p>   
        <a href="/./trabajaconnosotros.html">Trabaja con nosotros</a>
    </footer>

</body>
</html>
