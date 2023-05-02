<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trabaja con Nosotros</title>
    <link rel="stylesheet" href="https://unpkg.com/browse/reset-css@5.0.1/reset.css">
    <link rel="stylesheet" href="/assets/css/global.css">
    <link rel="stylesheet" href="/assets/css/trabajaconnosotros.css">
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
        <a class="botonTurno" href="solicitarTurno"> Reserva tu turno</a>
    </header> 

    <?php include __DIR__ . '/./parts/nav.view.php' ?>

    <h2>Dejanos tu CV!</h2>
    <form action="/trabajaconnosotros" method="post">
        <label for="inputNombre">
            Nombre
            <input type="text" required name="nombre" />
        </label>
        <label for="inputApellido">
            Apellido
            <input type="text" required name="apellido" />
        </label>    
        <label for="inputEmail">
            Email
            <input type="email" required name="email"/>
        </label>
        <label for="inputTelefono">
            Telefono
            <input type="tel" required name="telefono"/>
        </label>
        <label for="inputDireccion">
            Direccion
            <input type="text" required name="direccion" />
        </label>
        <label for="inputCP">
            Código Postal
            <input type="text" required name="cp" />
        </label>
        <label for="inputSelect">
            Nivel de Estudio
            <select name="estudio">
                <option value="Primario">Primario</option>
                <option value="Secundario">Secundario</option>
                <option value="Universitario">Universitario</option>
            </select>
        </label>
        <label for="inputSelect">
            Área
            <select name="area">
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
        <?php if ($procesado) : ?>
            <div>
                Su peticion fue procesada con exito.
            </div>
        <?php endif; ?>
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
        <a href="trabajaconnosotros">Trabaja con nosotros</a>
    </footer>

    <script src="assets/scripts/hamburguesa.js"></script>
</body>

</html>