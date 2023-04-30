<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/browse/reset-css@5.0.1/reset.css">
    <link rel="stylesheet" href="/assets/css/institucional.css">
    <link rel="stylesheet" href="/assets/css/global.css">
    <link rel="stylesheet" href="https://icono-49d6.kxcdn.com/icono.min.css">
    <link rel="stylesheet" href="/assets/css/submenu.css">
    <title>Autoridades</title>
</head>
<body>
    
    <header>
        <a class="icono" href="/home.html"></a>
        <button class="hamburguesa">
            <span></span>
            <span></span>
            <span></span>
        </button>
        <a class="botonTurno" href="/solicitarTurno.html"> Reserva tu turno</a>
    </header>

  //  <?php include __DIR__ . '/../parts/nav.view.php' ?>

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
    <nav class="nav-info-util">
        <ul>
            <li><a href="/institucional/autoridades.html"><p>Autoridades</p></a></li>
            <li><a href="/institucional/historia.html"><p>Historia</p></a></li>
            <li><a href="/institucional/mision.html"><p>Mision</p></a></li>
            <li><a href="/institucional/valores.html"><p>Valores</p></a></li>
        </ul>
    </nav>

    <nav class="breadcrumb">
        <ul>
            <li>
                <a href="/home.html">Home</a>
            </li>
            <li>
                <a href="/institucional/directorio.html">Autoridades</a>
            </li>
        </ul>
    </nav>

    <nav class="navAutoridades">
        <ul>
            <li><a class="activo" data-target="directorioList">Directorio</a></li>
            <li><a href="#" data-target="departamentoList">Departamentos</a></li>
            <li><a href="#" data-target="administrativoList">Área Administrativa</a></li>
        </ul>
    </nav>



    <section class="autoridades">

        <ul class="directorioList">
            <li><img src="/assets/imgs/jefe-medico.jpg" alt="Director General">
                <h3>Dr. Juan Pérez</h3>
                <p>Director General</p>
            </li>
            <li><img src="/assets/imgs/jefe-medico.jpg" alt="Director Médico">
                <h3>Dr. Juan López</h3>
                <p>Director Médico</p>
            </li>
            <li>
                <img src="/assets/imgs/jefe-medico.jpg" alt="Director de Administración y Finanzas">
                <h3>Dr. Pedro Sánchez</h3>
                <p>Director de Administración y Finanzas</p>
            </li>
            <li>
                <img src="/assets/imgs/jefe-medico.jpg" alt="Directora de Innovación y Procesos">
                <h3>Dra. Ana Torres</h3>
                <p>Directora de Innovación y Procesos</p>
            </li>
            <li>
                <img src="/assets/imgs/jefe-medico.jpg" alt="Subdirector Médico">
                <h3>Dr. Javier García</h3>
                <p>Subdirector Médico</p>
            </li>             
        </ul>

        <ul class="departamentoList">
            <li><img src="/imgs/jefe-medico.jpg" alt="Jefa de Enfermería">
                <h3>Dra. Camila Sosa</h3>
                <p>Jefa de Enfermería</p>
            </li>
            <li><img src="/imgs/jefe-medico.jpg" alt="Jefe de Medicina Legal">
                <h3>Dr. Carlos Rivera</h3>
                <p>Jefe de Medicina Legal</p>
            </li>
        </ul>

        <ul class="administrativoList">
            <li><img src="/imgs/jefe-medico.jpg" alt="Gerente de Operaciones">
                <h3>Dr.&nbsp;Mariano&nbsp;Pereyra</h3>
                <p>Gerente de Operaciones</p>
            </li>
            <li><img src="/imgs/jefe-medico.jpg" alt="Jefa de Facturacion">
                <h3>Dra. Silvia Lugano</h3>
                <p>Jefa de Facturacion</p>
            </li>
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
        <a href="/trabajaconnosotros.html">Trabaja con nosotros</a>
    </footer>
    
    <script src="../scripts/hamburguesa.js"></script>
    <script src="/scripts/submenu.js"></script>
    <script>
        const links = document.querySelectorAll('.navAutoridades a');

        links.forEach(link => {
        link.addEventListener('click', () => {
            // Obtenemos el target desde el atributo data-target
            const target = link.getAttribute('data-target');

            // Ocultamos todas las listas
            document.querySelectorAll('.autoridades ul').forEach(list => {
            list.style.display = 'none';
            });

            // Mostramos la lista correspondiente
            document.querySelector(`.${target}`).style.display = 'block';

            // Agregamos la clase activo al enlace seleccionado
            links.forEach(link => {
            link.classList.remove('activo');
            });
            link.classList.add('activo');
        });
        });
    </script>
</body>
</html>