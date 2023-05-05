<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil usuario</title>
    <link rel="stylesheet" href="/assets/css/global.css">
    <link rel="stylesheet" href="/assets/css/portal-pacientes.css">
    <link rel="stylesheet" href="https://icono-49d6.kxcdn.com/icono.min.css">
</head>

<body>
    
    <?php require __DIR__ . '/../parts/header.view.php' ?>

    <nav>
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

    <main class="datosPaciente">
        <h2>Tus datos: <!--Nombre--></h2>
        <p>Mail: juanperez25@gmail.com</p> <a href="#">Modificar</a>
        <p>Obra social: ASIMRA</p> <a href="#">Modificar</a>
        <p>Teléfono: 2346505152</p> <a href="#">Modificar</a>
        <p>Contraseña: *************</p> <a href="#">Modificar</a>

        <?php require __DIR__ . '/../parts/footer.view.php' ?>
    </main>
</body>
</html>

