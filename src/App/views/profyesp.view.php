<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profesionales y Especialidades</title>
    <link rel="stylesheet" href="https://unpkg.com/browse/reset-css@5.0.1/reset.css">
    <link rel="stylesheet" href="/assets/css/global.css">
    <link rel="stylesheet" href="/assets/css/profyesp.css">
    <link rel="stylesheet" href="https://icono-49d6.kxcdn.com/icono.min.css">
</head>
<body>
    
    <?php include __DIR__ . '/./parts/header.view.php' ?>

    <?php include __DIR__ . '/./parts/nav.view.php' ?>

    <section class="profyesp">
        <h2>Profesionales y Especialidades</h2>
        <form action="servidor-ejemplo.com" method="get">
            <label for="inputSearch"> Ingresa el nombre de la especialidad o profesional
                <input type="search" name="inputSearch">
            </label>
            <a href="">
                <i id="lupa" class="icono-search"></i>
            </a>
        </form>
        <section class="sLetras">
            <label for="letra">
                <span class="letra">A</span>
                <span class="letra">B</span>
                <span class="letra">C</span>
                <span class="letra">D</span>
                <span class="letra">E</span>
                <span class="letra">F</span>
                <span class="letra">G</span>
                <span class="letra">H</span>
                <span class="letra">I</span>
                <span class="letra">J</span>
                <span class="letra">K</span>
                <span class="letra">L</span>
                <span class="letra">M</span>
                <span class="letra">N</span>
                <span class="letra">O</span>
                <span class="letra">P</span>
                <span class="letra">Q</span>
                <span class="letra">R</span>
                <span class="letra">S</span>
                <span class="letra">T</span>
                <span class="letra">U</span>
                <span class="letra">V</span>
                <span class="letra">W</span>
                <span class="letra">X</span>
                <span class="letra">Y</span>
                <span class="letra">Z</span>
            </label>
        </section>
    </section>

    <?php include __DIR__ . '/./parts/footer.view.php' ?>

    <script src="assets/scripts/hamburguesa.js"></script>

</body>
</html>