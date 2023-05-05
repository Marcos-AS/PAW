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
            <label class="letra" for="letra">
                <span>A</span>
                <span>B</span>
                <span>C</span>
                <span>D</span>
                <span>E</span>
                <span>F</span>
                <span>G</span>
                <span>H</span>
                <span>I</span>
                <span>J</span>
                <span>K</span>
                <span>L</span>
                <span>M</span>
                <span>N</span>
                <span>O</span>
                <span>P</span>
                <span>Q</span>
                <span>R</span>
                <span>S</span>
                <span>T</span>
                <span>U</span>
                <span>V</span>
                <span>W</span>
                <span>X</span>
                <span>Y</span>
                <span>Z</span>
            </label>
        </section>
    </section>

    <?php include __DIR__ . '/./parts/footer.view.php' ?>

    <script src="assets/scripts/hamburguesa.js"></script>

</body>
</html>