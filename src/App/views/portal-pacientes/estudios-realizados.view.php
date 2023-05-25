<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estudios realizados</title>
    <link rel="stylesheet" href="/assets/css/global.css">
    <link rel="stylesheet" href="/assets/css/estudiosRealizados.css">
    <link rel="stylesheet" href="https://icono-49d6.kxcdn.com/icono.min.css">  
    <script src="/assets/scripts/components/classPaw.js"></script>
    <script src="/assets/scripts/app.js"></script>
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

    <h2>Estudios realizados</h2>

    <form id="fFilter">
        <h3>Filtrar</h3>
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


    <table id="tEstudios">
        <thead>
            <tr>
                <th><label for="h3">Médico</label></th>
                <th><label for="h4">Motivo</label></th>
                <th><label for="h5">Servicio</label></th>
                <th><label for="h1">Fecha</label></th>
                <th><label for="h2">Hora</label></th>
                <th><label for="h6">Monto</label></th>
                <th><label for="h7">Resultados</label></th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

    <?php require __DIR__ . '/../parts/footer.view.php' ?>

</body>
</html>

