<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creación de usuario</title>
    <meta name="keywords" content="clinica, salud">
    <link rel="stylesheet" href="https://unpkg.com/browse/reset-css@5.0.1/reset.css">
    <link rel="stylesheet" href="/assets/css/global.css">
    <link rel="stylesheet" href="/styles/portal-pacientes.css">   
    <link rel="stylesheet" href="https://icono-49d6.kxcdn.com/icono.min.css">
    <script src="/assets/scripts/components/classPaw.js"></script>
    <script src="/assets/scripts/app.js"></script>
</head>
<body>
    
    <?php require __DIR__ . '/../parts/header.view.php' ?>

    <section class="sNuevoUsuario">
        <h2>Creación de usuario</h2>
        <form action="/portal-pacientes/nuevo-usuario" method="post">
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
            <label for="inputTelefono">
                Telefono
                <input type="tel" required name="telefono"/>
            </label>
            <label for="inputEmail">
                Email
                <input type="email" required name="email"/>
            </label>
            <label for="inputPasswd">
                Contraseña
                <input type="password" required name="password" minlength="8" maxlength="20"/>
            </label>
            <label for="inputPasswd">
                Confirmar contraseña
                <input type="password" required name="inputPasswd" minlength="8" maxlength="20" autocomplete="off"/>
            </label>
            <label for="inputOS">
                Obra Social
                <select name="obraSocial">
                    <option value="IOMA">IOMA</option>
                    <option value="OSDE">OSDE</option>
                    <option value="ASIMRA">ASIMRA</option>
                </select>
            </label>
            <!--Falta el captcha-->
    
            <label for="inputCond">
                <input type="checkbox" name="inputCond"/>
                Acepto los <a href="terminos-y-condiciones.html">términos y condiciones</a>
            </label>
            <label for="inputSubmit">
                <input type="submit" name="inputSubmit" value="Aceptar"/>
            </label>
        </form>
        <?php if ($procesado) : ?>
            <div>
                Usuario registrado con exito.
            </div>
        <?php endif; ?>
    </section>
    
    <?php require __DIR__ . '/../parts/footer.view.php' ?>

</body>
</html>