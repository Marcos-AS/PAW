<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitar Turno</title>
    <link rel="stylesheet" href="https://unpkg.com/browse/reset-css@5.0.1/reset.css">
    <link rel="stylesheet" href="/assets/css/global.css">
    <link rel="stylesheet" href="/assets/css/solicitarTurno.css">
    <link rel="stylesheet" href="https://icono-49d6.kxcdn.com/icono.min.css">
</head>
<body>

    <header>
        <a class="icono" href="/"></a>
        <button class="hamburguesa">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </header> 

    <?php include __DIR__ . '/./parts/nav.view.php' ?>

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

    <h2>Solicitud de Turno</h2>
    <form action="turno.php" method="post">
        <fieldset>
            <legend>Datos del Paciente</legend>
            <label for="inputNombre">
                Nombre
                <input type="text" required name="inputNombre" />
            </label>
            <label for="inputApellido">
                Apellido
                <input type="text" required name="inputApellido" />
            </label>
            <label for="inputDni">
                DNI
                <input type="number" required name="inputDni" maxlength="8" minlength="7"/>
            </label>
            <label for="inputDate">
                Fecha de nacimiento
                <input type="date" required name="inputDate" />
            </label>
            <label for="inputEdad">
                Edad
                <input type="number" required name="inputEdad" />
            </label>
            <label for="inputSelect">
                Obra Social
                <select name="inputSelect">
                    <option value="IOMA">IOMA</option>
                    <option value="OSDE">OSDE</option>
                    <option value="ASIMRA">ASIMRA</option>
                </select>
            </label>
            <p>¿A donde te avisamos?</p>
            <label for="inputEmail">
                Email
                <input type="email" required name="inputEmail"/>
            </label>
            <label for="inputTelefono">
                Telefono
                <input type="tel" required name="inputTelefono"/>
            </label>
        </fieldset>
        <fieldset>
            <legend>Datos del Turno</legend>
            <label for="inputSelect">
                Especialidad
                <select name="inputSelect">
                    <option value="ODONTOLOGIA">ODONTOLOGIA</option>
                    <option value="GINECOLOGIA">GINECOLOGIA</option>
                    <option value="OTORRINOLARINGOLOGIA">OTORRINOLARINGOLOGIA</option>
                </select>
            </label>
            <label for="inputSelect">
                Profesionales
                <select name="inputSelect">
                    <option value="Juan Perez">Juan Perez</option>
                    <option value="Jose Fernandez">Jose Fernandez</option>
                </select>
            </label>
            <label for="inputDate">
                Fecha
                <input type="date" required name="inputDate" />
            </label>
            <label for="inputHorarios">
                Horarios
                <label for="opcion1">
                    10:30
                    <input type="radio" id="opcion1" name="opcion" value="opcion1">
                </label>
                <label for="opcion2">
                    11:00
                    <input type="radio" id="opcion2" name="opcion" value="opcion2">
                </label>
                <label for="opcion3">
                    11:30
                    <input type="radio" id="opcion3" name="opcion" value="opcion3">
                </label>
            </label>            
            <label for="inputSubmit">
                <input type="submit" name="inputSubmit" value="Reservar"/>
            </label>
        </fieldset>
        <label for="inputReset">
            <input type="reset" name="inputReset">
        </label>
  </form>

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
    
    <script src="assets/scripts/hamburguesa.js"></script>

</body>
</html>