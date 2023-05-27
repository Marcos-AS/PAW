<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitar Turno</title>
    <link rel="stylesheet" href="https://unpkg.com/browse/reset-css@5.0.1/reset.css">
    <link rel="stylesheet" href="/assets/css/solicitarTurno.css">
    <link rel="stylesheet" href="/assets/css/global.css">
    <link rel="stylesheet" href="https://icono-49d6.kxcdn.com/icono.min.css">
    <script src="/assets/scripts/components/classPaw.js"></script>
    <script src="/assets/scripts/app.js"></script>
</head>
<body>

    <?php include __DIR__ . '/./parts/header.view.php' ?>

    <?php include __DIR__ . '/./parts/nav.view.php' ?>

    <h2>Solicitud de Turno</h2>
    <form action="/solicitarTurno" method="post">
        <fieldset>
            <legend>Datos del Paciente</legend>
            <label for="inputNombre">
                Nombre
                <input type="text" required name="nombre" />
            </label>
            <label for="inputApellido">
                Apellido
                <input type="text" required name="apellido" />
            </label>
            <label for="inputDni">
                DNI
                <input type="number" required name="dni" maxlength="8" minlength="7"/>
            </label>
            <label for="inputDate">
                Fecha de nacimiento
                <input type="date" required name="fechanacimiento" />
            </label>
            <label for="inputEdad">
                Edad
                <input type="number" required name="edad" />
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
                <input type="email" required name="email"/>
            </label>
            <label for="inputTelefono">
                Telefono
                <input type="tel" required name="telefono"/>
            </label>
        </fieldset>
        <fieldset>
            <legend>Datos del Turno</legend>
            <!--<label for="inputSelect">
                Especialidad
                <select name="inputSelect" id="profesionales">
                    <option value="ODONTOLOGIA">ODONTOLOGIA</option>
                    <option value="GINECOLOGIA">GINECOLOGIA</option>
                    <option value="OTORRINOLARINGOLOGIA">OTORRINOLARINGOLOGIA</option> 
                </select> -->
            </label>
            <label for="inputSelect">
                Profesionales
                <select id="selectProfesionales">
                <!--    <option value="Juan Perez">Juan Perez</option>
                    <option value="Jose Fernandez">Jose Fernandez</option> -->
                </select>
                <div id="agendaContainer"></div>
            </label>
            <label for="inputDate">
                Fecha
                <!--<input type="date" required name="fecha" id="fechaInput" /> -->
                <select id="fechaSelect">
                </select>
            </label>
            <label for="inputDate">
                Horario
                <!--<input type="date" required name="fecha" id="fechaInput" /> -->
                <select id="horarioSelect">
                </select>
            </label>
            <!--<label for="inputHorarios">
                Horarios
                <label for="opcion1">
                    10:30
                    <input type="radio" id="opcion1" required name="horario" value="10:30">
                </label>
                <label for="opcion2">
                    11:00
                    <input type="radio" id="opcion2" required name="horario" value="11:00">
                </label>
                <label for="opcion3">
                    11:30
                    <input type="radio" id="opcion3" required name="horario" value="11:30">
                </label> -->
            </label>            
            <label for="inputSubmit">
                <input type="submit" name="inputSubmit" value="Reservar"/>
            </label>
        </fieldset>
        <label for="inputReset">
            <input type="reset" name="inputReset">
        </label>
  </form>

    <div id="dropzone">
        Arrastra y suelta archivos aquí   
    </div>

    <?php include __DIR__ . '/./parts/footer.view.php' ?>
    
</body>
</html>