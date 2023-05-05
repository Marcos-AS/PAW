<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="https://unpkg.com/browse/reset-css@5.0.1/reset.css">
    <link rel="stylesheet" href="/assets/css/login.css">
    <link rel="stylesheet" href="/assets/css/global.css">
    <link rel="stylesheet" href="https://icono-49d6.kxcdn.com/icono.min.css">

</head>
<body>
    
    <?php include __DIR__ . '/../parts/header.view.php' ?>

    <?php include __DIR__ . '/../parts/nav.view.php' ?>

    <section class="login">
    <h2>Iniciar sesión</h2>
    <form class="fLogin" action="portal-pacientes" method="post">
        <label for="inputDNI">DNI:
            <input type="text" name="dni">
        </label>
        <label for="inputPassword">Contraseña:
            <input type="password" name="password">
        </label>
        <p>¿No tienes cuenta? <a href="/portal-pacientes/nuevo-usuario">Regístrate</a></p>
        <p>¿Olvidaste tu contraseña? <a href="/portal-pacientes/recuperar-password">Recupérala aquí</a></p>

        <input type="submit" value="Ingresar">
      </form>
    </section>

    <?php include __DIR__ . '/../parts/footer.view.php' ?>

    <script src="/assets/scripts/hamburguesa.js"></script>

</body>
</html>