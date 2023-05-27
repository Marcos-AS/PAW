<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil usuario</title>
    <link rel="stylesheet" href="https://unpkg.com/browse/reset-css@5.0.1/reset.css">
    <link rel="stylesheet" href="https://icono-49d6.kxcdn.com/icono.min.css">
    <link rel="stylesheet" href="/assets/css/global.css">
    <script src="/assets/scripts/components/classPaw.js"></script>
    <script src="/assets/scripts/app.js"></script>   
</head>
<body>
    
    <?php require __DIR__ . '/../parts/header.view.php' ?>

    <nav class="menu">
        <ul>
            <li>
                <a href="/portal-pacientes/perfil-usuario">Mi perfil</a>
            </li>
            <li>
                <a href="/portal-pacientes/historial-turnos">Historial de turnos</a>
            </li>
            <li>
                <a href="/portal-pacientes/estudios-realizados">Estudios realizados</a>
            </li>
            <li>
                <a href="#">Cerrar sesión</a>
            </li>
        </ul>
    </nav>

    <h2>¡Hola, Juan!</h2>
    <h3>Tus próximos turnos</h3>
    <a href="/solicitarTurno.html"> Reserva tu turno</a>
    <p>Turno 20/03 19:00 Cardiología: Dr. Juan Pérez (confirmado)</p>
    <p>Turno 27/03 19:00 Cardiología: Dr. Juan Pérez</p>

    <?php require __DIR__ . '/../parts/footer.view.php' ?>

</body>
</html>

