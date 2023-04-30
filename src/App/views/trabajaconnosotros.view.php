<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trabaja con Nosotros</title>
    <link rel="stylesheet" href="https://unpkg.com/browse/reset-css@5.0.1/reset.css">
    <link rel="stylesheet" href="/styles/global.css">
    <link rel="stylesheet" href="/styles/trabajaconnosotros.css">
    <link rel="stylesheet" href="https://icono-49d6.kxcdn.com/icono.min.css">
</head>
<body>
    
   <header>
    <a class="icono" href="/home.html"></a>
        <button class="hamburguesa">
            <span></span>
            <span></span>
            <span></span>
        </button>
        <a class="botonTurno" href="solicitarTurno.html"> Reserva tu turno</a>
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

    <h2>Dejanos tu CV!</h2>
    <form action=servidor-ejemplo.com">
        <label for="inputNombre">
            Nombre
            <input type="text" required name="inputNombre" />
        </label>
        <label for="inputApellido">
            Apellido
            <input type="text" required name="inputApellido" />
        </label>    
        <label for="inputEmail">
            Email
            <input type="email" required name="inputEmail"/>
        </label>
        <label for="inputTelefono">
            Telefono
            <input type="tel" required name="inputTelefono"/>
        </label>
        <label for="inputDireccion">
            Direccion
            <input type="text" required name="inputDireccion" />
        </label>
        <label for="inputCP">
            Código Postal
            <input type="text" required name="inputCP" />
        </label>
        <label for="inputSelect">
            Nivel de Estudio
            <select name="inputSelect">
                <option value="Primario">Primario</option>
                <option value="Secundario">Secundario</option>
                <option value="Universitario">Universitario</option>
            </select>
        </label>
        <label for="inputSelect">
            Área
            <select name="inputSelect">
                <option value="Admistración">Admistración</option>
                <option value="Enfermería">Enfermería</option>
                <option value="Traumatología">Traumatología</option>
            </select>
        </label>
        <label for="inputCV">
            Adjunte su CV
            <input type="file" required name="inputCV" />
            <small>Máximo 20 MB.</small>
        </label>  
        <label for="inputSubmit">
            <input type="submit" name="inputSubmit"/>
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
        <a href="trabajaconnosotros.html">Trabaja con nosotros</a>
    </footer>
    <script src="./scripts/hamburguesa.js"></script>
</body>

</html>