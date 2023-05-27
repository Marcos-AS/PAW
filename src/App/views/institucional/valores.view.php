<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Valores</title>
    <link rel="stylesheet" href="https://unpkg.com/browse/reset-css@5.0.1/reset.css">
    <link rel="stylesheet" href="/assets/css/global.css">
    <link rel="stylesheet" href="https://icono-49d6.kxcdn.com/icono.min.css">
    <link rel="stylesheet" href="/assets/css/institucional.css">
    <link rel="stylesheet" href="/assets/css/submenu.css">
    <script src="/assets/scripts/components/classPaw.js"></script>
    <script src="/assets/scripts/app.js"></script>
</head>
<body>
    
    <?php include __DIR__ . '/../parts/header.view.php' ?>

    <?php include __DIR__ . '/../parts/nav.view.php' ?>
    
    <nav class="nav-info-util">
        <ul>
            <li><a href="/institucional/autoridades"><p>Autoridades</p></a></li>
            <li><a href="/institucional/historia"><p>Historia</p></a></li>
            <li><a href="/institucional/mision"><p>Mision</p></a></li>
            <li><a href="/institucional/valores"><p>Valores</p></a></li>
        </ul>
    </nav>

    <nav class="breadcrumb">
        <ul>
            <li>
                <a href="/home.html">Home</a>
            </li>
            <li>
                <a href="/institucional/valores.html">Valores</a>
            </li>
        </ul>
    </nav>

    <h2>Valores</h2>
    <ol class="valores">
        <li><p>Respeto a la vida, a la dignidad de la persona humana y a la libertad.</p></li>
        <li><p>Profesionalismo.</p></li>
        <li><p>Integridad.</p></li>
        <li><p>Compromiso.</p></li>
        <li><p>Espíritu de servicio y solidaridad.</p></li>
        <li><p>Colaboración.</p></li>
    </ol>

    <?php include __DIR__ . '/../parts/footer.view.php' ?>
  
</body>
</html>