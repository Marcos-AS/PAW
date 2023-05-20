<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estudios realizados</title>
    <link rel="stylesheet" href="/assets/css/global.css">
    <link rel="stylesheet" href="/styles/portal-pacientes.css">
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


    <table id="tEstudios">
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

    <?php require __DIR__ . '/../parts/footer.view.php' ?>

</body>
</html>

