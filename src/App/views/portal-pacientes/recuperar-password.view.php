<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Contraseña</title>
    <link rel="stylesheet" href="/assets/css/global.css">
    <link rel="stylesheet" href="/styles/portal-pacientes.css">
    <link rel="stylesheet" href="https://icono-49d6.kxcdn.com/icono.min.css">
    <script src="/assets/scripts/components/classPaw.js"></script>
    <script src="/assets/scripts/app.js"></script>
</head>
<body>
    
    <?php require __DIR__ . '/../parts/header.view.php' ?>  

    <h2>Recuperación de contraseña</h2>
    <form action="servidor-ejemplo.com" method="post">
        <label for="inputMail">Dirección de e-mail:
            <input type="email" name="inputMail">
        </label>
        <p>¿No tienes cuenta? <a href="nuevo-usuario.html">Regístrate</a></p>
  
        <input type="submit" value="Recuperar">
      </form>
      
    <?php require __DIR__ . '/../parts/footer.view.php' ?>

</body>
</html>